<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a0b0ca989cbfdc911b214b54284bbbe
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RajibsEnglish\\' => 14,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RajibsEnglish\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/RajibsEnglish',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a0b0ca989cbfdc911b214b54284bbbe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a0b0ca989cbfdc911b214b54284bbbe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0a0b0ca989cbfdc911b214b54284bbbe::$classMap;

        }, null, ClassLoader::class);
    }
}
