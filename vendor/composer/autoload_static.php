<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03bb07965a84c3b73ae750d3fa5d9292
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit03bb07965a84c3b73ae750d3fa5d9292::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03bb07965a84c3b73ae750d3fa5d9292::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit03bb07965a84c3b73ae750d3fa5d9292::$classMap;

        }, null, ClassLoader::class);
    }
}
