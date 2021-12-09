<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tickets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->vista("complementos/referencias/referencias"); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex d-sm-none">
        <a class="navbar-brand" href="#">SWEAT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->base_url("Usuario/cerrarSesion") ?>">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="bg-l-g-1 pt-3">

        <!--MENU LATERAL-->
        <?php $this->vista("complementos/menus/menuPrincipal"); ?>
        <section id="contenido" class="d-flex flex-column justify-content-center align-items-center     pl-2 pr-2">
            <div id="content-titulo" class="w-100 p-3 d-flex justify-content-between ">
                <h6 class="m-0 p-0 d-flex justify-content-end align-items-center">Register Ticket</h6>
                <form action="<?= $this->base_url("Usuario/cerrarSesion") ?>" method="GET" class="m-0 p-0 d-none d-md-flex justify-content-end align-items-end">
                    <input type="submit" value="Log Out" class="btn p-0">
                </form>
            </div>
            <div class="pr-3 pl-3 w-100 pt-3">
                <div class="  h-100  d-flex flex-column justify-content-center align-items-center">

 
                    <form id="frmTicket" class="text-center p-5 shadow rounded" action="Admin/changeUser" method="post">

 
                        <div class="col-12  ">

                            <label>Username:</label>
                            <input type="text" class="boton-estilo-1" name="username" id="username">
                        </div>
                        <div class="col-12  ">
                            <label>Password:</label>
                            <input type="email" class="boton-estilo-1" name="pass" id="pass" placeholder="">
                        </div> 
                        <br>

                        <input id="btnSubmit" type="button" class="btn-black" value="SUBMIT">

                    </form>
                    <div id="loadingSpinner" class="spinner-border text-primary" role="status" style="display: none;">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div id="msnSucces" role="status" style="display: none;">
                        <span class="">The data has been modified</span>
                    </div>
                    <div id="divVerificar"></div>
                </div>

            </div>
        </section>
    </main>
</body>

</html>
<?= $this->vista("complementos/referencias/referencias_footer"); ?>
<script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaTickets').DataTable();
    });
</script>
<script>
    $("#btnSubmit").on("click", function() {
        $("input").removeClass("invalid");
        if ($("#name").val() == "") {
            $("#name").addClass("invalid");
            return;

        }  
        /*
        if ($("#numberTicket").val() != $("#numberTicket2").val()) {
            $("#numberTicket").addClass("invalid");
            $("#numberTicket2").addClass("invalid");
            alert("Ticket Numbers are different")
            return;
        }
*/
        $("#frmTicket").hide();
        $("#loadingSpinner").show();
        var fd = document.getElementById("frmTicket");
        var form = new FormData(fd);
        $.ajax({
            url: '/tickets/Admin/changeUser',
            type: 'post',
            data: form,
            success: function(response) {
                console.log("Respuesta:");
                console.log(response);
                if (response == "true") {
                    
                    $("#msnSucces").show("slow")
                    $("#loadingSpinner").hide("slow");

                }   else { 
                    $("#idTicketVerificar").val($("#numberTicket").val())
                   $("#frmVerificar").submit()
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