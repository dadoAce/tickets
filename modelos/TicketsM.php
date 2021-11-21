<?php

/* Clase de ejemplo para modelo

 * Esta clase hereda los metodos de la Clase MODELO
 * Favor de checar los metodos basicos
 * 
 *  */

class TicketsM extends Modelo
{

    public $tabla = "tickets";
    public $pk = "idTicketPrimaria";
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

    
}
