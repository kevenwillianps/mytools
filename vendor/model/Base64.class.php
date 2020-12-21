<?php

/** Defino o local da classe */
namespace vendor\model;

class Base64
{

    /** Parâmetros da classe */
    private $string = null;

    /** Criptografia de dados */
    public function encrypt($string)
    {

        /** Parâmetros de entrada */
        $this->string = $string;

        /** Retorno da informação */
        return base64_encode($this->string);

    }

}