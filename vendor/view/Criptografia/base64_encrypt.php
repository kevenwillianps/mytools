<div class="card shadow-sm animate slideIn">

    <form role="form" id="formBase64Encrypt" class="card-body">

        <h1 class="card-title">

            Criptografar  em <span class="badge badge-dark">Base64</span>

        </h1>

        <p class="lead">

            Base64 é um método para codificação de dados para transferência na Internet. É utilizado frequentemente para transmitir dados binários por meios de transmissão que lidam apenas com texto, como por exemplo para enviar arquivos anexos por e-mail. É constituído por 64 caracteres que deram origem ao seu nome.

        </p>

        <div class="form-group">

            <input type="text" placeholder="Texto" id="string" name="string" class="form-control">

        </div>

        <div class="form-group">

            <button type="button" class="btn btn-outline-secondary w-100" onclick="sendForm('#formBase64Encrypt')">

                🔨 Criptografar

            </button>

        </div>

        <div class="form-group">

            <input type="text" placeholder="Resultado" id="string_encrypted" class="form-control">

        </div>

        <input type="hidden" name="FOLDER" value="ACTION"/>
        <input type="hidden" name="TABLE" value="CRIPTOGRAFIA"/>
        <input type="hidden" name="ACTION" value="BASE64_ENCRYPT"/>

    </form>

</div>