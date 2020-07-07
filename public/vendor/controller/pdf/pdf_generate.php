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
use \Dompdf\Dompdf;

/** realizo o instânciamento da classe **/
$main = new Main();
$base64 = new Base64();
$domPdf = new Dompdf();

try {

    /** Capturo meus campos envios por json **/
    $inputs = json_decode(file_get_contents('php://input'), true);

    /** Parâmetros de entrada **/
    $text = isset($inputs['inputs']['text']) ? (string)$main->antiInjection($inputs['inputs']['text'], 'S') : '';

    /** Pego o ano atual **/
    $year = date('Y');
    /** Pego o mês atual **/
    $month = date('m');
    /** Pego o dia atual **/
    $day = date('d');
    /** Caminho raiz dos documentos **/
    $path = "document/pdf/{$year}/{$month}/{$day}/";
    /** Gero o nome do arquivo **/
    $name_file = 'mytools_' . sha1(rand()). '.pdf';

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

    } else {

        /** Carrego o Html para dentro dom PDF **/
        $domPdf->loadHtml($text, 'UTF-8');

        /** Defino o Formato do Papel **/
        $domPdf->setPaper('A4', 'landscape');

        /** Renderizo o HTML **/
        $domPdf->render();

        /** Verifico se existe o caminho **/
        if (is_dir($path)) {

            /** Crio o arquivo PDF **/
            file_put_contents($path . '/' . $name_file, $domPdf->output());

            if (is_file($path . '/' . $name_file)) {

                /** Result **/
                $result = array(

                    "link" => $path.$name_file,
                    "result" => "Arquivo criado com sucesso",

                );

            } else {

                /** Result **/
                $result = array(

                    "message" => "Não foi localizado o arquivo"

                );

            }

        } else {

            /** Crio o caminho **/
            mkdir($path, 0777, true);

            /** Verifico se existe o caminho **/
            if (is_dir($path)) {

                /** Crio o arquivo PDF **/
                file_put_contents($path . '/' . $name_file, $domPdf->output());

                if (is_file($path . '/' . $name_file)) {

                    /** Result **/
                    $result = array(

                        "link" => $path.$name_file,
                        "result" => "Arquivo criado com sucesso",

                    );

                } else {

                    /** Result **/
                    $result = array(

                        "message" => "Não foi localizado o arquivo"

                    );

                }

            }

        }

    }

    /**Envio*/
    echo json_encode($result);

    /**Para o procedimento*/
    exit;

} catch (Exception $e) {

   /** Preparo o formulario para retorno **/
    $result = array(

        "message" => $e->getMessage()

    );

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;
}
