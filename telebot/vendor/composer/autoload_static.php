<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb25e603680267477d23a19dc4781479f
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TelegramBot\\Api\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TelegramBot\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/telegram-bot/api/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb25e603680267477d23a19dc4781479f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb25e603680267477d23a19dc4781479f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
