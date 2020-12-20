<div class="card shadow-sm animate slideIn">

    <form role="form" id="frmPessoaGenerateCpf" class="card-body">

        <h1 class="card-title">

            Gerador de <span class="badge badge-dark">CPF</span>

        </h1>

        <p class="lead">

            O Cadastro de Pessoas Físicas é o registro mantido pela Receita Federal do Brasil no qual podem se inscrever, uma única vez, quaisquer pessoas naturais, independentemente de idade ou nacionalidade, inclusive falecidas. Cada inscrito é unicamente identificado por um número de inscrição no CPF de 11 dígitos decimais.

        </p>

        <div class="form-group">

            <button type="button" class="btn btn-outline-secondary w-100" onclick="sendForm('#frmPessoaGenerateCpf')">

                🔨 Gerar

            </button>

        </div>

        <div class="form-group">

            <input type="text" placeholder="CPF Gerado" id="cpf" class="form-control">

        </div>

        <input type="hidden" name="FOLDER" value="ACTION"/>
        <input type="hidden" name="TABLE" value="PESSOA"/>
        <input type="hidden" name="ACTION" value="PESSOA_GENERATE_CPF"/>

    </form>

</div>