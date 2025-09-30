<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\CreateRatingMorph;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\EditRatingMorph;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\ListRatingMorphs;
use Filament\Tables\Table as FilamentTable;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages;
use Modules\Rating\Models\RatingMorph;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RatingMorphResource extends XotBaseResource
{
    protected static ?string $model = RatingMorph::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            // Campi del form
        ];
    }

    public static function table(FilamentTable $table): FilamentTable
    {
        return $table
            ->columns([
            ])
            ->filters([
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRatingMorphs::route('/'),
            'create' => CreateRatingMorph::route('/create'),
            'edit' => EditRatingMorph::route('/{record}/edit'),
        ];
    }
}
