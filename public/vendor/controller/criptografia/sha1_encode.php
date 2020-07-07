<?php
/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 **/

/** Escolho as classes que irei instaciar **/
use \vendor\model\Sha1;
use \vendor\model\Main;

/** realizo o instâncimento das classes **/
$sha1 = new Sha1();
$main = new Main();

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

    /** verifico se existe erros **/
    if (count($message)) {

       /** Preparo o formulario para retorno **/
        $result = array("message" => $message);

        /**Envio*/
        echo json_encode($result);

        /**Para o procedimento*/
        exit;
    } else {

       /** Executo determinado método **/
        /** Result **/
        $result = array("result" => $sha1->encode($text));

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
