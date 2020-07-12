<?php
/**
 * Created by MyCode
 * user: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 *
 */

/** Importo as classes que irei utilizar **/
use \vendor\model\Main;
use \vendor\model\File;

/** Instânciamento das classes **/
$main = new Main();
$file = new File();

try {

    /** Capturo meus campos envios por json **/
    $inputs = json_decode(file_get_contents('php://input'), true);

    /** Parâmetros de entrada - Controle de Arquivo **/
    $pointer          = isset($inputs['inputs']['pointer'])          ? (int)$main->antiInjection($inputs['inputs']['pointer'])          : 0;
    $part             = isset($inputs['inputs']['part'])             ? (string)$main->antiInjection($inputs['inputs']['part'])          : '';
    $length           = isset($inputs['inputs']['length'])           ? (int)$main->antiInjection($inputs['inputs']['length'])           : 0;
    $extension        = isset($inputs['inputs']['extension'])        ? (string)$main->antiInjection($inputs['inputs']['extension'])     : '';
    $name             = isset($inputs['inputs']['name'])             ? (string)$main->antiInjection($inputs['inputs']['name'])          : 'name_' . rand(1, 15);
    $percent_compress = isset($inputs['inputs']['percent_compress']) ? (int)$main->antiInjection($inputs['inputs']['percent_compress']) : 0;

    /** Pego o ano atual **/
    $year = date('Y');
    /** Pego o mês atual **/
    $month = date('m');
    /** Pego o dia atual **/
    $day = date('d');
    /** Caminho raiz dos documentos **/
    $path = "document/arquivo/{$year}/{$month}/{$day}/{$extension}";

    /** Controle de erros **/
    $message = array();

    /** Validação de campos obrigatórios **/
    /** Verifico se o campo name foi preenchido **/
    if ($pointer < 0) {
        array_push($message, '$pointer - O seguinte campo deve ser preenchido/selecionado');
    }
    /** Verifico se o campo path foi preenchido **/
    if (empty($part)) {
        array_push($message, '$part - O seguinte campo deve ser preenchido/selecionado');
    }
    /** Verifico se o campo path foi preenchido **/
    if ($length < 0) {
        array_push($message, '$length - O seguinte campo deve ser preenchido/selecionado');
    }
    /** Verifico se o campo path foi preenchido **/
    if (empty($extension)) {
        array_push($message, '$extension - O seguinte campo deve ser preenchido/selecionado');
    }
    /** Verifico se o campo path foi preenchido **/
    if ($percent_compress < 0) {
        array_push($message, '$percent_compress - O seguinte campo deve ser preenchido/selecionado corretamente');
    }

    if (count($message) > 0) {

        /** Preparo o formulario para retorno **/
        $result = array(

            "cod" => 0,
            "message" => $message

        );
    } else {

        /** Verifico se existe o caminho **/
        if (is_dir($path)) {

            if ($pointer == ($length - 1)) {

                /** Crio meu arquivo e escrevo dentro dele **/
                $document = fopen($path . '/' . $name, "a+");

                /** Escrevo dentro do arquivo **/
                fwrite($document, base64_decode($part));

                /** Encerro a escrita do arquivo **/
                fclose($document);

                if (is_file($path . '/' . $name)) {

                    if ($file->handling($path, $name, $percent_compress)) {

                        /** Result **/
                        $result = array(

                            "cod" => 99,
                            "message" => "Arquivo tratado com sucesso!",
                            "file" => $path."/compress/".$name,

                        );

                    } else {

                        /** Result **/
                        $result = array(

                            "cod" => 0,
                            "message" => "Não foi tratar os arquivo"

                        );

                    }

                } else {

                    /** Result **/
                    $result = array(

                        "cod" => 0,
                        "message" => "Não foi localizado o arquivo"

                    );

                }

            } else {

                /** Crio meu arquivo e escrevo dentro dele **/
                $document = fopen($path . '/' . $name, "a+");

                /** Escrevo dentro do arquivo **/
                fwrite($document, base64_decode($part));

                /** Encerro a escrita do arquivo **/
                fclose($document);

                if (is_file($path . '/' . $name)) {

                    /** Result **/
                    $result = array(

                        "cod" => 1,
                        "message" => "Arquivo criado com sucesso"

                    );

                } else {

                    /** Result **/
                    $result = array(

                        "cod" => 0,
                        "message" => "Não foi possível criar o arquivo"

                    );

                }

            }

        } else {

            /** Crio o caminho **/
            mkdir($path, 0777, true);
            mkdir($path . '/compress', 0777, true);

            /** Verifico se existe o caminho **/
            if (is_dir($path)) {

                if ($pointer == ($length - 1)) {

                    /** Crio meu arquivo e escrevo dentro dele **/
                    $document = fopen($path . '/' . $name, "a+");

                    /** Escrevo dentro do arquivo **/
                    fwrite($document, base64_decode($part));

                    /** Encerro a escrita do arquivo **/
                    fclose($document);

                    if (is_file($path . '/' . $name)) {

                        if ($file->handling($path, $name, $percent_compress)) {

                            /** Result **/
                            $result = array(

                                "cod" => 99,
                                "message" => "Arquivo tratado com sucesso!",
                                "file" => $path."/compress/".$name,

                            );

                        } else {

                            /** Result **/
                            $result = array(

                                "cod" => 0,
                                "message" => "Não foi tratar os arquivo"

                            );

                        }

                    } else {

                        /** Result **/
                        $result = array(

                            "cod" => 0,
                            "message" => "Não foi localizado o arquivo"

                        );

                    }

                } else {

                    /** Crio meu arquivo e escrevo dentro dele **/
                    $document = fopen($path . '/' . $name, "a+");

                    /** Escrevo dentro do arquivo **/
                    fwrite($document, base64_decode($part));

                    /** Encerro a escrita do arquivo **/
                    fclose($document);

                    if (is_file($path . '/' . $name)) {

                        /** Result **/
                        $result = array(

                            "cod" => 1,
                            "message" => "Arquivo criado com sucesso"

                        );

                    } else {

                        /** Result **/
                        $result = array(
                            "cod" => 0,
                            "message" => "Não foi possível criar o arquivo"
                        );

                    }

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

        "cod" => 0,
        "message" => $e->getMessage(),

    );

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;
}
