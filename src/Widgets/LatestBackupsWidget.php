<?php

namespace Brimham\FilamentBackupMonitor\Widgets;

use Brimham\BackupMonitor\Models\BackupRun;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Collection;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class LatestBackupsWidget extends StatsOverviewWidget
{
    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }

    protected function getHeading(): ?string
    {
        return __('filament-backup-monitor::backups.widget.heading');
    }

    protected function getStats(): array
    {
        $runs = $this->getLatestPerDisk();

        if ($runs->isEmpty()) {
            return [
                Stat::make(
                    __('filament-backup-monitor::backups.widget.empty_title'),
                    __('filament-backup-monitor::backups.widget.empty_value'),
                )
                    ->description(__('filament-backup-monitor::backups.widget.empty_description'))
                    ->descriptionIcon('heroicon-m-information-circle')
                    ->color('gray'),
            ];
        }

        return $runs
            ->map(fn (BackupRun $run): Stat => $this->statFor($run))
            ->all();
    }

    /**
     * @return Collection<int, BackupRun>
     */
    public function getLatestPerDisk(): Collection
    {
        return BackupRun::latestPerDisk();
    }

    protected function statFor(BackupRun $run): Stat
    {
        $ok = $run->wasSuccessful();
        $when = $run->created_at?->format('M j, Y g:i A');

        $description = $ok
            ? collect([$run->size_in_bytes ? Number::fileSize($run->size_in_bytes) : null, $when])
                ->filter()->implode(' · ')
            : collect([__('filament-backup-monitor::backups.widget.failed').($run->message ? ': '.Str::limit($run->message, 60) : ''), $when])
                ->filter()->implode(' · ');

        return Stat::make(
            $run->disk ?? __('filament-backup-monitor::backups.widget.default_disk'),
            $run->created_at?->diffForHumans() ?? __('filament-backup-monitor::backups.widget.unknown'),
        )
            ->description($description)
            ->descriptionIcon($ok ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle')
            ->color($ok ? 'success' : 'danger');
    }
}
