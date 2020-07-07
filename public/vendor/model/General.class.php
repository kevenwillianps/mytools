<?php
/**
 * Classe General.class.php
 * @filesource
 * @autor		Kenio de Souza
 * @copyright	Copyright 2019 - Kenio de Souza
 * @package		lib
 * @subpackage	lib.class
 * @version		1.0
 *
 */

namespace vendor\model;

class General
{

    /** Construtor da classe */
    public function __construct()
    {
        ob_start();

        /**Crio a sessão atual**/
        session_start();

        $this->Config = self::Conf();

        // Config database
        define("SERVER", $this
            ->Config
            ->general
            ->server);
        define("DATABASE", $this
            ->Config
            ->general
            ->database);
        define("USER", $this
            ->Config
            ->general
            ->user);
        define("PASS", $this
            ->Config
            ->general
            ->password);
    }

    //ANTIINJECTION
    public function AntiInjection($texto)
    {
        if (!is_array($texto)) {
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
                $pos = strpos(strtolower($texto), strtolower($badchar[$y]));
                if ($pos !== false) {
                    $texto = str_replace(strtolower($badchar[$y]), "", strtolower($texto));
                }

                $y++;
            }

            $texto = trim($texto); //limpa espaços vazio
            $texto = strip_tags($texto); //tira tags html e php
            $texto = addslashes($texto); //Adiciona barras invertidas a uma string
            $texto = htmlspecialchars($texto); //Evita ataques XSS
            return $texto;
        } else {
            return $texto;
        }
    }

    public function __destruct()
    {
    }
}
