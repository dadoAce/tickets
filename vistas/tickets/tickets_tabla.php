<h5>Tickets</h5>
<?php if ($tickets != null) {
?>
    <table class=" table w-100">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Ticket Number</th>
            <th>Status</th>
            <th>Submitting Time</th>
        </thead>
        <tbody>

            <?php foreach ($tickets as $value) { ?>
                <tr>
                    <td><?= $value["name"] ?></td>
                    <td><?= $value["email"] ?></td>
                    <td><?= $value["ticketNumber"] ?> </td>
                    <td><?= $value["statusTicket"] ?></td>
                    <td><?= $value["dateRegister"] ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
<?php } else {
?>
    <h5>No hay Tickets</h5>

<?php } ?>