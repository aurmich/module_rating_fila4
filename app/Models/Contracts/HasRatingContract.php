<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Rating\Models\Rating;
<<<<<<< HEAD
use Modules\Rating\Models\RatingMorph;
=======
>>>>>>> d37c2e9 (.)

/**
 * --.
 */
interface HasRatingContract
{
    /**
<<<<<<< HEAD
     * @return MorphToMany<Rating, Model, RatingMorph, 'pivot'>
=======
     * @return MorphToMany<Rating, Rating|Model>
>>>>>>> d37c2e9 (.)
     */
    public function ratings(): MorphToMany;
}

/*
 * @property-read string $url

interface Page
{
    public function getUrlAttribute(): string;
}
*/
