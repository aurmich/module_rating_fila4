<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources;

<<<<<<< HEAD
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
=======
use Filament\Schemas\Components\Section;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Modules\Rating\Filament\Resources\RatingResource\Pages\ListRatings;
use Modules\Rating\Filament\Resources\RatingResource\Pages\CreateRating;
use Modules\Rating\Filament\Resources\RatingResource\Pages\EditRating;
>>>>>>> d37c2e9 (.)
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
<<<<<<< HEAD
use Filament\Schemas\Components\Section;
=======
use Filament\Tables;
>>>>>>> d37c2e9 (.)
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Modules\Rating\Enums\RuleEnum;
<<<<<<< HEAD
use Modules\Rating\Filament\Resources\RatingResource\Pages\CreateRating;
use Modules\Rating\Filament\Resources\RatingResource\Pages\EditRating;
use Modules\Rating\Filament\Resources\RatingResource\Pages\ListRatings;
=======
use Modules\Rating\Filament\Resources\RatingResource\Pages;
>>>>>>> d37c2e9 (.)
use Modules\Rating\Models\Rating;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RatingResource extends XotBaseResource
{
    protected static ?string $model = Rating::class;

<<<<<<< HEAD
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
>>>>>>> d37c2e9 (.)

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('extra_attributes.type'),
            TextInput::make('extra_attributes.anno'),
            TextInput::make('title')->autofocus()->required(),
            ColorPicker::make('color'),
            Radio::make('rule')->options(RuleEnum::class),
            Section::make()
<<<<<<< HEAD
                ->columnSpanFull()
=======
>>>>>>> d37c2e9 (.)
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
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListRatings::route('/'),
            'create' => CreateRating::route('/create'),
            'edit' => EditRating::route('/{record}/edit'),
        ];
    }
}
