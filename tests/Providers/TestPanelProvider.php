<?php

namespace Brimham\FilamentBackupMonitor\Tests\Providers;

use Brimham\FilamentBackupMonitor\FilamentBackupMonitorPlugin;
use Filament\Panel;
use Filament\PanelProvider;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->plugin(FilamentBackupMonitorPlugin::make());
    }
}
