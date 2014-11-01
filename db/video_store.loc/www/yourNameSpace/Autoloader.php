<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 0:51
 */

namespace yourNameSpace;
{

class Autoloader {

    const debug = 1;
    public function __construct(){}

    public static function autoload($file)
    {
        $file = str_replace('\\', '/', $file);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/application/';
        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/application/' . $file . '.php';

        if (file_exists($filepath))
        {
            if(Autoloader::debug) Autoloader::StPutFile(('подключили ' .$filepath));
            require_once($filepath);

        }
        else
        {
            $flag = true;
            if(Autoloader::debug) Autoloader::StPutFile(('начинаем рекурсивный поиск'));
            Autoloader::recursive_autoload($file, $path, &$flag);
        }
    }

    public static function recursive_autoload($file, $path, $flag)
    {
        if (FALSE !== ($handle = opendir($path)) && $flag)
        {
            while (FAlSE !== ($dir = readdir($handle)) && $flag)
            {

                if (strpos($dir, '.') === FALSE)
                {
                    $path2 = $path .'/' . $dir;
                    $filepath = $path2 . '/' . $file . '.php';
                    if(Autoloader::debug) Autoloader::StPutFile(('ищем файл <b>' .$file .'</b> in ' .$filepath));
                    if (file_exists($filepath))
                    {
                        if(Autoloader::debug) Autoloader::StPutFile(('подключили ' .$filepath ));
                        $flag = FALSE;
                        require_once($filepath);
                        break;
                    }
                    Autoloader::recursive_autoload($file, $path2, &$flag);
                }
            }
            closedir($handle);
        }
    }

    private static function StPutFile($data)
    {
        $dir = $_SERVER['DOCUMENT_ROOT'] .'.php';
        $file = fopen($dir, 'a');
        flock($file, LOCK_EX);
        fwrite($file, ('║' .$data .'=>' .date('d.m.Y H:i:s').'║' .PHP_EOL));
        flock($file, LOCK_UN);
        fclose ($file);
    }

}
\spl_autoload_register('yourNameSpace\Autoloader::autoload');

}