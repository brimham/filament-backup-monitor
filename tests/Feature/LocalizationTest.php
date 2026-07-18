<?php

use Brimham\FilamentBackupMonitor\Pages\BackupRunsPage;
use Brimham\FilamentBackupMonitor\Widgets\LatestBackupsWidget;

it('resolves copy through the package translation namespace', function () {
    expect(__('filament-backup-monitor::backups.title'))->toBe('Backup runs')
        ->and(BackupRunsPage::getNavigationLabel())->toBe('Backups');
});

it('translates the page title and widget heading when the locale changes', function () {
    app('translator')->addLines([
        'backups.title' => 'Exécutions de sauvegarde',
        'backups.widget.heading' => 'Dernière sauvegarde par destination',
    ], 'fr', 'filament-backup-monitor');

    app()->setLocale('fr');

    expect(BackupRunsPage::getNavigationLabel())->toBe('Backups'); // untranslated key falls back to en

    $heading = (fn () => $this->getHeading())->call(new LatestBackupsWidget);

    expect($heading)->toBe('Dernière sauvegarde par destination');
});
