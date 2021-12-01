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
        echo json_encode($ticketModel->selectAll());
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
        $datos["ticketNumber"] = $_GET["ticket"];
        $ticketModel = $this->modelo("TicketsM");
        $result = $ticketModel->update($datos);
        echo json_decode($result);
    }

    public function useData(){
        
        $datos["user"] =  "Test2";
        $datos["pas"] = $_GET["Testing123!"];
    }
}
