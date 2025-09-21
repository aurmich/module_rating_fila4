<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Contracts;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Rating\Models\Rating;

/**
 * --.
 */
interface HasRatingContract
{
    /**
<<<<<<< HEAD
     * @return MorphToMany<Rating, Rating|Model>
=======
<<<<<<< HEAD
     * @return MorphToMany<Rating, Rating|Model>
=======
     * @return MorphToMany<Rating, Rating|\Illuminate\Database\Eloquent\Model>
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
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
