<div class="card shadow-sm animate slideIn">

    <form role="form" id="frmPessoaGenerateCpf" class="card-body">

        <h1 class="card-title">

            Gerador de <span class="badge badge-dark">CNPJ</span>

        </h1>

        <p class="lead">

            No Brasil, o Cadastro Nacional da Pessoa Jurídica é um número único que identifica uma pessoa jurídica e outros tipos de arranjo jurídico sem personalidade jurídica junto à Receita Federal brasileira.

        </p>

        <div class="form-group">

            <button type="button" class="btn btn-outline-secondary w-100" onclick="sendForm('#frmPessoaGenerateCpf')">

                🔨 Gerar

            </button>

        </div>

        <div class="form-group">

            <input type="text" placeholder="CNPJ Gerado" id="cnpj" class="form-control">

        </div>

        <input type="hidden" name="FOLDER" value="ACTION"/>
        <input type="hidden" name="TABLE" value="EMPRESA"/>
        <input type="hidden" name="ACTION" value="EMPRESA_GENERATE_CNPJ"/>

    </form>

</div>