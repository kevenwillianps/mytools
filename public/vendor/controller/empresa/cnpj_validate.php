<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 **/

/** Escolho as classes que irei utilizar **/
use \vendor\model\Main;
use \vendor\model\Cnpj;

/** realizo o instânciamento da classe **/
$main = new Main();
$cnpj = new Cnpj();

try {

    /** Capturo meus campos envios por json **/
    $inputs = json_decode(file_get_contents('php://input'), true);

    /** Parâmetros de entrada **/
    $text = isset($inputs['inputs']['text']) ? (string)$main->antiInjection($inputs['inputs']['text']) : '';

    /** Controle de erros **/
    $message = array();

    /** Verifico se o campo foi preenchido **/
    if (empty($text)) {
        array_push($message, "O campo 'Texto', deve ser informado");
    }

    if (count($message) > 0) {

        /** Preparo o formulario para retorno **/
        $result = array(

            "message" => $message

        );

        /**Envio*/
        echo json_encode($result);

        /**Para o procedimento*/
        exit;
    } else {

        /** Executo determinado método **/
        /** Result **/
        $result = array(

            "result" => $cnpj->validateCnpj($text)

        );

        /** Envio **/
        echo json_encode($result);

        /** Paro o procedimento **/
        exit;
    }
} catch (Exception $e) {

    /** Preparo o formulario para retorno **/
    $result = array("message" => $e->getMessage());

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;
}
