<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{

    protected string $view = 'rating::filament.pages.dashboard';
=======
use Filament\Pages\Page;

class Dashboard extends Page
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-home';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
>>>>>>> a12f125f4a (.)
=======
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-home';
>>>>>>> b93ef594b4 (.)

    protected string $view = 'rating::filament.pages.dashboard';
=======
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'rating::filament.pages.dashboard';
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
} 