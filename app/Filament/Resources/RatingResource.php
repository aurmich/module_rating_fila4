<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
use Filament\Schemas\Components\Section;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Modules\Rating\Filament\Resources\RatingResource\Pages\ListRatings;
use Modules\Rating\Filament\Resources\RatingResource\Pages\CreateRating;
use Modules\Rating\Filament\Resources\RatingResource\Pages\EditRating;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
<<<<<<< HEAD
=======
=======
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Modules\Rating\Enums\RuleEnum;
use Modules\Rating\Filament\Resources\RatingResource\Pages;
use Modules\Rating\Models\Rating;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RatingResource extends XotBaseResource
{
    protected static ?string $model = Rating::class;

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
            TextInput::make('extra_attributes.type'),
            TextInput::make('extra_attributes.anno'),
            TextInput::make('title')->autofocus()->required(),
            ColorPicker::make('color'),
            Radio::make('rule')->options(RuleEnum::class),
            Section::make()
                ->schema([
                    Toggle::make('is_disabled'),
                    Toggle::make('is_readonly'),
                ]),
            RichEditor::make('txt')->columnSpanFull(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('type'),
                TextColumn::make('anno'),
                ToggleColumn::make('is_disabled'),
                ToggleColumn::make('is_readonly'),
                IconColumn::make('color'),
            ])
            ->filters([
                //
            ])
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
<<<<<<< HEAD
=======
=======
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
<<<<<<< HEAD
            'index' => ListRatings::route('/'),
            'create' => CreateRating::route('/create'),
            'edit' => EditRating::route('/{record}/edit'),
=======
<<<<<<< HEAD
            'index' => ListRatings::route('/'),
            'create' => CreateRating::route('/create'),
            'edit' => EditRating::route('/{record}/edit'),
=======
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ];
    }
}
