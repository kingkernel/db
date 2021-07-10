<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit75cddf6bcbf4c951905e887267bf9407
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kingkernel\\Database\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kingkernel\\Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit75cddf6bcbf4c951905e887267bf9407::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit75cddf6bcbf4c951905e887267bf9407::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit75cddf6bcbf4c951905e887267bf9407::$classMap;

        }, null, ClassLoader::class);
    }
}
