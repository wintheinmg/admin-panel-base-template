<?php

    return [
        'user_management' => [
            'title' => 'User Management',
        ],
        'user'  => [
            'title' => 'Users',
            'title_singular' => 'User',
            'fields'=> [
                'name'  =>  'Name',
                'email' =>  'Email',
                'role'  =>  'Role',
                'password' => 'Password',
                'confirm_password' => 'Confirm Password',
            ]
        ],
        'role'  => [
            'title' => 'Roles',
            'title_singular' => 'Role',
            'fields'=> [
                'name'  =>  'Name',
            ]
        ],
        'permission'  => [
            'title' => 'Permissions',
            'title_singular' => 'Permission',
        ],
        'station'   =>  [
            'title' =>  'Stations',
            'title_singular' => 'Station',
            'fields' => [
                'name'  =>  'Name',
                'region'=>  'Region',
                'state' =>  'State',
                'township' =>  'Township',
                'lat'   =>  'Lat',
                'long'  =>  'Long',
            ]
        ]
    ];
