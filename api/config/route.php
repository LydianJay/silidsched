<?php 


return [
    [
        'name'  => 'Dashboard',
        'route' => 'dashboard',
        'role'  => ['user', 'admin'],
    ],
    [
        'name'  => 'Add Building',
        'route' => 'add_building', 
        'role'  => ['admin'],
    ],
    
    [
        'name'  => 'Delete Building',
        'route' => 'delete_building', 
        'role'  => ['admin'],
    ],

    [
        'name'  => 'Add Room',
        'route' => 'add_room', 
        'role'  => ['admin'],
    ],

    [
        'name'  => 'Delete Room',
        'route' => 'delete_room', 
        'role'  => ['admin'],
    ],

    [
        'name'  => 'Users',
        'route' => 'users', 
        'role'  => ['admin'],
    ],


    [
        'name'  => 'Logout',
        'route' => 'logout', 
        'role'  => ['user', 'admin'],
    ],
];