<?php

return [

    'navigation_label' => 'Backups',
    'title' => 'Backup-Läufe',

    'columns' => [
        'when' => 'Zeitpunkt',
        'type' => 'Typ',
        'status' => 'Status',
        'backup' => 'Backup',
        'disk' => 'Datenträger',
        'size' => 'Größe',
        'message' => 'Meldung',
    ],

    'types' => [
        'backup' => 'Backup',
        'health_check' => 'Zustandsprüfung',
        'cleanup' => 'Bereinigung',
    ],

    'statuses' => [
        'success' => 'Erfolgreich',
        'failed' => 'Fehlgeschlagen',
        'healthy' => 'Fehlerfrei',
        'unhealthy' => 'Fehlerhaft',
    ],

    'widget' => [
        'heading' => 'Letztes Backup pro Ziel',
        'empty_title' => 'Noch keine Backups',
        'empty_value' => 'Nichts erfasst',
        'empty_description' => 'Backup-Läufe erscheinen hier, sobald sie starten',
        'failed' => 'Fehlgeschlagen',
        'default_disk' => 'Standard',
        'unknown' => 'unbekannt',
    ],

    'pro_notice' => 'Diese Seite zeichnet auf, was gelaufen ist — ein Backup, das stillschweigend nie gestartet wurde, kann sie nicht sehen.',
    'pro_notice_link' => 'Verpasste Backups mit Pro erkennen',

];
