<?php

/** Importação de classes */
use vendor\model\Sha1;
use vendor\controller\Sha1\Sha1Validate;

/** Instânciamento de classes */
$sha1 = new Sha1();
$sha1Validate = new Sha1Validate();

try
{

    /** Parâmetros de entrada */
    $sha1Validate->setString(@$_POST['string']);

    /** Controle */
    $message = array();

    if (count($sha1Validate->getErrors()) > 0)
    {

        /** Result **/
        $result = [

            'cod' => 1,
            'title' => 'Atenção',
            'message' => $sha1Validate->getErrors(),

        ];

    }
    else
    {

        /** Verifico se o usuário foi localizado */
        if (!empty($sha1->encrypt($sha1Validate->getString())))
        {

            /** Result **/
            $result = [

                'cod' => 0,
                'title' => 'Sucesso',
                'target' => 'string_encrypted',
                'result' => $sha1->encrypt($sha1Validate->getString()),

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