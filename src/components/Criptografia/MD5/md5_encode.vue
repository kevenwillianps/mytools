<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Criptografar em <span class="badge badge-dark">MD5</span>

            </h1>

            <p class="lead">

                O algoritmo de sintetização de mensagen MD5 é uma função hash amplamente utilizada que produz um valor de hash de 128 bits. Embora o MD5 tenha sido projetado inicialmente para ser usado como uma função hash criptográfica, foi constatado que ele sofre de extensas vulnerabilidades

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
                axios.post('router.php?TABLE=CRIPTOGRAFIA&ACTION=MD5_ENCODE', {inputs : this.inputs})

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