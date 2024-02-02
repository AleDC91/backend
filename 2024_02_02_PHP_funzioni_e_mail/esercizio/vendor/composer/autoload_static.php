<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc75d35f8a5aa19b7543bcde755a18bc4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'D' => 
        array (
            'Dc\\Esercizio\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Dc\\Esercizio\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc75d35f8a5aa19b7543bcde755a18bc4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc75d35f8a5aa19b7543bcde755a18bc4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc75d35f8a5aa19b7543bcde755a18bc4::$classMap;

        }, null, ClassLoader::class);
    }
}
