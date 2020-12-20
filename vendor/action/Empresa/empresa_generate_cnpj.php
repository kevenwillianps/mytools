<?php

/** Importação de classes */
use vendor\model\Cnpj;

/** Instânciamento de classes */
$cnpj = new Cnpj();

try
{

    /** Controle */
    $message = array();

    /** Gero o cpf */
    $result = $cnpj->generateCnpj();

    /** Verifico se o usuário foi localizado */
    if (!empty($result))
    {

        /** Result **/
        $result = [

            'cod' => 0,
            'title' => 'Sucesso',
            'target' => 'cnpj',
            'result' => $result,

        ];

    }
    else
    {

        /** Adição de elementos na array */
        array_push($message, array('cpf', 'Não foi possivel salvar o registro'));

        /** Result **/
        $result = [

            'cod' => 1,
            'title' => 'Atenção',
            'message' => $message,

        ];

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