<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <?= $this->vista("complementos/referencias/referencias"); ?>
</head>

<body>
    <main class="bg-l-g-1 pt-3">

        <!--MENU LATERAL-->
        <?php $this->vista("complementos/menus/menuPrincipal"); ?>
        <section id="contenido" class=" d-flex flex-column justify-content-center align-items-center     pl-2 pr-2">
            <div id="content-titulo" class="w-100 p-3">
                <h6>Submitted Tickets</h6>
                <form action="<?= $this->base_url("Usuarios/cerrarSesion") ?>">
                    <input type="submit" value="Log Out" class="btn">
                </form>
            </div>
            <div class="pr-3 pl-3 w-100">

                <table class=" table w-100">
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