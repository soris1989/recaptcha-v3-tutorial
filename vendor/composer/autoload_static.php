<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit87b96cfc6cea9828a7acf17ebfe8d926
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'ReCaptcha\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ReCaptcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/google/recaptcha/src/ReCaptcha',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit87b96cfc6cea9828a7acf17ebfe8d926::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit87b96cfc6cea9828a7acf17ebfe8d926::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit87b96cfc6cea9828a7acf17ebfe8d926::$classMap;

        }, null, ClassLoader::class);
    }
}
