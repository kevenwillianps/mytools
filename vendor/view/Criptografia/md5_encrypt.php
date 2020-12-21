<div class="card shadow-sm animate slideIn">

    <form role="form" id="formMd5Encrypt" class="card-body">

        <h1 class="card-title">

            Criptografar  em <span class="badge badge-dark">MD5</span>

        </h1>

        <p class="lead">

            O algoritmo de sintetização de mensagen MD5 é uma função hash amplamente utilizada que produz um valor de hash de 128 bits. Embora o MD5 tenha sido projetado inicialmente para ser usado como uma função hash criptográfica, foi constatado que ele sofre de extensas vulnerabilidades

        </p>

        <div class="form-group">

            <input type="text" placeholder="Texto" id="string" name="string" class="form-control">

        </div>

        <div class="form-group">

            <button type="button" class="btn btn-outline-secondary w-100" onclick="sendForm('#formMd5Encrypt')">

                🔨 Criptografar

            </button>

        </div>

        <div class="form-group">

            <input type="text" placeholder="Resultado" id="string_encrypted" class="form-control">

        </div>

        <input type="hidden" name="FOLDER" value="ACTION"/>
        <input type="hidden" name="TABLE" value="CRIPTOGRAFIA"/>
        <input type="hidden" name="ACTION" value="MD5_ENCRYPT"/>

    </form>

</div>