<?php

return [

    'navigation_label' => 'Copias de seguridad',
    'title' => 'Ejecuciones de copia de seguridad',

    'columns' => [
        'when' => 'Cuándo',
        'type' => 'Tipo',
        'status' => 'Estado',
        'backup' => 'Copia de seguridad',
        'disk' => 'Disco',
        'size' => 'Tamaño',
        'message' => 'Mensaje',
    ],

    'types' => [
        'backup' => 'Copia de seguridad',
        'health_check' => 'Verificación de estado',
        'cleanup' => 'Limpieza',
    ],

    'statuses' => [
        'success' => 'Exitosa',
        'failed' => 'Fallida',
        'healthy' => 'Saludable',
        'unhealthy' => 'No saludable',
    ],

    'widget' => [
        'heading' => 'Última copia de seguridad por destino',
        'empty_title' => 'Aún no hay copias de seguridad',
        'empty_value' => 'Nada registrado',
        'empty_description' => 'Las ejecuciones de copia de seguridad aparecerán aquí una vez que comiencen',
        'failed' => 'Fallida',
        'default_disk' => 'predeterminado',
        'unknown' => 'desconocido',
    ],

    'pro_notice' => 'Esta página registra lo que se ejecutó — no puede ver una copia de seguridad que nunca llegó a ejecutarse.',
    'pro_notice_link' => 'Detecta copias de seguridad omitidas con Pro',

];
