<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit49395206309a96f8f586a0d39796f00f
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit49395206309a96f8f586a0d39796f00f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit49395206309a96f8f586a0d39796f00f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit49395206309a96f8f586a0d39796f00f::$classMap;

        }, null, ClassLoader::class);
    }
}
