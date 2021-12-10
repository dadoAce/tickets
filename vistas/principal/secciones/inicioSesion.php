<div class="container h-100  d-flex flex-column justify-content-center align-items-center">


    <form id="frm-sesion" class="text-center p-5" action="<?= $this->base_url("Usuario/iniciarSesion") ?>" method="post">


        <img id="imgLogo" src='<?= $this->base_url("assets/imgs/sistema/logo_large_dark.png") ?>'>
        <h2  class="d-block" >RIVER OAKS PARKING DASHBOARD</h2>
        <div class="  ">

            <label class="sub-label">USERNAME</label>
            <input type="text" class="form-control   " name="usuario" id="usuario" placeholder="username" value="">
        </div>
        <div class="  ">
            <label class="sub-label">PASSWORD</label>
            <input type="password" class="form-control   " name="password" id="password" placeholder="password" value="">
        </div>
        <br>
        <div class="text-center">

            <input type="submit" class="btn-transparent pl-3 pr-3" value="LOGIN">
        </div>

    </form>
</div>