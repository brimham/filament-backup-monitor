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

    protected static ?string $navigationLabel = 'Backups';

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

    public function getTitle(): string|Htmlable
    {
        return 'Backup runs';
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
                    ->label('When')
                    ->dateTime()
                    ->since()
                    ->sortable(),
                TextColumn::make('type')
                    ->badge()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'success', 'healthy' => 'success',
                        'failed', 'unhealthy' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('backup_name')
                    ->label('Backup')
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('disk')
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('size_in_bytes')
                    ->label('Size')
                    ->formatStateUsing(fn (?int $state): string => $state ? Number::fileSize($state) : '—'),
                TextColumn::make('message')
                    ->limit(60)
                    ->placeholder('—')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'backup' => 'Backup',
                        'health_check' => 'Health check',
                        'cleanup' => 'Cleanup',
                    ]),
                SelectFilter::make('status')
                    ->options([
                        'success' => 'Success',
                        'failed' => 'Failed',
                        'healthy' => 'Healthy',
                        'unhealthy' => 'Unhealthy',
                    ]),
            ]);
    }
}
