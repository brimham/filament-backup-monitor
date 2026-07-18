<?php

return [

    'navigation_label' => 'Sauvegardes',
    'title' => 'Exécutions de sauvegarde',

    'columns' => [
        'when' => 'Quand',
        'type' => 'Type',
        'status' => 'Statut',
        'backup' => 'Sauvegarde',
        'disk' => 'Disque',
        'size' => 'Taille',
        'message' => 'Message',
    ],

    'types' => [
        'backup' => 'Sauvegarde',
        'health_check' => 'Vérification de santé',
        'cleanup' => 'Nettoyage',
    ],

    'statuses' => [
        'success' => 'Réussie',
        'failed' => 'Échouée',
        'healthy' => 'Saine',
        'unhealthy' => 'Défaillante',
    ],

    'widget' => [
        'heading' => 'Dernière sauvegarde par destination',
        'empty_title' => 'Aucune sauvegarde pour le moment',
        'empty_value' => 'Rien d\'enregistré',
        'empty_description' => 'Les exécutions de sauvegarde apparaîtront ici une fois démarrées',
        'failed' => 'Échouée',
        'default_disk' => 'par défaut',
        'unknown' => 'inconnu',
    ],

];
