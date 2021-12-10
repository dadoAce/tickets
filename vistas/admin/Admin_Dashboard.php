<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tickets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->vista("complementos/referencias/referencias"); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

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
      <li class="nav-item">
        <a class="nav-link" href="http://50.246.39.154:9000/WebValidationManager/">Parking Website</a>
      </li>  
        
    </ul> 
  </div>
</nav>
    <main class="bg-l-g-1 pt-3">

        <!--MENU LATERAL-->
        <?php $this->vista("complementos/menus/menuPrincipal"); ?>
        <section id="contenido" class="d-flex flex-column justify-content-center align-items-center     pl-2 pr-2">
            <div id="content-titulo" class="w-100 p-3 d-flex justify-content-between ">
                <h6 class="m-0 p-0 d-flex justify-content-end align-items-center">Submitted Tickets</h6>
                <div class='d-flex'> 
                    
                <a class=" btn-black-2 mr-3 d-none d-md-flex" href="http://50.246.39.154:9000/WebValidationManager/" style="line-height: 22px;">Parking Website</a>

  <form action="<?= $this->base_url("Usuario/cerrarSesion") ?>" method="GET" class="m-0 p-0 d-none d-md-flex justify-content-end align-items-end">
                    <input type="submit" value="Log Out" class="btn p-0 btn-transparent ">
                </form>
            </div>
            </div>
            <div class="pr-3 pl-3 w-100 pt-3">

                <table id="tablaTickets" class=" table table-responsive-sm">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Ticket Number</th>
                            <th>Status</th>
                            <th>Submitting Time</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($tickets as $value) { ?>
                            <tr>
                                <td><?= $value["name"] ?></td>
                                <td><?= $value["email"] ?></td>
                                <td><?= $value["ticketNumber"] ?> </td>
                                <?php
                                if ($value["statusTicket"] == "VALITED") {
                                    echo "<td class='text-success text-capitalize'>" . $value["statusTicket"] . "</td>";
                                }
                                if ($value["statusTicket"] == "DISAPPROVED") {
                                    echo "<td class='text-danger text-capitalize'>" . $value["statusTicket"] . "</td>";
                                }
                                if ($value["statusTicket"] == "PENDING") {
                                    echo "<td class='text-warning text-capitalize'>" . $value["statusTicket"] . "</td>";
                                }

                                ?>


                                <td><?= $value["dateRegister"] ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
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