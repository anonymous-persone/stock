<?php

return [
    'model_defaults' => [
        'namespace'       => 'App\\Models',
        'base_class_name' => Illuminate\Database\Eloquent\Model::class,
        'output_path'     => 'Models',
        'no_timestamps'   => null,
        'date_format'     => null,
        'connection'      => null, // mysql
        'backup'          => null,
        'db_types' => ['enum' => 'string'],
    ],
];