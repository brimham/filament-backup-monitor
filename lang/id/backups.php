<?php

return [

    'navigation_label' => 'Backup',
    'title' => 'Riwayat backup',

    'columns' => [
        'when' => 'Waktu',
        'type' => 'Tipe',
        'status' => 'Status',
        'backup' => 'Backup',
        'disk' => 'Disk',
        'size' => 'Ukuran',
        'message' => 'Pesan',
    ],

    'types' => [
        'backup' => 'Backup',
        'health_check' => 'Pemeriksaan kesehatan',
        'cleanup' => 'Pembersihan',
    ],

    'statuses' => [
        'success' => 'Berhasil',
        'failed' => 'Gagal',
        'healthy' => 'Sehat',
        'unhealthy' => 'Tidak sehat',
    ],

    'widget' => [
        'heading' => 'Backup terakhir per destinasi',
        'empty_title' => 'Belum ada backup',
        'empty_value' => 'Belum ada yang tercatat',
        'empty_description' => 'Riwayat backup akan muncul di sini setelah backup mulai berjalan',
        'failed' => 'Gagal',
        'default_disk' => 'default',
        'unknown' => 'tidak diketahui',
    ],

];
