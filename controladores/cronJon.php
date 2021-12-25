<?php

class cronJon extends App
{

    function __construct()
    {

        $ticketModel = $this->modelo("TicketsM");
        $result = $ticketModel->pruebaCron();
        echo "listo";
    }
}
