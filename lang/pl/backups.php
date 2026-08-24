<?php

return [

    'navigation_label' => 'Kopie zapasowe',
    'title' => 'Wykonania kopii zapasowych',

    'columns' => [
        'when' => 'Kiedy',
        'type' => 'Typ',
        'status' => 'Status',
        'backup' => 'Kopia zapasowa',
        'disk' => 'Dysk',
        'size' => 'Rozmiar',
        'message' => 'Komunikat',
    ],

    'types' => [
        'backup' => 'Kopia zapasowa',
        'health_check' => 'Kontrola stanu',
        'cleanup' => 'Czyszczenie',
    ],

    'statuses' => [
        'success' => 'Sukces',
        'failed' => 'Niepowodzenie',
        'healthy' => 'Sprawna',
        'unhealthy' => 'Niesprawna',
    ],

    'widget' => [
        'heading' => 'Ostatnia kopia zapasowa dla każdego miejsca docelowego',
        'empty_title' => 'Brak kopii zapasowych',
        'empty_value' => 'Nic nie zarejestrowano',
        'empty_description' => 'Wykonania kopii zapasowych pojawią się tutaj, gdy się rozpoczną',
        'failed' => 'Niepowodzenie',
        'default_disk' => 'domyślny',
        'unknown' => 'nieznany',
    ],

    'pro_notice' => 'Ta strona rejestruje, co zostało wykonane — nie widzi kopii zapasowej, która po cichu nigdy się nie uruchomiła.',
    'pro_notice_link' => 'Wykrywaj pominięte kopie zapasowe z Pro',

];
