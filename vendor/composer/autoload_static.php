<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcefbe9cd7182f91e6b6576e97cf9034
{
    public static $files = array (
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..',
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..',
        'a1105708a18b76903365ca1c4aa61b02' => __DIR__ . '/..',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..',
        '60799491728b879e74601d83e38b2cad' => __DIR__ . '/..',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..',
    );

    public static $prefixLengthsPsr4 = array (
        'v' =>
        array (
            'voku\\' => 5,
        ),
        'S' =>
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'P' =>
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'Psr\\Container\\' => 14,
        ),
        'I' =>
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Contracts\\' => 21,
        ),
        'G' =>
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'D' =>
        array (
            'Doctrine\\Inflector\\' => 19,
        ),
        'C' =>
        array (
            'Carbon\\' => 7,
        ),
        'B' =>
        array (
            'BeeDelivery\\LaraiFood\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'voku\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Symfony\\Polyfill\\Php80\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Symfony\\Polyfill\\Mbstring\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Symfony\\Contracts\\Translation\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Symfony\\Component\\Translation\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Psr\\SimpleCache\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Psr\\Http\\Message\\' =>
        array (
            0 => __DIR__ . '/..',
            1 => __DIR__ . '/..',
        ),
        'Psr\\Http\\Client\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Psr\\Container\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Illuminate\\Support\\' =>
        array (
            0 => __DIR__ . '/..',
            1 => __DIR__ . '/..',
            2 => __DIR__ . '/..',
        ),
        'Illuminate\\Contracts\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'GuzzleHttp\\Psr7\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'GuzzleHttp\\Promise\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'GuzzleHttp\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Doctrine\\Inflector\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'Carbon\\' =>
        array (
            0 => __DIR__ . '/..',
        ),
        'BeeDelivery\\LaraiFood\\' =>
        array (
            0 => __DIR__ . '/../..',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..',
        'Composer\\InstalledVersions' => __DIR__ . '/..',
        'Stringable' => __DIR__ . '/..',
        'UnhandledMatchError' => __DIR__ . '/..',
        'ValueError' => __DIR__ . '/..',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcefbe9cd7182f91e6b6576e97cf9034::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcefbe9cd7182f91e6b6576e97cf9034::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcefbe9cd7182f91e6b6576e97cf9034::$classMap;

        }, null, ClassLoader::class);
    }
}
