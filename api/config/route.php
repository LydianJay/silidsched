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
        'role'  => ['user', 'admin'],
    ],
    [
        'name'  => 'Add Room',
        'route' => 'add_room', 
        'role'  => ['user', 'admin'],
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