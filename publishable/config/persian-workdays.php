<?php

return [
    'weekend' => ['thursday', 'friday'],
    'work_start' => 8,
    'work_end' => 15,
    'views' => [
        /*
        |--------------------------------------------------------------------------
        | Edit to set the views data
        |--------------------------------------------------------------------------
        */

        'extend' => 'admin.app',
        'content' => 'content',
        'parsley' => 'content',

    ],
    'guard' => 'admin',
    'auth' => 'admin.',
    'route' => '.persian-workday',
    'as' => 'admin.persian-workday.',
    'prefix' => 'admin/persian-workday'

];