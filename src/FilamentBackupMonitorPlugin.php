<?php

namespace Brimham\FilamentBackupMonitor;

use Brimham\FilamentBackupMonitor\Pages\BackupRunsPage;
use Brimham\FilamentBackupMonitor\Widgets\LatestBackupsWidget;
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
        ])->livewireComponents([
            // The page's header widget is isolated, so Livewire commits it via
            // its own by-name request; without registering it the panel only
            // renders it inline and the follow-up 419s (release-token mismatch).
            LatestBackupsWidget::class,
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
