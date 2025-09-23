<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\ListRatingMorphs;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\CreateRatingMorph;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\EditRatingMorph;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
=======
use Filament\Schemas\Schema;
>>>>>>> dea9ef7 (.)
=======
use Filament\Schemas\Schema;
>>>>>>> 2d63161 (.)
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages;
use Modules\Rating\Models\RatingMorph;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RatingMorphResource extends XotBaseResource
{
    protected static ?string $model = RatingMorph::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            // Campi del form
        ];
    }

    public static function table(Table $table): Table
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
