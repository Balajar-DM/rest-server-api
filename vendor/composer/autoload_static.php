<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0b2c9986cf67040ce6006536e475ac8
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0b2c9986cf67040ce6006536e475ac8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0b2c9986cf67040ce6006536e475ac8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0b2c9986cf67040ce6006536e475ac8::$classMap;

        }, null, ClassLoader::class);
    }
}
