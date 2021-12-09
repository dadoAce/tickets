<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DadoRoom</title>
    <?= $this->vista("complementos/referencias/referencias"); ?>
</head>

<body class="">
    <main class="main-principal h-100">

        <!--MENU LATERAL-->
        <!--CONTENIDO-->
        <section class=" h-100 d-flex justify-content-center ">
            <?php $this->vista("principal/secciones/inicioSesion"); ?>
        </section>
    </main>
</body>

</html>
<?= $this->vista("complementos/referencias/referencias_footer"); ?>