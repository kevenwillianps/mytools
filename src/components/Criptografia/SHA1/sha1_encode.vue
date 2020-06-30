<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Criptografar em <span class="badge badge-dark">SHA1</span>

            </h1>

            <p class="lead">

                Em criptografia, SHA-1 é uma função de dispersão criptográfica projetada pela Agência de Segurança Nacional dos Estados Unidos e é um Padrão Federal de Processamento de Informação dos Estados Unidos publicado pelo Instituto Nacional de Padrões e Tecnologia.

            </p>

            <hr class="my-4">

            <div class="input-group input-group-lg">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" v-on:click="Encode()">

                        🔨 Criptografar

                    </button>

                </div>

                <input type="text" class="form-control" placeholder="Texto" aria-label="Example text with button addon" aria-describedby="button-addon1" v-model="inputs.text">

            </div>

            <div class="form-group mt-1">

                <label for="result">

                    Texto Codificado

                </label>

                <textarea class="form-control" id="result" rows="3" v-model="query.result"></textarea>

            </div>

        </div>

    </div>

</template>

<script type="text/ecmascript-6">

    import axios from 'axios';

    export default {

        name: "Base64Encode",

        data(){

            return {

                /** Resultado das requisições **/
                query : {

                    result : null,

                },

                inputs : {

                    text : null,

                }

            }

        },

        methods : {

            Encode(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=CRIPTOGRAFIA&ACTION=SHA1_ENCODE', {inputs : this.inputs})

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

                /* Get the text field */
                let copyText = document.getElementById("result");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                alert("Texto Copiado: " + copyText.value);

            }

        },

    }

</script>