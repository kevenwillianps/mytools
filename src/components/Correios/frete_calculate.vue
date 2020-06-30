<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Calcular <span class="badge badge-dark">Frete</span>

            </h1>

            <p class="lead">

                Frete é o preço que se paga pelo uso ou pela locação de embarcação ou qualquer outro meio de transporte pertencente a outro. Esse preço depende do tipo de carga, do modo de transporte, do peso e do volume da carga e da distância a ser percorrida até o ponto de entrega da carga

            </p>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Cep de Origem" v-model="inputs.source">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Cep Destino" v-model="inputs.destiny">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <input type="number" class="form-control" placeholder="Altura" v-model="inputs.height">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <input type="number" class="form-control" placeholder="Largura" v-model="inputs.width">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <input type="number" class="form-control" placeholder="Comprimento" v-model="inputs.length">

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="form-group">

                        <input type="number" class="form-control" placeholder="Peso Estimado" v-model="inputs.weight">

                    </div>

                </div>

                <div class="col-md-12 text-right">

                    <div class="form-group">

                        <button class="btn btn-primary" v-on:click="FreteCalculate()">

                            Calcular

                        </button>

                    </div>

                </div>

            </div>

            <table class="table table-bordered shadow-sm" v-if="query.result.Erro == '0'">

                <thead>

                    <tr>

                        <th scope="col">

                            #

                        </th>

                        <th scope="col">

                            Valor

                        </th>

                        <th scope="col">

                            Prazo

                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <th scope="row">

                            {{ query.result.Codigo }}

                        </th>

                        <td>

                            {{ query.result.Valor }}

                        </td>

                        <td>

                            {{ query.result.PrazoEntrega }} Dias

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</template>

<script type="text/ecmascript-6">

    import axios from 'axios';

    export default {

        name: "FreteCalculate",

        data(){

            return {

                query : {

                    result : [],

                },

                inputs : {

                    source : null,
                    destiny : null,
                    height : null,
                    width : null,
                    length : null,
                    weight : null,

                }

            }

        },

        methods : {

            /** Método para solicitar o calculo do frete **/
            FreteCalculate(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=FRETE&ACTION=FRETE_CALCULATE', {inputs : this.inputs})

                    /** Caso tenha sucesso **/
                    .then(response => {

                        this.query.result = response.data.result[0];
                    })

                    /** Caso tenha falha**/
                    .catch(response => {

                        console.log('Erro:' + response.data);

                    })

            },

            /** Função para copiar o texto **/
            CopyToClipboard(){

                /** Get the text field **/
                let copyText = document.getElementById("cpf");

                /** Select the text field **/
                copyText.select();
                copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                /** Copy the text inside the text field **/
                document.execCommand("copy");

                /** Alert the copied text **/
                alert("Texto Copiado: " + copyText.value);

            }

        },

    }

</script>