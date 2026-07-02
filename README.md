<p align="center">
  <img class="filament-hidden" src="https://raw.githubusercontent.com/brimham/filament-backup-monitor/main/art/thumbnail.png" alt="Filament Backup Monitor — backup run history and health, right in your Filament panel" width="840">
</p>

# Filament Backup Monitor

A [Filament](https://filamentphp.com) panel for [brimham/backup-monitor](https://github.com/brimham/backup-monitor) — see the history of every [spatie/laravel-backup](https://github.com/spatie/laravel-backup) run and the last backup per destination at a glance.

The core `brimham/backup-monitor` package records each backup run to a `backup_runs` table. This package surfaces that history inside your Filament admin panel:

- a **run-history table** — every backup, health-check and cleanup with its status, destination, size and timestamp
- a **"last backup per destination" health panel** — the most recent run for each disk, so a silently failing destination is obvious

This is the free core. Proactive alerting on missed/silent failures and a multi-site dashboard live in Pro — see [Upgrade to Pro](#upgrade-to-pro).

## Screenshot

<p align="center">
  <img src="https://raw.githubusercontent.com/brimham/filament-backup-monitor/main/art/backup-monitor.png" alt="The Backups page: the last-backup-per-destination health panel above the run-history table" width="700">
</p>

## Requirements

- PHP 8.3+
- Laravel 12 or 13
- Filament 3, 4 or 5
- [brimham/backup-monitor](https://github.com/brimham/backup-monitor) (installed automatically)

## Installation

```bash
composer require brimham/filament-backup-monitor
```

Run the core package's migration if you haven't already:

```bash
php artisan migrate
```

## Usage

Register the plugin on the panel where you want the backup history to appear:

```php
use Brimham\FilamentBackupMonitor\FilamentBackupMonitorPlugin;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugin(FilamentBackupMonitorPlugin::make());
}
```

A **Backups** item appears in the panel navigation, linking to the run-history page with the health panel at the top.

## Upgrade to Pro

This panel shows you the history of backups that *ran*. It can't show you the backup that
**silently stopped running** — there's no event to record, so a destination that quietly dies just
stops updating while everything still looks fine. That's the failure that actually loses data.
[**Brimham Backup Monitor Pro**](https://brimham.app) closes that gap:

- **Missed / overdue detection** — a dead-man's-switch that flags any destination whose last
  successful backup is older than its expected cadence (or has never run).
- **Multi-channel alerting** — mail, Slack, Discord, Teams, and webhooks, de-duplicated and
  escalating, with recovery notifications.
- **External heartbeat** — ping healthchecks.io / Cronitor as backups run, catching an outage even
  if the whole app and scheduler are down.

Running backups across many sites? The
[**Filament Backup Monitor Collector**](https://github.com/brimham/filament-backup-monitor-collector)
is a companion Filament plugin that ingests every install's health snapshot into a single
multi-site dashboard — overdue destinations, last successful backup, and installs that have gone
quiet, all in one panel.

[**Get Pro →**](https://brimham.app)

## License

MIT. See [LICENSE](https://github.com/brimham/filament-backup-monitor/blob/main/LICENSE).
