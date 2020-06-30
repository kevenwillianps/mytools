<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Local onde esta localizado a classe **/
namespace vendor\model;

class Md5
{

    /** Declaração de variaveis utilizadas na classe **/
    private $text;

    public function __construct()
    {

        /** Criação dos objetos **/
        $this->text = null;

    }

    /**
     * Codifica o Texto de Entrada
     ***/
    public function encode($text)
    {

        /** Parâmetros de entrada **/
        $this->text = (string)$text;

        /** Retorno o texto codificado **/
        return md5($this->text);

    }

}
