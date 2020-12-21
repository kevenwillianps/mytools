<?php

/** Importação de classes */
use vendor\model\Md5;
use vendor\controller\Md5\Md5Validate;

/** Instânciamento de classes */
$md5 = new Md5();
$md5Validate = new Md5Validate();

try
{

    /** Parâmetros de entrada */
    $md5Validate->setString(@$_POST['string']);

    /** Controle */
    $message = array();

    if (count($md5Validate->getErrors()) > 0)
    {

        /** Result **/
        $result = [

            'cod' => 1,
            'title' => 'Atenção',
            'message' => $md5Validate->getErrors(),

        ];

    }
    else
    {

        /** Verifico se o usuário foi localizado */
        if (!empty($md5->encrypt($md5Validate->getString())))
        {

            /** Result **/
            $result = [

                'cod' => 0,
                'title' => 'Sucesso',
                'target' => 'string_encrypted',
                'result' => $md5->encrypt($md5Validate->getString()),

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