<?php

namespace Brimham\FilamentBackupMonitor;

use Illuminate\Support\ServiceProvider;

class FilamentBackupMonitorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-backup-monitor');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'filament-backup-monitor');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../lang' => lang_path('vendor/filament-backup-monitor'),
            ], 'filament-backup-monitor-lang');
        }
    }
}
