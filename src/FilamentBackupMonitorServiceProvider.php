<?php

namespace Brimham\FilamentBackupMonitor;

use Illuminate\Support\ServiceProvider;

class FilamentBackupMonitorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-backup-monitor');
    }
}
