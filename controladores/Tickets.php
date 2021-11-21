<?php

class Tickets extends App
{

    function __construct()
    {
    }

    public function index()
    {
        $this->inicio();
    }

    public function inicio()
    {/* Vista */
        $this->vista("tickets/validar");
    }
    public function tablaTicket()
    {/* Vista */
        $this->vista("validar/validar");
    }

    public function registrarTicket()
    {
        $datos["name"] = $_POST["name"];
        $datos["email"] = $_POST["email"];
        $datos["ticketNumber"] = $_POST["numberTicket"];
        $datos["statusTicket"] = "PENDING";
        $datos["dateRegister"] =  date("Y-m-d H:i:s");
        $ticketModel = $this->modelo("TicketsM");
        $ticketModel->save($datos);

        header("Location: " . $this->base_url("Validar"));
    }
    public function tabla()
    {
        /* Llamar al Modelo Usuarios */
        /* Crear Objeto */
        $ticketModel = $this->modelo("TicketsM");

        /* Crear variables */
        $datos["tickets"] = $ticketModel->selectAll();

        $this->vista("complementos/referencias/referencias");
        $vista["contenido"] = $this->vista("tickets/tickets_tabla", $datos);
    }
    public function buscarTicket()
    {

        $ticketModel = $this->modelo("TicketsM");
        $ticket = $ticketModel->primerTicket();
        echo json_encode($ticket);
    }

    public function estatusTicket()
    {
        $datos["statusTicket"] = $_GET["estatus"];
        $datos["idTicket"] = $_GET["idTicket"]; 
        $ticketModel = $this->modelo("TicketsM");
        $result = $ticketModel->update($datos);
        return json_decode($result);
    }
}