<?php


return [
    'models'=>[
        'admins'=>['c','r','u','d'],
        'roles'=>['c','r','u','d']
    ],
    'map'=>[
        'c'=>'create',
        'r'=>'read',
        'u'=>'update',
        'd'=>'delete',
        'vp'=>'view-profile',
        'up'=>'update-profile',
        'sd'=>'soft-delete',
        'rd'=>'restore-deleted'
    ],
    'roles'=>[
        'admins'=>'Super Admin'
    ]
];
