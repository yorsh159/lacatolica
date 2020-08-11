<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit426af10c259880ceee0913499a2ac89c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit426af10c259880ceee0913499a2ac89c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit426af10c259880ceee0913499a2ac89c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}