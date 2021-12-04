<?php

class Admin extends App
{

    function __construct()
    {
    }

    public function index()
    {
        include_once "libs/Sesiones.php";
        $sesionesM = new Sesiones();
        $sesionesM->filtroUsuarioDinamica();

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
        $datos["contenido"] = "tickets/tickets_tabla";

        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("admin/template_Admin", $datos);
    }
}
