<template>

    <div>

        <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

            <h1 class="display-4">

                Comprimir <span class="badge badge-dark">Imagem</span>

            </h1>

            <p class="lead">

                Compressão de imagens, em Ciência da Computação, é a aplicação de compressão de dados em imagens digitais. Como efeito, o objectivo é reduzir a redundância dos dados, de forma a armazenar ou transmitir esses mesmos dados de forma eficiente. O tipo de compressão aplicado pode ser com ou sem perda de dados:

            </p>

            <hr class="my-4">

            <div class="form-group" v-if="inputs_file.name.length <= 0">

                <div class="border-dashed-default rounded">

                    <div class="file-drop-area" v-if="!inputs_file.file">

                        <span class="fake-btn mr-3">

                            Escolha seus arquivos

                        </span>

                        <span class="file-msg">

                            Arraste seus arquivos e solte até aqui para carregalos

                        </span>

                        <input class="file-input" type="file" multiple v-on:change="onChange">

                    </div>

                    <div v-else>

                        <div class="media">

                            <div class="media-body p-3">

                                <h3 class="mt-0">

                                    {{ inputs_file.name }}

                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-group" v-if="inputs_file.name.length > 0">

                <table class="table table-bordered table-borderless border-dashed-table rounded shadow-sm">

                    <thead>

                    <tr>

                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Extensão</th>
                        <th scope="col" class="text-center">Operações</th>

                    </tr>

                    </thead>

                    <tbody>

                    <tr v-for="(result, index) in inputs_file.name_auxiliary" v-bind:key="index" class="border-top-dashed-table">

                        <th scope="row" class="text-center">

                            {{ index }}

                        </th>

                        <td>

                            {{ result }}

                        </td>

                        <td>

                            {{ inputs_file.extension[index] }}

                        </td>

                        <td class="text-center">

                            <button class="btn btn-danger" v-on:click="RemoveFile(index)">

                                <i class="fas fa-fire-alt mr-1"></i>

                            </button>

                        </td>

                    </tr>

                    </tbody>

                </table>

            </div>

            <div class="col-md-12 text-right mt-3" v-if="inputs_file.name.length > 0">

                <button class="btn btn-default" v-on:click="PrepareForm()">

                    <i class="fas fa-paper-plane"></i> Comprimir

                </button>

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

                /** Grupo de variáveis que guardar os dados dos campos do arquivo **/
                inputs_file: {

                    name_auxiliary: [],
                    name: [],
                    part: [],
                    length: [],
                    extension: [],

                },

            }

        },

        methods : {

            /** Adiciono ou removo um elemento da array **/
            RemoveFile(index) {

                /** Removo o elemento da array **/
                this.inputs_file.name_auxiliary.splice(index, 1);
                this.inputs_file.name.splice(index, 1);
                this.inputs_file.part.splice(index, 1);
                this.inputs_file.length.splice(index, 1);
                this.inputs_file.extension.splice(index, 1);

            },

            /** Preparo o formulário para envio **/
            async PrepareForm() {

                /** Envio as requisições de acordo com o tamanho da array **/
                for (let i = 0; i < this.inputs_file.part.length; i++) {

                    for (let j = 0; j < this.inputs_file.part[i].length; j++) {

                        await this.SendForm(this.inputs_file.name[i], j, this.inputs_file.part[i][j], this.inputs_file.part[i].length, this.inputs_file.extension[i])

                    }

                }

            },

            /** Envio uma requisição para o servidor **/
            SendForm: async(name, pointer, part, length, extension) => {

                return axios.post('router.php?TABLE=IMAGEM&ACTION=IMAGEM_COMPRIMIR', {
                    inputs: {
                        name: name,
                        pointer: pointer,
                        part: part,
                        length: length,
                        extension: extension
                    }
                });

            },

            onChange(e) {

                /** Preparo o envio de múltiplos arquivos **/
                for (let i = 0; i < e.target.files.length; i++) {

                    /** Instâncimento de objeto para ler o conteúdo do arquivo ***/
                    let fileReader = new FileReader();

                    /** Leio o conteúdo do arquivo **/
                    fileReader.readAsDataURL(e.target.files[i]);

                    /** Pego o nome real do arquivo **/
                    this.inputs_file.name_auxiliary.push(e.target.files[i].name);

                    /** Gero o nome que vai salvar no banco de dados **/
                    this.inputs_file.name.push('mycms_' + (btoa(Math.random())) + '.' + (e.target.files[i].name.substring(e.target.files[i].name.indexOf(".") + 1)));

                    /** Pego o tipo do arquivo **/
                    this.inputs_file.extension.push(e.target.files[i].type);

                    fileReader.onload = (e) => {

                        /** Particionar o base64 em Array **/
                        let localString = e.target.result.split(',')[1];
                        let start = 0;
                        let end = 2097152;
                        let localArray = Array();
                        let part = null;

                        /** Executo de acordo com o tamanho do base64 **/
                        for (let i = 0; i < localString.length; i++) {

                            /** Preencho selecionando o que esta entre o valor inicial e final **/
                            part = localString.substring(start, end);

                            /** Verifico se cheguei ao final do base64, senão preencho as variáveis **/
                            if (part && part !== null) {

                                /** Coloca o trecho do base64 na última posição da array **/
                                localArray.push(part);

                                /** Crio um novo intervalo de valores **/
                                start = end;
                                end = end + 2097152;

                            }

                        }

                        /** Informo minha array de base64 particionada **/
                        this.inputs_file.part[i] = localArray;

                        /** Informo tamnho da minha array **/
                        this.inputs_file.length.push(localArray.length);

                    };

                }

            },

        },

    }

</script>