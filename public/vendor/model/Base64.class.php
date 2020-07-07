<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Informo onde esta localizado a classe **/
namespace vendor\model;

class Base64
{

    /**
     * Codifica o Texto de Entrada
     **/
    public function encode($text)
    {

        /** Parâmetros de entrada **/
        $this->text = (string)$text;

        /** Retorno o texto codificado **/
        return base64_encode($this->text);
    }

    /**
     * Decodifica o Texto de Entrada
     **/
    public function decode($text)
    {

        /** Parâmetros de entrada **/
        $this->text = (string)$text;

        /** Retorno o texto codificado **/
        return base64_decode($this->text);
    }
}
