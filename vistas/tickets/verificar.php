<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Validar</title>
    <?= $this->vista("complementos/referencias/referencias"); ?>
</head>
<style>
    label {
        width: 100%;
        text-align: start;
        color: #6e6e6e;
        margin-top: 5%;
    }

    .boton-estilo-1 {
        display: block;
        border: none;
        background-color: transparent;
        border-bottom: solid 2px #000;
        width: 100%;
    }

    .boton-estilo-1:focus-visible {
        border-bottom: solid 2px #1f27ba;
        outline: #053fff;
    }

    .invalid {
        display: block;
        border: none;
        background-color: transparent;
        border-bottom: solid 2px #c22828;
        width: 100%;

    }
</style>

<body class="">
    <main class="main-principal h-100">
        <div class="container h-100  d-flex flex-column justify-content-center align-items-center">

            <table>
                <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $ticketNumber ?></td>
                        <td><?= $ticketStatus ?></td>
                    </tr>
                </tbody>
            </table>
            <input id="btnSubmit" type="button" class="btn bg-2 text-white" value="UPGRADE">

            <div id="loadingSpinner" class="spinner-border text-primary" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </main>
</body>

<?= $this->vista("complementos/referencias/referencias_footer"); ?>

</html>
<script>
    $("#btnSubmit").on("click", function() {
        window.reload();
    });
</script>
<?= $this->vista("complementos/referencias/referencias_footer"); ?>