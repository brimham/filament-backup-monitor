<?php

it('shows the Pro notice when the Pro package is absent', function () {
    // backup-monitor-pro is not a dependency of this suite, so the partial's
    // class_exists guard takes the visible branch here.
    $html = view('filament-backup-monitor::pages.pro-notice')->render();

    expect($html)->toContain(e(__('filament-backup-monitor::backups.pro_notice')))
        ->toContain(e(__('filament-backup-monitor::backups.pro_notice_link')))
        ->toContain('https://brimham.app/plugins/backup-monitor-pro');
});
