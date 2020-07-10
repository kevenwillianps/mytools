<template>

    <div id="app">

        <div class="wrapper">

            <nav id="sidebar" class="shadow-sm">

                <div class="sidebar-header">

                    <h3>

                        MyTools

                    </h3>

                </div>

                <ul class="list-unstyled components">

                    <li>

                        <a href="#Texto" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            📔 Texto

                        </a>

                        <ul class="collapse list-unstyled" id="Texto">

                            <li>

                                <router-link to="/texto/edicao/rapida/">

                                    Edição Rápida

                                </router-link>

                            </li>

                            <li>

                                <router-link to="/pessoal/edicao/segura/">

                                    Edição Segura

                                </router-link>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#PessoalMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            🙎 Pessoa

                        </a>

                        <ul class="collapse list-unstyled" id="PessoalMenu">

                            <li>

                                <router-link to="/pessoal/cpf/gerar/">

                                    CPF

                                </router-link>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#EmpresaMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            🏭 Empresa

                        </a>

                        <ul class="collapse list-unstyled" id="EmpresaMenu">

                            <li>

                                <router-link to="/empresa/cnpj/gerar/">

                                    CNPJ

                                </router-link>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#CriptografiaMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            🔐 Criptografia

                        </a>

                        <ul class="collapse list-unstyled" id="CriptografiaMenu">

                            <li>

                                <router-link to="/criptografia/bas64/codificar/">

                                    Base64

                                </router-link>

                            </li>

                            <li>

                                <router-link to="/criptografia/md5/codificar/">

                                    Md5

                                </router-link>

                            </li>

                            <li>

                                <router-link to="/criptografia/sha1/codificar/">

                                    SHA1

                                </router-link>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#WebMEnu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            💻 Web

                        </a>

                        <ul class="collapse list-unstyled" id="WebMEnu">

                            <li>

                                <router-link to="/web/comprimir/css/">

                                    Comprimir CSS

                                </router-link>

                            </li>

                            <li>

                                <router-link to="/web/comprimir/js/">

                                    Comprimir JS

                                </router-link>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#CorreiosMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            🚚 Correios

                        </a>

                        <ul class="collapse list-unstyled" id="CorreiosMenu">

                            <li>

                                <router-link to="/correios/frete/calcular/">

                                    Calcular

                                </router-link>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#Imagem" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                            📷 Imagem

                        </a>

                        <ul class="collapse list-unstyled" id="Imagem">

                            <li>

                                <router-link to="/imagem/comprimir/">

                                    Comprimir

                                </router-link>

                            </li>

                        </ul>

                    </li>

                </ul>

                <ul class="list-unstyled CTAs">

                    <li>

                        <a href="https://github.com/kevenwillianps/mytools" class="download" target="_blank">

                            Github

                        </a>

                    </li>

                    <li>

                        <a href="http://kevenwillian.com.br/" class="article" target="_blank">

                            Keven Willian

                        </a>

                    </li>

                </ul>

            </nav>

            <!-- Page Content  -->
            <div id="content">

                <router-view></router-view>

            </div>

        </div>

    </div>

</template>

<script type="text/ecmascript-6">

    export default {

        name: 'App',

        mounted(){

            console.log('Componente "App", montado com sucesso')

        }

    }

</script>