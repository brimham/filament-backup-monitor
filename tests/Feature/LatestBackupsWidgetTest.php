<?php

use Brimham\FilamentBackupMonitor\Widgets\LatestBackupsWidget;

it('surfaces the most recent run per disk', function () {
    makeRun(['disk' => 's3', 'created_at' => now()->subDay()]);
    makeRun(['disk' => 's3', 'status' => 'failed', 'created_at' => now()]);
    makeRun(['disk' => 'local', 'created_at' => now()->subHour()]);

    $runs = (new LatestBackupsWidget)->getLatestPerDisk();

    expect($runs)->toHaveCount(2)
        ->and($runs->firstWhere('disk', 's3')->status)->toBe('failed')
        ->and($runs->firstWhere('disk', 'local')->status)->toBe('success');
});

it('returns nothing when there are no backups', function () {
    expect((new LatestBackupsWidget)->getLatestPerDisk())->toBeEmpty();
});
