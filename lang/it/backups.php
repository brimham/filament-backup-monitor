<?php

return [

    'navigation_label' => 'Backup',
    'title' => 'Esecuzioni di backup',

    'columns' => [
        'when' => 'Quando',
        'type' => 'Tipo',
        'status' => 'Stato',
        'backup' => 'Backup',
        'disk' => 'Disco',
        'size' => 'Dimensione',
        'message' => 'Messaggio',
    ],

    'types' => [
        'backup' => 'Backup',
        'health_check' => 'Controllo integrità',
        'cleanup' => 'Pulizia',
    ],

    'statuses' => [
        'success' => 'Riuscito',
        'failed' => 'Fallito',
        'healthy' => 'Integro',
        'unhealthy' => 'Non integro',
    ],

    'widget' => [
        'heading' => 'Ultimo backup per destinazione',
        'empty_title' => 'Ancora nessun backup',
        'empty_value' => 'Nessun dato registrato',
        'empty_description' => 'Le esecuzioni di backup compariranno qui una volta avviate',
        'failed' => 'Fallito',
        'default_disk' => 'predefinito',
        'unknown' => 'sconosciuto',
    ],

];
