<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Defino o local onde minha classe esta **/
namespace vendor\model;

class Css
{

    /** Comprimir css **/
    public function minify($text)
    {

        /** Parâmetros de Entrada **/
        $this->text = (string)$text;

        $find = array('!/\*.*?\*/!s',

            '/\n\s*\n/',
            '/[\n\r \t]/',
            '/ +/',
            '/ ?([,:;{}]) ?/',
            '/;}/'

        );

        $repl = array('',

            "\n",
            ' ',
            ' ',
            '$1',
            '}'

        );

        return preg_replace($find, $repl, $this->text);
    }

}
