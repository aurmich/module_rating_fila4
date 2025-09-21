<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\ListRatingMorphs;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\CreateRatingMorph;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages\EditRatingMorph;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages;
use Modules\Rating\Models\RatingMorph;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RatingMorphResource extends XotBaseResource
{
    protected static ?string $model = RatingMorph::class;

<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
>>>>>>> a12f125f4a (.)
=======
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
>>>>>>> origin/develop
>>>>>>> d06edcd (.)

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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
<<<<<<< HEAD
=======
=======
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
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
<<<<<<< HEAD
            'index' => ListRatingMorphs::route('/'),
            'create' => CreateRatingMorph::route('/create'),
            'edit' => EditRatingMorph::route('/{record}/edit'),
=======
<<<<<<< HEAD
            'index' => ListRatingMorphs::route('/'),
            'create' => CreateRatingMorph::route('/create'),
            'edit' => EditRatingMorph::route('/{record}/edit'),
=======
            'index' => Pages\ListRatingMorphs::route('/'),
            'create' => Pages\CreateRatingMorph::route('/create'),
            'edit' => Pages\EditRatingMorph::route('/{record}/edit'),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ];
    }
}
