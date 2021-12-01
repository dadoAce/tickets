<?php

/* Clase de ejemplo para modelo

 * Esta clase hereda los metodos de la Clase MODELO
 * Favor de checar los metodos basicos
 * 
 *  */

class TicketsM extends Modelo
{

    public $tabla = "tickets";
    public $pk = "idTicket";
    /* Opcion de usar un archivo entidad para filtrar algunas devoluciones; Se incluye una entidad de ejemplo: */
    public $entidad = false;
    public $entidad_nombre = "UsuarioEntidad";
    public $columnas = array(
        "name",
        "email",
        "ticketNumber",
        "statusTicket",
        "dateRegister",
        "dateUpdate"
    );



    public function __construct()
    {
    }

    public function primerTicket()
    {
        $query = "select * from tickets where statusTicket like 'PENDING' ORDER BY idTicket asc limit 1";

        $result = $this->getRow($query);
        return $result;
    }
    public function buscar($ticket)
    {
        $query = "select * from tickets where ticketNumber like '" + $ticket + "'  ";

        $result = $this->getRow($query);
        return $result;
    }
    public function tablaTicket()
    {
        $query = "select * from tickets order by dateRegister desc";

        $result = $this->getRow($query);
        return $result;
    }
}
