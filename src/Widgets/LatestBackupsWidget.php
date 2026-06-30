<?php

namespace Brimham\FilamentBackupMonitor\Widgets;

use Brimham\BackupMonitor\Models\BackupRun;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class LatestBackupsWidget extends Widget
{
    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }

    // Rendered explicitly rather than through a $view property: Filament moved
    // Widget::$view from a static (v3) to a non-static instance property (v5),
    // so a redeclared property cannot satisfy both. render() is stable.
    public function render(): View
    {
        return view('filament-backup-monitor::widgets.latest-backups', $this->getViewData());
    }

    /**
     * @return Collection<int, BackupRun>
     */
    public function getLatestPerDisk(): Collection
    {
        return BackupRun::latestPerDisk();
    }
}
