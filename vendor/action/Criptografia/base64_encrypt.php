<?php

/** Importação de classes */
use vendor\model\Base64;
use vendor\controller\Base64\Base64Validate;

/** Instânciamento de classes */
$base64 = new Base64();
$base64Validate = new Base64Validate();

try
{

    /** Parâmetros de entrada */
    $base64Validate->setString(@$_POST['string']);

    /** Controle */
    $message = array();

    if (count($base64Validate->getErrors()) > 0)
    {

        /** Result **/
        $result = [

            'cod' => 1,
            'title' => 'Atenção',
            'message' => $base64Validate->getErrors(),

        ];

    }
    else
    {

        /** Verifico se o usuário foi localizado */
        if (!empty($base64->encrypt($base64Validate->getString())))
        {

            /** Result **/
            $result = [

                'cod' => 0,
                'title' => 'Sucesso',
                'target' => 'string_encrypted',
                'result' => $base64->encrypt($base64Validate->getString()),

            ];

        }
        else
        {

            /** Adição de elementos na array */
            array_push($message, array('string', 'Não foi possivel criptografar o texto'));

            /** Result **/
            $result = [

                'cod' => 1,
                'title' => 'Atenção',
                'message' => $message,

            ];

        }

    }

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;

}
catch (Exception $exception)
{

    /** Controle de mensagens */
    $message = array();

    /** Adição de elementos na array */
    array_push($message, '<span class="badge badge-primary">Detalhes.:</span> ' . 'código = ' . $exception->getCode() . ' - linha = ' . $exception->getLine() . ' - arquivo = ' . $exception->getFile());
    array_push($message, '<span class="badge badge-primary">Mensagem.:</span> ' . $exception->getMessage());

    /** Preparo o formulario para retorno **/
    $result = [

        'cod' => 1,
        'message' => $message,
        'title' => 'Erro Interno',
        'type' => 'exception',

    ];

    /** Envio **/
    echo json_encode($result);

    /** Paro o procedimento **/
    exit;

}