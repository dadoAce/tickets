 <section class=" d-flex flex-column justify-content-center align-items-center w-100 mt-2 ">


     <div class="border border-dark rounded bg-light w-50 p-2">

         <h5>Tickets</h5>
         <?php if ($tickets != null) {
            ?>
             <table class="table table-dark w-100">
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
     </div>

 </section>