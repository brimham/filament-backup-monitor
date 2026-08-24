@unless (class_exists(\Brimham\BackupMonitorPro\BackupMonitorProServiceProvider::class))
    <p class="fi-ta-text-item text-sm text-gray-500 dark:text-gray-400">
        {{ __('filament-backup-monitor::backups.pro_notice') }}
        <x-filament::link href="https://brimham.app/plugins/backup-monitor-pro" target="_blank" rel="noopener" size="sm">
            {{ __('filament-backup-monitor::backups.pro_notice_link') }}
        </x-filament::link>
    </p>
@endunless
