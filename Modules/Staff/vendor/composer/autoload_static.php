<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac1ffbd90e9f6824a62106c168b98356
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Staff\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Staff\\' =>
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac1ffbd90e9f6824a62106c168b98356::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac1ffbd90e9f6824a62106c168b98356::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
