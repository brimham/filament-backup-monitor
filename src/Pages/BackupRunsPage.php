<?php

namespace Brimham\FilamentBackupMonitor\Pages;

use Brimham\BackupMonitor\Models\BackupRun;
use Brimham\FilamentBackupMonitor\Widgets\LatestBackupsWidget;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Number;

class BackupRunsPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $slug = 'backup-runs';

    // The navigation icon, title and view are supplied through getters rather
    // than typed static properties: between v3 and v5 Filament retyped
    // $navigationIcon (added BackedEnum) and moved $view from a static to an
    // instance property, so no single redeclared property satisfies every
    // supported major. These getter signatures are stable across v3/v4/v5.
    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-circle-stack';
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-backup-monitor::backups.navigation_label');
    }

    public function getTitle(): string|Htmlable
    {
        return __('filament-backup-monitor::backups.title');
    }

    public function getView(): string
    {
        return 'filament-backup-monitor::pages.backup-runs';
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LatestBackupsWidget::class,
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(BackupRun::query())
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label(__('filament-backup-monitor::backups.columns.when'))
                    ->dateTime()
                    ->since()
                    ->sortable(),
                TextColumn::make('type')
                    ->label(__('filament-backup-monitor::backups.columns.type'))
                    ->badge()
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('filament-backup-monitor::backups.columns.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'success', 'healthy' => 'success',
                        'failed', 'unhealthy' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('backup_name')
                    ->label(__('filament-backup-monitor::backups.columns.backup'))
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('disk')
                    ->label(__('filament-backup-monitor::backups.columns.disk'))
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('size_in_bytes')
                    ->label(__('filament-backup-monitor::backups.columns.size'))
                    ->formatStateUsing(fn (?int $state): string => $state ? Number::fileSize($state) : '—'),
                TextColumn::make('message')
                    ->label(__('filament-backup-monitor::backups.columns.message'))
                    ->limit(60)
                    ->placeholder('—')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label(__('filament-backup-monitor::backups.columns.type'))
                    ->options([
                        'backup' => __('filament-backup-monitor::backups.types.backup'),
                        'health_check' => __('filament-backup-monitor::backups.types.health_check'),
                        'cleanup' => __('filament-backup-monitor::backups.types.cleanup'),
                    ]),
                SelectFilter::make('status')
                    ->label(__('filament-backup-monitor::backups.columns.status'))
                    ->options([
                        'success' => __('filament-backup-monitor::backups.statuses.success'),
                        'failed' => __('filament-backup-monitor::backups.statuses.failed'),
                        'healthy' => __('filament-backup-monitor::backups.statuses.healthy'),
                        'unhealthy' => __('filament-backup-monitor::backups.statuses.unhealthy'),
                    ]),
            ]);
    }
}
