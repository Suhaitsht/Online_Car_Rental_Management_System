<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc8a9960779f3425b876c90e64c5ae804
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc8a9960779f3425b876c90e64c5ae804::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc8a9960779f3425b876c90e64c5ae804::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc8a9960779f3425b876c90e64c5ae804::$classMap;

        }, null, ClassLoader::class);
    }
}
