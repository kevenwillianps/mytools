<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 **/

/** Carrego a classe que irei utilizar **/
use \vendor\model\Md5;
use \vendor\model\Main;

/** Instânciamento das classes **/
$Md5 = new Md5();
$Main = new Main();

try{

   /** Capturo meus campos envios por json **/
   $inputs = json_decode(file_get_contents('php://input'), true);

   /** Parâmetros de entrada **/
   $text = isset($inputs['inputs']['text']) ? (string)$Main->antiInjection($inputs['inputs']['text']) : '';

   /** Controle de erros **/
   $message = array();

   /** Verifico se o campo foi preenchido **/
   if (empty($text)){

       array_push($message, "O campo 'Texto', deve ser preenchido");

   }

   if(count($message) > 0){

       /** Preparo o formulario para retorno **/
       $result = array("message" => $message);

       /**Envio*/
       echo json_encode($result);

       /**Para o procedimento*/
       exit;

   }else{

       /** Executo determinado método **/
       /** Result **/
       $result = array("result" => $Md5->encode($text));

       /** Envio **/
       echo json_encode($result);

       /** Paro o procedimento **/
       exit;

   }

}catch(Exception $e){

   /** Preparo o formulario para retorno **/
   $result = array("message" => $e->getMessage());

   /** Envio **/
   echo json_encode($result);

   /** Paro o procedimento **/
   exit;

}
