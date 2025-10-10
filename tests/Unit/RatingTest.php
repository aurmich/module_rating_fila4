<?php

namespace Modules\Rating\Tests\Unit;

use Modules\Rating\Enums\SupportedLocale;
use Modules\Rating\Models\Rating;
use Modules\Rating\Models\RatingMorph;
use Modules\Rating\Tests\TestCase;

class RatingTest extends TestCase
{
    public function test_can_create_rating(): void
    {
        $rating = Rating::create([
            'name' => 'Test Rating',
            'color' => '#FF0000',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('ratings', [
            'id' => $rating->id,
            'name' => 'Test Rating',
        ]);
    }

    public function test_can_create_rating_morph(): void
    {
        $rating = Rating::create([
            'name' => 'Test Rating',
        ]);

        $ratingMorph = RatingMorph::create([
            'rating_id' => $rating->id,
            'model_type' => 'test_model',
            'model_id' => 1,
            'value' => 4.5,
            'note' => 'Test note',
            'is_winner' => true,
            'reward' => 10,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('rating_morphs', [
            'id' => $ratingMorph->id,
            'rating_id' => $rating->id,
        ]);
    }

    public function test_supported_locale_enum(): void
    {
        $locale = SupportedLocale::IT;

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('it', $locale->value);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('Italiano', $locale->getLabel());

        $localeFromString = SupportedLocale::fromString('en');
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(SupportedLocale::EN, $localeFromString);

        $locales = SupportedLocale::toArray();
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertArrayHasKey('it', $locales);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertArrayHasKey('en', $locales);
    }
}
