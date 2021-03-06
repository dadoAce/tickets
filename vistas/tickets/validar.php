<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"> 
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


                <img id="imgLogo" src='<?= $this->base_url("assets/imgs/sistema/logo_large_dark.png") ?>'>
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
                    <label>TICKET NUMBER:</label>
                    <input type="text" class="boton-estilo-1" name="numberTicket" id="numberTicket" placeholder="">
                </div>
                <div class="col-12">
                    <label>CONFIRM TICKET NUMBER:</label>
                    <input type="text" class="boton-estilo-1" name="numberTicket2" id="numberTicket2" placeholder="">
                </div>
                <br>

                <input id="btnSubmit" type="button" class="btn-black p-3 pr-5 pl-5" value="SUBMIT">

            </form>
            <div id="loadingSpinner" class="spinner-border text-primary" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div>
            <div id="msnSucces" role="status" style="display: none;" class="text-center">
                <img width="30" src="<?php echo $this->base_url("/assets/imgs/sistema/success.gif") ?>" class="rounded-circle bg-white">
                <span class="">Ticket has been successfully submitted.</span>
            </div>
            <div id="divVerificar"></div>
        </div>
    </main>
    <form action="Tickets/verificar" method="POST" id="frmVerificar">
        <input type="hidden" name="idTicketVerificar" id="idTicketVerificar">
    </form>


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
        if ($("#numberTicket").val() != $("#numberTicket2").val()) {
            $("#numberTicket").addClass("invalid");
            $("#numberTicket2").addClass("invalid");
            alert("Ticket Numbers are different")
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
                console.log("Respuesta:");
                console.log(response);
                if (response == "ya registrado") {
                    $("#idTicketVerificar").val($("#numberTicket").val())
                    $("#frmVerificar").submit()

                } else
                if (response == "error") {
                    alert("Error")
                    $("#frmTicket").show();
                    $("#loadingSpinner").hide();
                }else if (response >0) {
                    $("#msnSucces").show("slow")
                    $("#loadingSpinner").hide("slow");
                }  else {
                    $("#frmTicket").show();
                    $("#loadingSpinner").hide();
                }
            },
            contentType: false,
            processData: false,

            error: function(error) {
                $("#frmTicket").show();
                $("#loadingSpinner").hide();
                console.log("Error")
                console.log(error)
            }
        }).always(function(response) {

        });
    });
</script>
<?= $this->vista("complementos/referencias/referencias_footer"); ?>