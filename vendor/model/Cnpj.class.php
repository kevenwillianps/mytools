<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Informo qual local a minha classe pertece **/
namespace vendor\model;

class Cnpj
{

    /**
     * Método para gerar CPF válido, com máscara ou não
     * @example cpfRandom(0)
     *          para retornar CPF sem máscar
     * @param int $mascara
     * @return string
     */
    /**
     * Método para gerar CNPJ válido, com máscara ou não
     * @example cnpjRandom(0)
     *          para retornar CNPJ sem máscar
     * @param int $mascara
     * @return string
     */
    public static function generateCnpj($mascara = "0")
    {
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = 0;
        $n10 = 0;
        $n11 = 0;
        $n12 = 1;
        $d1 = $n12 * 2 + $n11 * 3 + $n10 * 4 + $n9 * 5 + $n8 * 6 + $n7 * 7 + $n6 * 8 + $n5 * 9 + $n4 * 2 + $n3 * 3 + $n2 * 4 + $n1 * 5;
        $d1 = 11 - (self::mod($d1, 11));

        if ($d1 >= 10) {
            $d1 = 0;
        }

        $d2 = $d1 * 2 + $n12 * 3 + $n11 * 4 + $n10 * 5 + $n9 * 6 + $n8 * 7 + $n7 * 8 + $n6 * 9 + $n5 * 2 + $n4 * 3 + $n3 * 4 + $n2 * 5 + $n1 * 6;
        $d2 = 11 - (self::mod($d2, 11));

        if ($d2 >= 10) {
            $d2 = 0;
        }

        $retorno = '';

        if ($mascara == 1) {
            $retorno = '' . $n1 . $n2 . "." . $n3 . $n4 . $n5 . "." . $n6 . $n7 . $n8 . "/" . $n9 . $n10 . $n11 . $n12 . "-" . $d1 . $d2;
        } else {
            $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $n10 . $n11 . $n12 . $d1 . $d2;
        }

        return $retorno;
    }

    /**
     * @param type $dividendo
     * @param type $divisor
     * @return type
     */
    private static function mod($dividendo, $divisor)
    {
        return round($dividendo - (floor($dividendo / $divisor) * $divisor));
    }

    function validateCnpj($cnpj){
        //-----PRIMEIRA PARTE DA VERIFICAÇÃO----------
        $pesos = array (5,4,3,2,9,8,7,6,5,4,3,2);
        $arrayCnpj = array();
        $soma = 0;
        $cnpjVerificador = "";

        for($x=0;$x<=11;$x++){
            $arrayCnpj[$x] = $cnpj[$x];
            $soma = ($cnpj[$x] * $pesos[$x]) + $soma;

            $cnpjVerificador = $cnpjVerificador . "" . $cnpj[$x] . "";

        }
        //$cnpjVerificador = ($soma % 11) == 1 ? $cnpjVerificador . "0" : "";
        if(($soma % 11) < 2){
            $cnpjVerificador = $cnpjVerificador . "" . "0";
        }else{
            $cnpjVerificador = $cnpjVerificador . "" .(11 - (($soma % 11)));
        }
        //-----SEGUNDA PARTE DA VERIFICAÇÃO----------
        $soma = 0;
        array_unshift($pesos,6); //ADCIONA UM NOVO VALOR NOS PESOS.
        for($x=0;$x<=12;$x++){
            $soma = ($cnpj[$x] * $pesos[$x]) + $soma;
        }

        if(($soma % 11) < 2){
            $cnpjVerificador = $cnpjVerificador . "" . "0";
        }else{
            $cnpjVerificador = $cnpjVerificador . "" . (11 - (($soma % 11)));
        }
        //echo $cnpjVerificador; echo '<p>';
        //echo $cnpj;
        if($cnpj == $cnpjVerificador) {
            return true;
        }else{
            return false;
        }
    }

}