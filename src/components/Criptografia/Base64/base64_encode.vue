<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Criptografar em <span class="badge badge-dark">Base64</span>

            </h1>

            <p class="lead">

                Base64 é um método para codificação de dados para transferência na Internet. É utilizado frequentemente para transmitir dados binários por meios de transmissão que lidam apenas com texto, como por exemplo para enviar arquivos anexos por e-mail. É constituído por 64 caracteres que deram origem ao seu nome.

            </p>

            <hr class="my-4">

            <div class="input-group input-group-lg">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" v-on:click="Encode()">

                        🔨 Criptografar

                    </button>

                </div>

                <input type="text" class="form-control" placeholder="Texto" aria-label="Example text with button addon" aria-describedby="button-addon1" v-model="inputs.text_encode">

            </div>

            <div class="form-group mt-1">

                <label for="result">

                    Texto Codificado

                </label>

                <textarea class="form-control" id="result" rows="3" v-model="query.result_encode"></textarea>

            </div>

            <hr class="my-4">

            <div class="input-group input-group-lg">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" v-on:click="Decode()">

                        🔨 Descriptografar

                    </button>

                </div>

                <input type="text" class="form-control" placeholder="Texto" aria-label="Example text with button addon" aria-describedby="button-addon2" v-model="inputs.text_decode">

            </div>

            <div class="form-group mt-1">

                <label for="result">

                    Texto Codificado

                </label>

                <textarea class="form-control" id="result_decode" rows="3" v-model="query.result_decode"></textarea>

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

                    result_encode : null,
                    result_decode : null,

                },

                /** Campos para envio **/
                inputs : {

                    text_encode : null,
                    text_decode : null,

                }

            }

        },

        methods : {

            Encode(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=CRIPTOGRAFIA&ACTION=BASE64_ENCODE', {inputs : this.inputs})

                    /** Caso tenha sucesso **/
                    .then(response => {

                        this.query.result_encode = response.data.result;

                    })

                    /** Caso tenha falha**/
                    .catch(response => {

                        console.log('Erro:' + response.data);

                    })

            },

            Decode(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=CRIPTOGRAFIA&ACTION=BASE64_DECODE', {inputs : this.inputs})

                    /** Caso tenha sucesso **/
                    .then(response => {

                        this.query.result_decode = response.data.result;

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