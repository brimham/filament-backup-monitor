<?php

use Brimham\BackupMonitor\Models\BackupRun;
use Brimham\FilamentBackupMonitor\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class)->in(__DIR__);

function makeRun(array $attributes = []): BackupRun
{
    return BackupRun::create(array_merge([
        'type' => 'backup',
        'status' => 'success',
        'backup_name' => 'Test App',
        'disk' => 'local',
        'size_in_bytes' => 1024,
        'path' => 'Test App/backup.zip',
    ], $attributes));
}
