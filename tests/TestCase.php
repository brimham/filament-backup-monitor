<?php

namespace Brimham\FilamentBackupMonitor\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Brimham\BackupMonitor\BackupMonitorServiceProvider;
use Brimham\FilamentBackupMonitor\FilamentBackupMonitorServiceProvider;
use Brimham\FilamentBackupMonitor\Tests\Providers\TestPanelProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Schemas\SchemaServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Backup\BackupServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        // Filament split into separate provider classes that shifted across
        // majors (Schemas/Infolists exist on v4+, not v3). class_exists keeps
        // one harness green on Filament 3, 4 and 5 — only register what's there.
        $providers = [
            LivewireServiceProvider::class,
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            SupportServiceProvider::class,
            ActionsServiceProvider::class,
            FormsServiceProvider::class,
            InfolistsServiceProvider::class,
            SchemaServiceProvider::class,
            NotificationsServiceProvider::class,
            TablesServiceProvider::class,
            WidgetsServiceProvider::class,
            FilamentServiceProvider::class,
            BackupServiceProvider::class,
            BackupMonitorServiceProvider::class,
            FilamentBackupMonitorServiceProvider::class,
            TestPanelProvider::class,
        ];

        return array_values(array_filter($providers, 'class_exists'));
    }
}
