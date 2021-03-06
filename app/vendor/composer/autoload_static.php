<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b5a08ed3656f5ed38c8996eadb8f4f0
{
    public static $classMap = array (
        'Agenda' => __DIR__ . '/../app' . '/app/model/Agenda.php',
        'CapacitandoNetModel' => __DIR__ . '/../app' . '/app/model/CapacitandoNetModel.php',
        'Crud' => __DIR__ . '/../app' . '/app/model/Crud.Class.php',
        'DB' => __DIR__ . '/../app' . '/app/model/ConexaoMysql.php',
        'Local' => __DIR__ . '/../app' . '/app/model/Local.php',
        'Postagem' => __DIR__ . '/../app' . '/app/model/Postagem.php',
        'Slider' => __DIR__ . '/../app' . '/app/model/Slider.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0b5a08ed3656f5ed38c8996eadb8f4f0::$classMap;

        }, null, ClassLoader::class);
    }
}
