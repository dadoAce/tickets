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


            <form id="frmTicket" class="text-center p-5 shadow rounded" action="Tickets/registrarTicket" method="post">


                <h3>WELCOME TO SWEAT RIVER OAKS</h3>
                <div class="col-12  ">

                    <label>NAME:</label>
                    <input type="text" class="boton-estilo-1" name="name" id="name">
                </div>
                <div class="col-12  ">
                    <label>E-MAIL:</label>
                    <input type="email" class="boton-estilo-1" name="email" id="email" placeholder="">
                </div>
                <div class="col-12">
                    <label>TICKET NUMBER</label>
                    <input type="text" class="boton-estilo-1" name="numberTicket" id="numberTicket" placeholder="">
                </div>
                <br>

                <input id="btnSubmit" type="button" class="btn bg-2 text-white" value="SUBMIT">

            </form>
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
        $("input").removeClass("invalid");
        if ($("#name").val() == "") {
            $("#name").addClass("invalid");
            return;

        }
        if ($("#email").val() == "") {
            $("#email").addClass("invalid");
            return;

        }
        if ($("#numberTicket").val() == "") {
            $("#numberTicket").addClass("invalid");
            return;
        }
        $("#frmTicket").hide();
        $("#loadingSpinner").show();
        var fd = document.getElementById("frmTicket");
        var form = new FormData(fd);
        $.ajax({
            url: '/tickets/Tickets/registrarTicket',
            type: 'post',
            data: form,
            success: function(response) {
                console.log(response);
                if (response) {

                }
            },
            contentType: false,
            processData: false,

            error: function(error) {
                console.log("Error")
                console.log(error)
            }
        }).always(function(response) {

            $("#frmTicket").show();
            $("#loadingSpinner").hide();
        });
    });
</script>
<?= $this->vista("complementos/referencias/referencias_footer"); ?>