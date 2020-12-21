<div class="card shadow-sm animate slideIn">

    <form role="form" id="formSha1Encrypt" class="card-body">

        <h1 class="card-title">

            Criptografar  em <span class="badge badge-dark">SHA1</span>

        </h1>

        <p class="lead">

            Em criptografia, SHA-1 é uma função de dispersão criptográfica projetada pela Agência de Segurança Nacional dos Estados Unidos e é um Padrão Federal de Processamento de Informação dos Estados Unidos publicado pelo Instituto Nacional de Padrões e Tecnologia.

        </p>

        <div class="form-group">

            <input type="text" placeholder="Texto" id="string" name="string" class="form-control">

        </div>

        <div class="form-group">

            <button type="button" class="btn btn-outline-secondary w-100" onclick="sendForm('#formSha1Encrypt')">

                🔨 Criptografar

            </button>

        </div>

        <div class="form-group">

            <input type="text" placeholder="Resultado" id="string_encrypted" class="form-control">

        </div>

        <input type="hidden" name="FOLDER" value="ACTION"/>
        <input type="hidden" name="TABLE" value="CRIPTOGRAFIA"/>
        <input type="hidden" name="ACTION" value="SHA1_ENCRYPT"/>

    </form>

</div>