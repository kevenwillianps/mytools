<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Informo o local onde a classe esta localizada **/
namespace vendor\model;

class Sha1
{

    /**
     * Codifica o Texto de Entrada
     ***/
    public function encode($text)
    {

        /** Parâmetros de entrada **/
        $this->text = (string)$text;

        /** Retorno o texto codificado **/
        return sha1($this->text);
    }
}
