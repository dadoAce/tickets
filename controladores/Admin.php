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
        $datos["tickets"] = $ticketModel->tablaTicket();

        /* Direccion de vista en variable */
        $datos["contenido"] = "tickets/tickets_tabla";

        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("admin/Admin_Dashboard", $datos);
    }
    public function Register()
    {
        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("admin/Admin_Register");
    }
    public function Settings()
    {
        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("admin/Admin_Settings");
    }

    public function changeUser()
    {

        if (!isset($_POST["username"])) {
            echo "Error";
            return;
        }
        if (!isset($_POST["pass"])) {
            echo "Error";
            return;
        }
        if ($_POST["username"] == "" || $_POST["pass"] == "") {
            echo "Error";
            return;
        }

        $user = $_POST["username"];
        $pass = $_POST["pass"];
        $ticketModel = $this->modelo("TicketsM");
        $result = $ticketModel->editUserAdmir($user, $pass);
        if ($result) {
            echo "true";
        } else {
            echo "Error";
        }
        /* Mostrar la plantilla dibde se mostrara la el contenido */
    }
    public function changeUser2()
    {



        $ticketModel = $this->modelo("TicketsM");
        $result = $ticketModel->userAdmin();

        $datos["user"] =  $result["user"];
        $datos["pass"] = $result["pass"];
        echo json_encode($datos);
        /* Mostrar la plantilla dibde se mostrara la el contenido */
    }
}
