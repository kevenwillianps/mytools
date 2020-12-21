<?php

/** Defino o local da classe */
namespace vendor\controller\Sha1;

/** Importação de classes */
use vendor\model\Main;

class Sha1Validate
{

    /** Parâmetros da Classe */
    private $main = null;
    private $errors = array();
    private $string = null;

    /** Método construtor */
    public function __construct()
    {

        /** Instânciamento de classes */
        $this->main = new Main();

    }

    public function setString($string)
    {

        /** Tratamento dos dados de entrada */
        $this->string = isset($string) ? (string)$this->main->antiInjection($string) : null;

        /** Validação dos dados */
        if (empty($this->string))
        {

            array_push($this->errors, array('string', 'O Campo "Texto", deve ser preenchido'));

        }

    }

    public function getString()
    {

        return $this->string;

    }

    public function getErrors()
    {

        return $this->errors;

    }

}