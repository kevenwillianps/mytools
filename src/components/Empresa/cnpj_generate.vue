<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Gerador de <span class="badge badge-dark">CNPJ</span>

            </h1>

            <p class="lead">

                No Brasil, o Cadastro Nacional da Pessoa Jurídica é um número único que identifica uma pessoa jurídica e outros tipos de arranjo jurídico sem personalidade jurídica junto à Receita Federal brasileira.

            </p>

            <hr class="my-4">

            <div class="input-group input-group-lg">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" v-on:click="GenerateCnpj()">

                        🔨 Gerar

                    </button>

                </div>

                <input type="text" class="form-control" placeholder="Cnpj Gerado" aria-label="Example text with button addon" aria-describedby="button-addon1" v-model="query.result" id="result">

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

        name: "GenerateCnpj",

        data(){

            return {

                query : {

                    result : null,

                }

            }

        },

        methods : {

            GenerateCnpj(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=EMPRESA&ACTION=CNPJ_GENERATE')

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