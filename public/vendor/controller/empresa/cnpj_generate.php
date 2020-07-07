<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 **/

/** informo onde esta localizado minhas classes **/
use \vendor\model\Cnpj;
use \vendor\model\Main;

/** realizo o instâncimento das classes **/
$cnpj = new Cnpj();
$main = new Main();

try {

    /** Executo determinado método **/
    /** Result **/
    $result = array("result" => $cnpj->generateCnpj());

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;
} catch (Exception $e) {

   /** Preparo o formulario para retorno **/
    $result = array("message" => $e->getMessage());

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;
}
