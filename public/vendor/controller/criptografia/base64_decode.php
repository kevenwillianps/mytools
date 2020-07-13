<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 **/

/** Escolho as classes que irei utilizar **/
use \vendor\model\Main;
use \vendor\model\Base64;

/** realizo o instânciamento da classe **/
$main = new Main();
$base64 = new Base64();

try {

   /** Capturo meus campos envios por json **/
    $inputs = json_decode(file_get_contents('php://input'), true);

    /** Parâmetros de entrada **/
    $text_decode = isset($inputs['inputs']['text_decode']) ? (string)$main->antiInjection($inputs['inputs']['text_decode']) : '';

    /** Controle de erros **/
    $message = array();

    /** Verifico se o campo foi preenchido **/
    if (empty($text_decode)) {
        array_push($message, "O campo 'Texto', deve ser informado");
    }

    if (count($message) > 0) {

       /** Preparo o formulario para retorno **/
        $result = array("message" => $message);

        /**Envio*/
        echo json_encode($result);

        /**Para o procedimento*/
        exit;
    } else {

       /** Executo determinado método **/
        /** Result **/
        $result = array("result" => $base64->decode($text_decode));

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