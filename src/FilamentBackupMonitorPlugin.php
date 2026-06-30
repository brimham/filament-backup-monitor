<?php

namespace Brimham\FilamentBackupMonitor;

use Brimham\FilamentBackupMonitor\Pages\BackupRunsPage;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentBackupMonitorPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-backup-monitor';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            BackupRunsPage::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
