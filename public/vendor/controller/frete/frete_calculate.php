<?php
/**
 * Created by MyCode
 * User: KEVEN
 * Date: 07/05/2020
 * Time: 20:35
 **/

/** Localizo as classes para instânciamento **/
use \vendor\model\Main;
use \vendor\model\Correios;

/** Instânciamento das classes **/
$main = new Main();
$correios = new Correios();

try{

   /** Capturo meus campos envios por json **/
   $inputs = json_decode(file_get_contents('php://input'), true);

   /** Parâmetros de entrada **/
   $source  = isset($inputs['inputs']['source'])  ? (string)$main->antiInjection($inputs['inputs']['source'])  : '';
   $destiny = isset($inputs['inputs']['destiny']) ? (string)$main->antiInjection($inputs['inputs']['destiny']) : '';
   $height  = isset($inputs['inputs']['height'])  ? (int)$main->antiInjection($inputs['inputs']['height'])     : 0;
   $width   = isset($inputs['inputs']['width'])   ? (int)$main->antiInjection($inputs['inputs']['width'])      : 0;
   $length  = isset($inputs['inputs']['length'])  ? (int)$main->antiInjection($inputs['inputs']['length'])     : 0;
   $weight  = isset($inputs['inputs']['weight'])  ? (int)$main->antiInjection($inputs['inputs']['weight'])     : 0;

   /** Controle de erros **/
   $message = array();

   /** Validação de campos obrigatórios **/
   /** Verifico se o campo content_id foi preenchido **/
   if(empty($source)){

       array_push($message, ' - Cep Origem - Deve Ser Informado');

   }
   /** Verifico se o campo content_category_id foi preenchido **/
   if(empty($destiny)){

       array_push($message, ' - Cep Destino - Deve Ser Informado');

   }
   /** Verifico se o campo content_category_id foi preenchido **/
   if(empty($height)){

       array_push($message, ' - Alutra do Pacote - Deve Ser Informado');

   }
   /** Verifico se o campo content_category_id foi preenchido **/
   if(empty($width)){

       array_push($message, ' - Largura do Pacote - Deve Ser Informado');

   }
   /** Verifico se o campo content_category_id foi preenchido **/
   if(empty($length)){

       array_push($message, ' - Comprimento do Pacote - Deve Ser Informado');

   }
   /** Verifico se o campo content_category_id foi preenchido **/
   if(empty($weight)){

       array_push($message, ' - Peso do Pacote - Deve Ser Informado');

   }

   /** Verifico Se Existem Erros **/
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
       $result = array("result" => $correios->freteCalculate(40010, $source, $destiny, $height, $width, $length, $weight, 0));

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
