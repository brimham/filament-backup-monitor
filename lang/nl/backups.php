<?php

return [

    'navigation_label' => 'Back-ups',
    'title' => 'Back-upuitvoeringen',

    'columns' => [
        'when' => 'Wanneer',
        'type' => 'Type',
        'status' => 'Status',
        'backup' => 'Back-up',
        'disk' => 'Schijf',
        'size' => 'Grootte',
        'message' => 'Bericht',
    ],

    'types' => [
        'backup' => 'Back-up',
        'health_check' => 'Gezondheidscontrole',
        'cleanup' => 'Opschoning',
    ],

    'statuses' => [
        'success' => 'Geslaagd',
        'failed' => 'Mislukt',
        'healthy' => 'Gezond',
        'unhealthy' => 'Ongezond',
    ],

    'widget' => [
        'heading' => 'Laatste back-up per bestemming',
        'empty_title' => 'Nog geen back-ups',
        'empty_value' => 'Niets geregistreerd',
        'empty_description' => 'Back-upuitvoeringen verschijnen hier zodra ze starten',
        'failed' => 'Mislukt',
        'default_disk' => 'standaard',
        'unknown' => 'onbekend',
    ],

    'pro_notice' => 'Deze pagina registreert wat er is uitgevoerd — een back-up die stilletjes nooit is gestart, kan ze niet zien.',
    'pro_notice_link' => 'Spoor gemiste back-ups op met Pro',

];
