<?php

use Brimham\FilamentBackupMonitor\FilamentBackupMonitorPlugin;
use Brimham\FilamentBackupMonitor\Pages\BackupRunsPage;
use Brimham\FilamentBackupMonitor\Widgets\LatestBackupsWidget;
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

it('registers the header widget so isolated commits resolve by name', function () {
    // The page's header widget is isolated, so Livewire commits it via its own
    // by-name request. If the panel only renders it inline (never registers it
    // as a Livewire component), that request 419s. Assert it is registered and
    // resolves back to the widget class.
    $panel = Filament::getPanel('admin');
    $components = (fn () => $this->livewireComponents)->call($panel);

    $name = array_search(LatestBackupsWidget::class, $components, true);

    expect($name)->not->toBeFalse()
        ->and(app('livewire')->new($name))->toBeInstanceOf(LatestBackupsWidget::class);
});
