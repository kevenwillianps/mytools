<?php

/** Instânciamento de classes **/
include_once('./vendor/autoload.php');

/** Parâmetros de entrada **/
$table = strtolower(isset($_REQUEST['TABLE']) ? htmlspecialchars($_REQUEST['TABLE']) : "");
$action = strtolower(isset($_REQUEST['ACTION']) ? htmlspecialchars($_REQUEST['ACTION']) : "");

try
{

    /** Verifico se a tabela foi preenchida **/
    if (!empty($table))
    {

        /** Verfico se a ação foi preenchida **/
        if (!empty($action))
        {

            /** Verifico se o arquivo de ação existe **/
            if (is_file("vendor/controller/" . $table . "/" . $action . ".php"))
            {

                include_once ("vendor/controller/" . $table . "/" . $action . ".php");

            }
            else
            {

                /** Mensagem de erro **/
                throw new Exception('Error :: There is no file for informed action.');
            }

        }
        else
        {

            /** Mensagem de erro **/
            throw new Exception('Error :: action do not informed.');

        }

    }
    else
    {

        /** Mensagem de erro **/
        throw new Exception('Error :: table do not informed.');

    }

}
catch(Exception $e)
{

    /** Retorno de parâmetros **/
    $result = [
        "cod" => 0,
        "message" => $e->getMessage()
    ];

    /** Informações **/
    echo json_encode($result);
    exit;

}