<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit27e50982d8618b71b37b3f88f3305c53
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Admin\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Modules\\Admin\\Database\\Seeders\\AdminDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/AdminDatabaseSeeder.php',
        'Modules\\Admin\\Entities\\Photo' => __DIR__ . '/../..' . '/Entities/Photo.php',
        'Modules\\Admin\\Http\\Controllers\\AdminController' => __DIR__ . '/../..' . '/Http/Controllers/AdminController.php',
        'Modules\\Admin\\Http\\Controllers\\PhotosController' => __DIR__ . '/../..' . '/Http/Controllers/PhotosController.php',
        'Modules\\Admin\\Http\\Controllers\\PostsController' => __DIR__ . '/../..' . '/Http/Controllers/PostsController.php',
        'Modules\\Admin\\Http\\Requests\\StorePostRequest' => __DIR__ . '/../..' . '/Http/Requests/StorePostRequest.php',
        'Modules\\Admin\\Policies\\PostPolicy' => __DIR__ . '/../..' . '/Policies/PostPolicy.php',
        'Modules\\Admin\\Providers\\AdminServiceProvider' => __DIR__ . '/../..' . '/Providers/AdminServiceProvider.php',
        'Modules\\Admin\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/Providers/RouteServiceProvider.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit27e50982d8618b71b37b3f88f3305c53::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit27e50982d8618b71b37b3f88f3305c53::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit27e50982d8618b71b37b3f88f3305c53::$classMap;

        }, null, ClassLoader::class);
    }
}
