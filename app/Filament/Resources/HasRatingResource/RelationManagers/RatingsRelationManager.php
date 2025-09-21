<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\HasRatingResource\RelationManagers;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
<<<<<<< HEAD
=======
=======
use Filament\Forms;
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class RatingsRelationManager extends RelationManager
{
    protected static string $relationship = 'ratings';

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
<<<<<<< HEAD
=======
=======
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
<<<<<<< HEAD
                TextColumn::make('id'),
                TextColumn::make('title'),
                TextColumn::make('pivot.user.name'),
=======
<<<<<<< HEAD
                TextColumn::make('id'),
                TextColumn::make('title'),
                TextColumn::make('pivot.user.name'),
=======
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('pivot.user.name'),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                /*
                Tables\Columns\TextColumn::make('user.name')->default(function($record){
                    if($record->pivot->user_id==null){
                        return null;
                    }
                    return $record->pivot->user->name;
                }),
                */
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
                TextColumn::make('value'),
                TextColumn::make('is_winner'),
                TextColumn::make('reward'),
                TextColumn::make('updated_at'),
<<<<<<< HEAD
=======
=======
                Tables\Columns\TextColumn::make('value'),
                Tables\Columns\TextColumn::make('is_winner'),
                Tables\Columns\TextColumn::make('reward'),
                Tables\Columns\TextColumn::make('updated_at'),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
            ])
            ->filters([
            ])
            ->headerActions([
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
<<<<<<< HEAD
=======
=======
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                ]),
            ]);
    }
}
