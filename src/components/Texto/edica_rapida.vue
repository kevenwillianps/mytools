<template>

    <div class="jumbotron bg-white shadow-sm border animate animate__fadeIn">

        <h1 class="display-4">

            Edição de Texto <span class="badge badge-dark">Rápida</span>

        </h1>

        <p class="lead">

            Um editor de texto é um aplicativo de edição de arquivos/ficheiros de texto. Editores de texto são frequentemente equipados com sistemas operacionais ou pacotes de desenvolvimento de software, e pode ser usado para alterar arquivos de configuração.

        </p>

        <hr class="my-4">

        <div class="form-group border">

            <ckeditor :editor="editor" @ready="onReady" v-model="inputs.text"></ckeditor>

        </div>

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <button class="btn btn-primary" v-on:click="PdfGenerate()">

                        Gerar PDF

                    </button>

                </div>

            </div>

            <div class="col-md-6 text-right">

                <div class="form-group">

                    <div v-if="query.link">

                        <a class="btn btn-primary text-white" v-bind:href="query.link" download>

                            Download

                        </a>

                    </div>

                    <div v-else>

                        <button class="btn btn-primary text-white disabled" disabled>

                            Download

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
    
</template>

<script type="text/ecmascript-6">

    /** importação de componentes **/
    import axios from 'axios';

    /** Importação de componentes **/
    import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';

    export default {

        name: "edica_rapida",

        data (){

            return {

                editor: DecoupledEditor,
                inputs : {

                    text : 'Comece a digitar',

                },
                query : {

                    link : null

                }

            }

        },

        methods: {

            PdfGenerate(){

                axios.post('router.php?TABLE=PDF&ACTION=PDF_GENERATE', {inputs : this.inputs})

                    .then(response => {

                        console.log(response);
                        this.query.link = response.data.link

                    })

                    .catch(response => {

                        console.log(response);

                    });

            },

            onReady( editor )  {

                editor.ui.getEditableElement().parentElement.insertBefore(

                    editor.ui.view.toolbar.element,
                    editor.ui.getEditableElement()

                );

            }

        }

    }

</script>