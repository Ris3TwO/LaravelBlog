<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Modules\\Admin\\Database\\Seeders\\AdminDatabaseSeeder' => $baseDir . '/Database/Seeders/AdminDatabaseSeeder.php',
    'Modules\\Admin\\Entities\\Photo' => $baseDir . '/Entities/Photo.php',
    'Modules\\Admin\\Http\\Controllers\\AdminController' => $baseDir . '/Http/Controllers/AdminController.php',
    'Modules\\Admin\\Http\\Controllers\\PhotosController' => $baseDir . '/Http/Controllers/PhotosController.php',
    'Modules\\Admin\\Http\\Controllers\\PostsController' => $baseDir . '/Http/Controllers/PostsController.php',
    'Modules\\Admin\\Http\\Requests\\StorePostRequest' => $baseDir . '/Http/Requests/StorePostRequest.php',
    'Modules\\Admin\\Policies\\PostPolicy' => $baseDir . '/Policies/PostPolicy.php',
    'Modules\\Admin\\Providers\\AdminServiceProvider' => $baseDir . '/Providers/AdminServiceProvider.php',
    'Modules\\Admin\\Providers\\RouteServiceProvider' => $baseDir . '/Providers/RouteServiceProvider.php',
);