<?php
/**
 * Created by PhpStorm.
 * User: KEVEN
 * Date: 08/07/2020
 * Time: 21:26
 */

namespace vendor\model;

class File
{

    /** Variaveis da Classes **/
    private $path = null;
    private $name = null;
    private $percent_compress = null;
    private $wideImage = null;

    public function __construct()
    {

        /** Instanciamento do manipulador da imagem **/
        $this->wideImage = new \WideImage();
    }

    public function handling($path, $name, $percent_compress)
    {

        /** Parâmetros de entrada **/
        $this->path             = (string)$path;
        $this->name             = (string)$name;
        $this->percent_compress = (int)$percent_compress;

        /** Corto a imagem para icone **/
        $this->wideImage = \WideImage::load($path.'/'.$name);
        $this->wideImage = $this->wideImage->saveToFile($path.'/compress/'.$name, floor($this->percent_compress));

        if (is_file($this->path.'/compress/'.$this->name)) {

            return true;

        } else {

            return false;

        }
    }

    public function __destruct()
    {

        /** Instanciamento do manipulador da imagem **/
        $this->wideImage = null;
    }
}
