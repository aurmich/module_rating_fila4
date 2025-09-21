<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Filament\Pages\Actions;
use Modules\Rating\Filament\Resources\RatingResource;

class EditRating extends XotBaseEditRecord
<<<<<<< HEAD
=======
=======
use Filament\Pages\Actions;
use Modules\Rating\Filament\Resources\RatingResource;

class EditRating extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
{
    protected static string $resource = RatingResource::class;

    protected function getActions(): array
    {
        return [
<<<<<<< HEAD
            DeleteAction::make(),
=======
<<<<<<< HEAD
            DeleteAction::make(),
=======
            Actions\DeleteAction::make(),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ];
    }
}
