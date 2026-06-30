<?php

use Brimham\FilamentBackupMonitor\FilamentBackupMonitorPlugin;
use Brimham\FilamentBackupMonitor\Pages\BackupRunsPage;
use Filament\Facades\Filament;

it('exposes a stable plugin id', function () {
    expect(FilamentBackupMonitorPlugin::make()->getId())
        ->toBe('filament-backup-monitor');
});

it('registers the backup runs page on the panel', function () {
    expect(Filament::getPanel('admin')->getPages())
        ->toContain(BackupRunsPage::class);
});

it('gives the page a stable slug', function () {
    expect(BackupRunsPage::getSlug())->toBe('backup-runs');
});
