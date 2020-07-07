<?php
/**
 * Classe Lista.class.php
 * @filesource
 * @autor		Kenio de Souza
 * @copyright	Copyright 2016 Serenity Informatica
 * @package		class
 * @subpackage	class.class
 * @version		1.0
 * Total de campos para essa classe [8]
 */

/** Defino o local onde esta a classe **/
namespace vendor\model;

class Main
{
    public function antiInjection($str, $long = '')
    {

        if ((!is_array($str)) && $long != 'S') {

            $badchar[1] = " drop ";
            $badchar[2] = " select ";
            $badchar[3] = " delete ";
            $badchar[4] = " update ";
            $badchar[5] = " insert ";
            $badchar[6] = " alter ";
            $badchar[7] = " destroy ";
            $badchar[8] = ' * ';
            $badchar[9] = " database ";
            $badchar[10] = " drop ";
            $badchar[11] = " union ";
            $badchar[12] = " TABLE_NAME ";
            $badchar[13] = " 1=1 ";
            $badchar[14] = ' or 1 ';
            $badchar[15] = ' exec ';
            $badchar[16] = ' INFORMATION_SCHEMA ';
            $badchar[17] = ' TABLE_NAME ';
            $badchar[18] = ' like ';
            $badchar[19] = ' COLUMNS ';
            $badchar[20] = ' into ';
            $badchar[21] = ' VALUES ';
            $badchar[22] = ' from ';
            $badchar[23] = ' From ';
            $badchar[24] = ' undefined ';

            $y = 1;
            $x = sizeof($badchar);

            while ($y <= $x) {

                $pos = strpos(strtolower($str), strtolower($badchar[$y]));

                if ($pos !== false) {

                    $str = str_replace(strtolower($badchar[$y]), "", strtolower($str));

                }

                $y++;

            }

            $str = trim($str); //limpa espaços vazio
            $str = strip_tags($str); //tira tags html e php
            $str = addslashes($str); //Adiciona barras invertidas a uma string
            $str = htmlspecialchars($str); //Evita ataques XSS
            return utf8_decode($str);

        } elseif ((!is_array($str)) && $long == 'S') {

            return utf8_decode(addslashes($str));

        } else {

            return $str;

        }

    }

}
