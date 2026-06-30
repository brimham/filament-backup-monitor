<?php

use Brimham\FilamentBackupMonitor\Widgets\LatestBackupsWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

// getStats() is Filament's protected hook; bind a closure to reach it.
function statsFor(LatestBackupsWidget $widget): array
{
    return (fn () => $this->getStats())->call($widget);
}

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

it('builds one stat per destination', function () {
    makeRun(['disk' => 's3']);
    makeRun(['disk' => 'local', 'status' => 'failed', 'message' => 'disk full']);

    $stats = statsFor(new LatestBackupsWidget);

    expect($stats)->toHaveCount(2)
        ->and($stats)->each->toBeInstanceOf(Stat::class);
});

it('falls back to a single empty-state stat', function () {
    $stats = statsFor(new LatestBackupsWidget);

    expect($stats)->toHaveCount(1)
        ->and($stats[0])->toBeInstanceOf(Stat::class);
});
