<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

<<<<<<< HEAD
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
=======
<<<<<<< HEAD
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Filament\Pages\Actions;
use Filament\Tables\Columns;
use Modules\Rating\Filament\Resources\RatingMorphResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRatingMorphs extends XotBaseListRecords
{
    protected static string $resource = RatingMorphResource::class;

    protected function getActions(): array
    {
        return [
<<<<<<< HEAD
            CreateAction::make(),
=======
<<<<<<< HEAD
            CreateAction::make(),
=======
            Actions\CreateAction::make(),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ];
    }

    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
            'id' => TextColumn::make('id')
                ->sortable()
                ->searchable(),
            'rating' => TextColumn::make('rating')
                ->sortable()
                ->searchable(),
            'ratingable_type' => TextColumn::make('ratingable_type')
                ->label('Type')
                ->sortable(),
            'ratingable_id' => TextColumn::make('ratingable_id')
                ->label('ID')
                ->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => TextColumn::make('updated_at')
<<<<<<< HEAD
=======
=======
            'id' => Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),
            'rating' => Columns\TextColumn::make('rating')
                ->sortable()
                ->searchable(),
            'ratingable_type' => Columns\TextColumn::make('ratingable_type')
                ->label('Type')
                ->sortable(),
            'ratingable_id' => Columns\TextColumn::make('ratingable_id')
                ->label('ID')
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => Columns\TextColumn::make('updated_at')
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                ->dateTime()
                ->sortable(),
        ];
    }
}
