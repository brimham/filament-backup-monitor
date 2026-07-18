<?php

return [

    'navigation_label' => 'Yedeklemeler',
    'title' => 'Yedekleme çalışmaları',

    'columns' => [
        'when' => 'Zaman',
        'type' => 'Tür',
        'status' => 'Durum',
        'backup' => 'Yedekleme',
        'disk' => 'Disk',
        'size' => 'Boyut',
        'message' => 'Mesaj',
    ],

    'types' => [
        'backup' => 'Yedekleme',
        'health_check' => 'Sağlık kontrolü',
        'cleanup' => 'Temizleme',
    ],

    'statuses' => [
        'success' => 'Başarılı',
        'failed' => 'Başarısız',
        'healthy' => 'Sağlıklı',
        'unhealthy' => 'Sağlıksız',
    ],

    'widget' => [
        'heading' => 'Hedef başına son yedekleme',
        'empty_title' => 'Henüz yedekleme yok',
        'empty_value' => 'Kayıt yok',
        'empty_description' => 'Yedekleme çalışmaları başladığında burada görünecek',
        'failed' => 'Başarısız',
        'default_disk' => 'varsayılan',
        'unknown' => 'bilinmiyor',
    ],

];
