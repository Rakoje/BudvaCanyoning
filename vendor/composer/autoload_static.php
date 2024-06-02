<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e4c94063c08ef3c1e4814a2c175056f
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e4c94063c08ef3c1e4814a2c175056f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e4c94063c08ef3c1e4814a2c175056f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e4c94063c08ef3c1e4814a2c175056f::$classMap;

        }, null, ClassLoader::class);
    }
}
