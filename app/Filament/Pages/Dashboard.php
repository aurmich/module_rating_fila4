<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Pages;

<<<<<<< HEAD
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected string $view = 'rating::filament.pages.dashboard';
}
=======
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{

    protected string $view = 'rating::filament.pages.dashboard';
} 
>>>>>>> d37c2e9 (.)
