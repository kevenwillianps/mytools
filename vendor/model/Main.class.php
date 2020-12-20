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

/** Defino o local onde a classe esta localizada **/
namespace vendor\model;

class Main
{

    private $string = null;
    private $long = null;
    private $elements = null;
    private $usuario_id = null;

    /** Inicio da sessãos */
    public function __construct()
    {

        if ((int)@$_SESSION['USUARIO_ID'] == 0)
        {

            session_start();

        }
        else
        {



        }

    }

    /** Finalizo a sessão */
    public function destroySession()
    {

        session_destroy();

    }

    /** Verifico se o usuário esta logado */
    public function checkSession(){

        /** Salvo minha variavel **/
        $this->usuario_id = @(string)$_SESSION['USUARIO_ID'];

        /** Retorno verdadeiro ou falso **/
        if (!empty(trim($this->usuario_id))){

            return true;

        }else{

            return false;

        }

    }

    /** Antiinjection */
    public function antiInjection($string, $long = '')
    {

        /** Parâmetros de entrada */
        $this->string = $string;
        $this->long = $long;

        /** Verifico o tipo de entrada */
        if ((!is_array($this->string)) && $this->long != 'S') {

            if (empty($this->string))
            {

                $this->string = null;

            }
            else
            {

                $badchar[1] = '  drop ';
                $badchar[2] = ' select ';
                $badchar[3] = '  delete ';
                $badchar[4] = ' update ';
                $badchar[5] = '  insert ';
                $badchar[6] = ' alter ';
                $badchar[7] = '  destroy ';
                $badchar[8] = ' * ';
                $badchar[9] = ' database ';
                $badchar[10] = ' drop ';
                $badchar[11] = ' union ';
                $badchar[12] = ' TABLE_NAME ';
                $badchar[13] = ' 1=1 ';
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
                    $pos = strpos(strtolower($this->string), strtolower($badchar[$y]));
                    if ($pos !== false) {
                        $this->string = str_replace(strtolower($badchar[$y]), '', strtolower($this->string));
                    }

                    $y++;
                }

                $this->string = trim($this->string); //limpa espaços vazio
                $this->string = strip_tags($this->string); //tira tags html e php
                $this->string = addslashes($this->string); //Adiciona barras invertidas a uma string
                $this->string = htmlspecialchars($this->string); //Evita ataques XSS

            }

            return utf8_decode($this->string);

        }
        elseif ((!is_array($this->string)) && $this->long == 'S')
        {

            return utf8_decode(addslashes($this->string));

        }
        else
        {

            return $this->string;

        }

    }

    /** Removedor de mascaras */
    public function removeMask($string)
    {

        /** Elementos para serem removidos da String */
        $this->elements = ['(', ')', '.', '-', '/', ',', ' '];

        /** Parâmetros de entrada */
        $this->string = $string;

        /** Remoção dos elementos */
        $this->string = str_replace($this->elements, '', $this->string);

        return $this->string;

    }

    /** Validador de CPF */
    function validarCpf($string) {

        // Extrai somente os números
        $this->string = preg_replace( '/[^0-9]/is', '', $this->string);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($this->string) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $this->string)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $this->string[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($this->string[$c] != $d) {
                return false;
            }
        }
        return true;

    }

    function validateCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    /** Validar Email */
    public function validateEmail($string)
    {

        /** Parâmetros dentrada */
        $this->string = $string;

        /** Verifico se o email esta válido */
        if (filter_var($this->string, FILTER_VALIDATE_EMAIL))
        {

            /** Retorno verdadeiro */
            return true;

        }
        else
        {

            /** Retorno falso */
            return false;

        }

    }

    /** Validar Email */
    public function validateURL($string)
    {

        /** Parâmetros dentrada */
        $this->string = $string;

        /** Verifico se o email esta válido */
        if (filter_var($this->string, FILTER_VALIDATE_URL))
        {

            /** Retorno verdadeiro */
            return true;

        }
        else
        {

            /** Retorno falso */
            return false;

        }

    }

    /** Validador de Datas */
    public function validaData($string){

        /** Parâmetros de entrada */
        $this->string = $string;

        $this->string = explode("/","$string");
        $d = $this->string[0];
        $m = $this->string[1];
        $y = $this->string[2];

        $res = checkdate($m,$d,$y);
        if ($res == 1){

            return true;

        } else {

            return false;

        }
    }

}

