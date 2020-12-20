<?php

    /** Importação autoload */
    include_once './vendor/autoload.php';

    /** Variaveis padrão */
    $urlAplicacao = 'http://localhost/MyTools/';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <base href="<?php echo $urlAplicacao?>"/>
    <meta charset="UTF-8">
    <title>

        MyTools | Ferramentas Diversificadas

    </title>

    <!-- Importação de arquivos de estilo -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate-dropdown.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Importação de arquivos javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

</head>

<body>

    <?php

        /** Importação dos menus */
        include 'vendor/view/geral/menu.php';

    ?>

    <div id="page-wrapper" class="container mt-3"></div>

    <script type="text/javascript">

        $(document).ready(function(e) {

            request('FOLDER=VIEW&TABLE=GERAL&ACTION=DATAGRID_SERVICE');

        });

    </script>

</body>
</html>