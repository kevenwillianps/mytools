<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Local onde a classe esta localizada **/
namespace vendor\model;

class Cpf
{

    /** Declaro as vaiavéis da classe */
    private $mascara;

    public function __construct()
    {

        /** Cria os objetos */
        $this->mascara = 0;

    }

    /**
     * Método para gerar CPF válido, com máscara ou não
     * @example cpfRandom(0)
     *          para retornar CPF sem máscar
     * @param int $mascara
     * @return string
     */
    public static function generateCpf($mascara = 0) {

        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = rand(0, 9);
        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
        $d1 = 11 - (self::mod($d1, 11));

        if ($d1 >= 10)
        {

            $d1 = 0;


        }

        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - (self::mod($d2, 11));

        if ($d2 >= 10)
        {

            $d2 = 0;

        }

        $retorno = '';

        if ($mascara == 1)
        {

            $retorno = '' . $n1 . $n2 . $n3 . "." . $n4 . $n5 . $n6 . "." . $n7 . $n8 . $n9 . "-" . $d1 . $d2;

        } else {

            $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;

        }

        return $retorno;
    }

    /**
     * @param type $dividendo
     * @param type $divisor
     * @return type
     */
    private static function mod($dividendo, $divisor) {

        return round($dividendo - (floor($dividendo / $divisor) * $divisor));

    }

}
