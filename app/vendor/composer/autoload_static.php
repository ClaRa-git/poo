<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita918513bb77d7d71337e29ff1f19b2ea
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symplefony\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symplefony\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Symplefony',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita918513bb77d7d71337e29ff1f19b2ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita918513bb77d7d71337e29ff1f19b2ea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita918513bb77d7d71337e29ff1f19b2ea::$classMap;

        }, null, ClassLoader::class);
    }
}
