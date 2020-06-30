<?php
try{

   /**
    * Created by MyCode
    * User: KEVEN
    * Date: 07/05/2020
    * Time: 20:35
   **/

   /** Instânciamento da classe Files  **/
   $Js = $Main->LoadClass('Js');

   /** Capturo meus campos envios por json **/
   $inputs = json_decode(file_get_contents('php://input'), true);

   /** Parâmetros de entrada **/
   $text = isset($inputs['inputs']['text']) ? (string)$Main->anti_injection($inputs['inputs']['text'], 'S') : 0;

   /** Controle de erros **/
   $error   = 0;
   $message = array();

   if($error > 0){

       /** Preparo o formulario para retorno **/
       $result = array("message" => $message);

       /**Envio*/
       echo json_encode($result);

       /**Para o procedimento*/
       exit;

   }else{

       /** Executo determinado método **/
       /** Result **/
       $result = array("result" => $Js->minifyJS($text));

       /** Envio **/
       echo json_encode($result);

       /** Paro o procedimento **/
       exit;

   }

}catch(Exception $e){

   /** Preparo o formulario para retorno **/
   $result = array("cod" => 0, "message" => $e->getMessage());

   /** Envio **/
   echo json_encode($result);

   /** Paro o procedimento **/
   exit;

}
