<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Comprimir <span class="badge badge-dark">CSS</span>

            </h1>

            <p class="lead">

                A compressão de dados é o ato de reduzir o espaço ocupado por dados num determinado dispositivo. Essa operação é realizada através de diversos algoritmos de compressão, reduzindo a quantidade de Bytes para representar um dado, sendo esse dado uma imagem, um texto, ou um arquivo qualquer.

            </p>

            <hr class="my-4">

            <div class="input-group">

                <div class="input-group-prepend">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" v-on:click="Minify()">

                        🔨 Comprimir

                    </button>

                </div>

                <textarea class="form-control" aria-label="With textarea" v-model="inputs.text"></textarea>

            </div>

            <div class="fom-group mt-1">

                <label for="text">

                    Código Comprimido

                </label>

                <div class="input-group">

                    <textarea class="form-control" v-model="query.result" id="result"></textarea>

                    <div class="input-group-append">

                        <button class="btn btn-outline-secondary" type="button" v-on:click="CopyToClipboard()">

                            ✏️Copiar

                        </button>

                    </div>

                </div>

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

            Minify(){

                /** Envio uma requisição para o meu servidor**/
                axios.post('router.php?TABLE=WEB&ACTION=CSS_MINIFY', {inputs : this.inputs})

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