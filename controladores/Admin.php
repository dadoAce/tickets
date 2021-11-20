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
        $this->modelo("UsuarioModel");
        /* Crear Objeto */
        $usuarioM = new UsuarioModel();

        /* Crear variables */
        $datos["usuarios"] = $usuarioM->usuariosActivos(1);
        $datos["usuariosInactivos"] = $usuarioM->usuariosActivos(0);

        /* Direccion de vista en variable */
        $this->vista("admin/template_Admin", $datos);
        $vista["contenido"] = $this->vista("Admin/usuarios_admin", null, true);

        echo  $vista["contenido"];
        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("Admin/template_Admin", $vista);
    }
}
