<?php
/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 *
 */

/** Escolho qual classe usar **/
use \vendor\model\Cpf;

/** Instânciamento da classe 'CPF' **/
$Cpf = new Cpf;

try
{

    /** Result **/
    $result = [
        "result" => $Cpf->generateCpf()
    ];

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;

}
catch(Exception $e)
{

    /** Preparo o formulario para retorno **/
    $result = [
        "cod" => 0,
        "message" => $e->getMessage()
    ];

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;

}
