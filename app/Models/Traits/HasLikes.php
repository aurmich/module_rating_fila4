<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Traits;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Rating\Models\Like;

trait HasLikes
{
    /**
<<<<<<< HEAD
     * @return Collection
=======
<<<<<<< HEAD
     * @return Collection
=======
     * @return \Illuminate\Database\Eloquent\Collection
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     */
    public function likes()
    {
        return $this->likesRelation;
    }

    /**
     * param \Modules\Xot\Contracts\UserContract|null $user.
     *
<<<<<<< HEAD
     * @param UserContract|null $user
=======
<<<<<<< HEAD
     * @param UserContract|null $user
=======
     * @param \Modules\Xot\Contracts\UserContract|null $user
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     */
    public function likedBy($user): void
    {
        $this->likesRelation()->create(['user_id' => $user->id]);

        $this->unsetRelation('likesRelation');
    }

    /**
     * param \Modules\Xot\Contracts\UserContract|null $user.
     *
<<<<<<< HEAD
     * @param UserContract|null $user
=======
<<<<<<< HEAD
     * @param UserContract|null $user
=======
     * @param \Modules\Xot\Contracts\UserContract|null $user
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     */
    public function dislikedBy($user): void
    {
        /**
         * @var Like
         */
        $where = $this->likesRelation()->where('user_id', $user->id)->first();
<<<<<<< HEAD
        if ($where !== null) {
=======
<<<<<<< HEAD
        if ($where !== null) {
=======
        if (null !== $where) {
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
            $where->delete();
        }

        $this->unsetRelation('likesRelation');
    }

    /**
     * It's important to name the relationship the same as the method because otherwise
     * eager loading of the polymorphic relationship will fail on queued jobs.
     *
     * @see https://github.com/laravelio/laravel.io/issues/350
     */
    public function likesRelation(): MorphMany
    {
        return $this->morphMany(Like::class, 'likesRelation', 'likeable_type', 'likeable_id');
    }

    /**
     * param \Modules\Xot\Contracts\UserContract|null $user.
     *
<<<<<<< HEAD
     * @param UserContract|null $user
=======
<<<<<<< HEAD
     * @param UserContract|null $user
=======
     * @param \Modules\Xot\Contracts\UserContract|null $user
     *
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     * @return bool
     */
    public function isLikedBy($user)
    {
        return $this->likesRelation()->where('user_id', $user->id)->exists();
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    protected static function bootHasLikes()
    {
        static::deleting(function ($model): void {
<<<<<<< HEAD
            $model->likesRelation()->delete(); /** @phpstan-ignore method.nonObject */
=======
<<<<<<< HEAD
            $model->likesRelation()->delete(); /** @phpstan-ignore method.nonObject */
=======
            $model->likesRelation()->delete();

>>>>>>> origin/develop
>>>>>>> d06edcd (.)
            $model->unsetRelation('likesRelation');
        });
    }
}
