<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Filament\Pages\Actions;
use Modules\Rating\Filament\Resources\RatingMorphResource;

class EditRatingMorph extends XotBaseEditRecord
{
    protected static string $resource = RatingMorphResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
