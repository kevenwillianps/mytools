<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Gerador de <span class="badge badge-dark">CPF</span>

            </h1>

            <p class="lead">

                O Cadastro de Pessoas Físicas é o registro mantido pela Receita Federal do Brasil no qual podem se inscrever, uma única vez, quaisquer pessoas naturais, independentemente de idade ou nacionalidade, inclusive falecidas. Cada inscrito é unicamente identificado por um número de inscrição no CPF de 11 dígitos decimais.

            </p>

            <hr class="my-4">

            <div class="input-group input-group-lg">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" v-on:click="GenerateCpf()">

                        🔨 Gerar

                    </button>

                </div>

                <input type="text" class="form-control" placeholder="Cpf Gerado" aria-label="Example text with button addon" aria-describedby="button-addon1" v-model="query.result" id="result">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" v-on:click="CopyToClipboard()">

                        ✏️Copiar

                    </button>

                </div>

            </div>

        </div>

    </div>

</template>

<script type="text/ecmascript-6">

    import axios from 'axios';

    export default {

        name: "GenerateCpf",

        data(){

            return {

                query : {

                    result : null,

                }

            }

        },

        methods : {

            /** Método para solicitar um novo CPF **/
            GenerateCpf(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=PESSOAL&ACTION=CPF_GENERATE')

                    /** Caso tenha sucesso **/
                    .then(response => {

                        this.query.result = response.data.result;

                    })

                    /** Caso tenha falha**/
                    .catch(response => {

                        console.log('Erro:' + response.data);

                    })

            },

            /** Função para copiar o texto **/
            CopyToClipboard(){

                /** Get the text field **/
                let copyText = document.getElementById("result");

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