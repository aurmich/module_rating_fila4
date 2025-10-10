<?php

declare(strict_types=1);

namespace Modules\Rating\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Modules\Rating\Models\Rating;
use Modules\User\Models\User;

/**
 * Rating Service
 *
 * Manages ratings/votes on any model with aggregation
 */
class RatingService
{
    /**
     * Add or update rating
     */
    public function rate(
        Model $rateable,
        User $user,
        int $value,
        ?string $review = null
    ): Rating {
        // Validate rating value
        if ($value < 1 || $value > 5) {
            throw new InvalidArgumentException('Rating value must be between 1 and 5');
        }

        // Find existing rating or create new
        $rating = Rating::updateOrCreate(
            [
                'rateable_type' => get_class($rateable),
                'rateable_id' => $rateable->getKey(),
                'user_id' => $user->id,
            ],
            [
                'value' => $value,
                'review' => $review,
            ]
        );

        // Clear cache
        $this->clearCache($rateable);

        Log::info('Rating added/updated', [
            'rating_id' => $rating->id,
            'user_id' => $user->id,
            'value' => $value,
            'rateable_type' => get_class($rateable),
            'rateable_id' => $rateable->getKey(),
        ]);

        return $rating;
    }

    /**
     * Remove rating
     */
    public function remove(Model $rateable, User $user): bool
    {
        $deleted = Rating::where('rateable_type', get_class($rateable))
            ->where('rateable_id', $rateable->getKey())
            ->where('user_id', $user->id)
            ->delete();

        if ($deleted) {
            $this->clearCache($rateable);

            Log::info('Rating removed', [
                'user_id' => $user->id,
                'rateable_type' => get_class($rateable),
                'rateable_id' => $rateable->getKey(),
            ]);
        }

        return $deleted > 0;
    }

    /**
     * Get user's rating for model
     */
    public function getUserRating(Model $rateable, User $user): ?Rating
    {
        return Rating::where('rateable_type', get_class($rateable))
            ->where('rateable_id', $rateable->getKey())
            ->where('user_id', $user->id)
            ->first();
    }

    /**
     * Get average rating
     */
    public function getAverage(Model $rateable): float
    {
        $cacheKey = $this->getCacheKey($rateable, 'average');

        return (float) Cache::remember($cacheKey, 3600, function () use ($rateable): float {
            $average = Rating::where('rateable_type', get_class($rateable))
                ->where('rateable_id', $rateable->getKey())
                ->avg('value');

            return $average !== null ? (float) $average : 0.0;
        });
    }

    /**
     * Get total count
     */
    public function getCount(Model $rateable): int
    {
        $cacheKey = $this->getCacheKey($rateable, 'count');

        return (int) Cache::remember($cacheKey, 3600, function () use ($rateable): int {
            return Rating::where('rateable_type', get_class($rateable))
                ->where('rateable_id', $rateable->getKey())
                ->count();
        });
    }

    /**
     * Get rating distribution
     *
     * @return array<int, int>
     */
    public function getDistribution(Model $rateable): array
    {
        $cacheKey = $this->getCacheKey($rateable, 'distribution');

        /** @var array<int, int> */
        return Cache::remember($cacheKey, 3600, function () use ($rateable): array {
            $ratings = Rating::where('rateable_type', get_class($rateable))
                ->where('rateable_id', $rateable->getKey())
                ->selectRaw('value, COUNT(*) as count')
                ->groupBy('value')
                ->pluck('count', 'value')
                ->toArray();

            // Fill missing values with 0
            $distribution = [];
            for ($i = 1; $i <= 5; $i++) {
                $distribution[$i] = (int) ($ratings[$i] ?? 0);
            }

            return $distribution;
        });
    }

    /**
     * Get summary statistics
     */
    public function getSummary(Model $rateable): array
    {
        return [
            'average' => $this->getAverage($rateable),
            'count' => $this->getCount($rateable),
            'distribution' => $this->getDistribution($rateable),
        ];
    }

    /**
     * Get all ratings for model
     */
    public function getRatings(
        Model $rateable,
        ?int $value = null,
        int $limit = 50
    ): Collection {
        $query = Rating::query()
            ->where('rateable_type', get_class($rateable))
            ->where('rateable_id', $rateable->getKey())
            ->latest();

        if ($value !== null) {
            $query->where('value', $value);
        }

        return $query->limit($limit)->get();
    }

    /**
     * Check if user has rated
     */
    public function hasRated(Model $rateable, User $user): bool
    {
        return Rating::where('rateable_type', get_class($rateable))
            ->where('rateable_id', $rateable->getKey())
            ->where('user_id', $user->id)
            ->exists();
    }

    /**
     * Get top rated items
     *
     * @return \Illuminate\Support\Collection<int, array{id: mixed, average: float, count: int}>
     */
    public function getTopRated(string $modelClass, int $limit = 10): \Illuminate\Support\Collection
    {
        return Rating::where('rateable_type', $modelClass)
            ->selectRaw('rateable_id, AVG(value) as avg_rating, COUNT(*) as rating_count')
            ->groupBy('rateable_id')
            ->having('rating_count', '>=', 3) // Minimum 3 ratings
            ->orderByDesc('avg_rating')
            ->limit($limit)
            ->get()
            ->map(function (Rating $rating): array {
                $rateableId = $rating->getAttribute('rateable_id');
                $avgRating = $rating->getAttribute('avg_rating');
                $ratingCount = $rating->getAttribute('rating_count');

                return [
                    'id' => $rateableId,
                    'average' => round((float) $avgRating, 2),
                    'count' => (int) $ratingCount,
                ];
            });
    }

    /**
     * Clear cache for model
     */
    protected function clearCache(Model $rateable): void
    {
        $keys = [
            $this->getCacheKey($rateable, 'average'),
            $this->getCacheKey($rateable, 'count'),
            $this->getCacheKey($rateable, 'distribution'),
        ];

        foreach ($keys as $key) {
            Cache::forget($key);
        }
    }

    /**
     * Get cache key
     */
    protected function getCacheKey(Model $rateable, string $type): string
    {
        return sprintf(
            'rating:%s:%s:%s',
            class_basename($rateable),
            (string) $rateable->getKey(),
            $type
        );
    }
}
