<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Rating\Filament\Actions\Table;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
=======
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
=======
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;
>>>>>>> origin/develop
>>>>>>> d06edcd (.)

class BetTableAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel();
        $this->label('')
            ->tooltip(trans('rating:txt.bet'))
            ->modalWidth('xl')
<<<<<<< HEAD
            ->schema(fn (Action $action): array => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->schema(fn (Action $action): array => [
=======
            ->form(fn (Action $action): array => [
>>>>>>> a12f125f4a (.)
=======
            ->schema(fn (Action $action): array => [
>>>>>>> b93ef594b4 (.)
=======
            ->form(fn (Action $action): array => [
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                TextInput::make('aa'),
            ]);
    }

    public static function getDefaultName(): ?string
    {
        return 'bet_action';
    }
}
