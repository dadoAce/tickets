<?php

class Admin extends App
{

    function __construct()
    {
    }

    public function index()
    {
        $this->inicio();
    }

    /* Vista */

    public function inicio()
    {
        /* Llamar al Modelo Usuarios */
        /* Crear Objeto */
        $ticketModel = $this->modelo("TicketsM");

        /* Crear variables */
        $datos["tickets"] = $ticketModel->selectAll();

        /* Direccion de vista en variable */
        $vista["contenido"] = $this->vista("tickets/tickets_tabla", $datos);

        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("Admin/template_Admin", $vista);
    }
}
