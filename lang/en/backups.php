<?php

return [

    'navigation_label' => 'Backups',
    'title' => 'Backup runs',

    'columns' => [
        'when' => 'When',
        'type' => 'Type',
        'status' => 'Status',
        'backup' => 'Backup',
        'disk' => 'Disk',
        'size' => 'Size',
        'message' => 'Message',
    ],

    'types' => [
        'backup' => 'Backup',
        'health_check' => 'Health check',
        'cleanup' => 'Cleanup',
    ],

    'statuses' => [
        'success' => 'Success',
        'failed' => 'Failed',
        'healthy' => 'Healthy',
        'unhealthy' => 'Unhealthy',
    ],

    'widget' => [
        'heading' => 'Last backup per destination',
        'empty_title' => 'No backups yet',
        'empty_value' => 'Nothing recorded',
        'empty_description' => 'Backup runs will appear here once they start',
        'failed' => 'Failed',
        'default_disk' => 'default',
        'unknown' => 'unknown',
    ],

    'pro_notice' => 'This page records what ran — it can\'t see a backup that silently never fired.',
    'pro_notice_link' => 'Catch missed backups with Pro',

];
