<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

/** Informo o local onde a classe esta localizada **/
namespace vendor\model;

class Correios
{

    /** Declaro as variaveis utilizadas na classe **/
    private $cod_servico;
    private $cep_origem;
    private $cep_destino;
    private $altura;
    private $largura;
    private $comprimento;
    private $peso;
    private $valor_declarado;

    public function __construct()
    {

        $this->cod_servico     = 0;
        $this->cep_origem      = 0;
        $this->cep_destino     = 0;
        $this->altura          = 0;
        $this->largura         = 0;
        $this->comprimento     = 0;
        $this->peso            = 0;
        $this->valor_declarado = 0;

    }

    /**
     *$cod_servico - codigo do servico desejado
     *$cep_origem - cep de origem, apenas numeros
     *$cep_destino - cep de destino, apenas numeros
     *$peso - valor dado em Kg incluindo a embalagem. 0.1, 0.3, 1, 2 ,3 , 4
     *$altura - altura do produto em cm incluindo a embalagem
     *$largura - altura do produto em cm incluindo a embalagem
     *$comprimento - comprimento do produto incluindo embalagem em cm
     *$valor_declarado - indicar 0 caso nao queira o valor declarado
     **/
    /** Calcular frete **/
    /**
     * Código dos Principais Serviços dos Correios
     * 41106 PAC sem contrato
     * 40010 SEDEX sem contrato
     * 40045 SEDEX a Cobrar, sem contrato
     * 40215 SEDEX 10, sem contrato
     **/
    public function freteCalculate($cod_servico, $cep_origem, $cep_destino, $altura, $largura, $comprimento, $peso, $valor_declarado)
    {

        /** Parâmetros de Entrada **/
        $this->cod_servico     = (int)$cod_servico;
        $this->cep_origem      = (int)$cep_origem;
        $this->cep_destino     = (int)$cep_destino;
        $this->altura          = (int)$altura;
        $this->largura         = (int)$largura;
        $this->comprimento     = (int)$comprimento;
        $this->peso            = (int)$peso;
        $this->valor_declarado = (int)$valor_declarado;

        $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$this->cep_origem."&sCepDestino=".$this->cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$this->comprimento."&nVlAltura=".$this->altura."&nVlLargura=".$this->largura."&sCdMaoPropria=n&nVlValorDeclarado=".$this->valor_declarado."&sCdAvisoRecebimento=n&nCdServico=".$this->cod_servico."&nVlDiametro=0&StrRetorno=xml";

        $xml = simplexml_load_file($correios);

        $_arr_ = array();

        if($xml->cServico->Erro == '0') {

            $_arr_[0] = $xml->cServico;

            return $_arr_;

        }else {

            return false;

        }

    }

}
