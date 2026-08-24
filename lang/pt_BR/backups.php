<?php

return [

    'navigation_label' => 'Backups',
    'title' => 'Execuções de backup',

    'columns' => [
        'when' => 'Quando',
        'type' => 'Tipo',
        'status' => 'Status',
        'backup' => 'Backup',
        'disk' => 'Disco',
        'size' => 'Tamanho',
        'message' => 'Mensagem',
    ],

    'types' => [
        'backup' => 'Backup',
        'health_check' => 'Verificação de saúde',
        'cleanup' => 'Limpeza',
    ],

    'statuses' => [
        'success' => 'Sucesso',
        'failed' => 'Falhou',
        'healthy' => 'Saudável',
        'unhealthy' => 'Com problemas',
    ],

    'widget' => [
        'heading' => 'Último backup por destino',
        'empty_title' => 'Nenhum backup ainda',
        'empty_value' => 'Nada registrado',
        'empty_description' => 'As execuções de backup aparecerão aqui assim que começarem',
        'failed' => 'Falhou',
        'default_disk' => 'padrão',
        'unknown' => 'desconhecido',
    ],

    'pro_notice' => 'Esta página registra o que foi executado — ela não consegue ver um backup que silenciosamente nunca rodou.',
    'pro_notice_link' => 'Detecte backups perdidos com o Pro',

];
