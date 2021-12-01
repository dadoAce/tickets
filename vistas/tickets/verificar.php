<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Validar</title>
    <?= $this->vista("complementos/referencias/referencias"); ?>
</head> 

<body class="">
    <main class="main-principal h-100">
        <div class="container h-100  d-flex flex-column justify-content-center align-items-center"> 
            <table class="table table-hover table-border">
                <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $ticket["ticketNumber"] ?></td>
                        <td><?= $ticket["statusTicket"] ?></td>
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
        location.reload();
    });
</script>
<?= $this->vista("complementos/referencias/referencias_footer"); ?>