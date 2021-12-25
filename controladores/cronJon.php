<?php
date_default_timezone_set("America/Chicago");
$fecha = date("Y-m-d H:i:s");
$query = "update usuarios set fecha_modificacion = '$fecha' where idUsuario = 1";
echo $query;

$result = $this->query($query);
echo var_dump($result);