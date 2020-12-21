<?php

/** Defino o local da classe */
namespace vendor\model;

class Md5
{

    /** Parâmetros da classe */
    private $string = null;

    /** Criptografia de dados */
    public function encrypt($string)
    {

        /** Parâmetros de entrada */
        $this->string = $string;

        /** Retorno da informação */
        return md5($this->string);

    }

}