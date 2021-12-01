<div class="container h-100  d-flex flex-column justify-content-center align-items-center">


    <form class="text-center p-5 shadow rounded" action="<?= $this->base_url("Usuario/iniciarSesion") ?>" method="post">


        <h3>SWEAT</h3>
        <div class="  ">

            <label>USERNAME</label>
            <input type="text" class="form-control text-center shadow" name="usuario" id="usuario" placeholder="Usuario" value="Admin">
        </div>
        <div class="  ">
            <label>PASSWORD</label>
            <input type="password" class="form-control text-center shadow" name="password" id="password" placeholder="password" value="Admin">
        </div>
        <br>

        <input type="submit" class="btn bg-2 text-white" value="Iniciar Sesion">

    </form>
</div>