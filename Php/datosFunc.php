<?php
    session_start();

?>
<form id="datosDelFuncionario">
    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Correo Institucional:</label>
            <input type="email" readonly class="form-control" id="correoInstitucional" value="<?php echo trim($_SESSION['soluUsuario']);?>">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Nombres: </label>
            <input type="text" class="form-control" id="nombre" value="<?php echo trim($_SESSION['soluNombre']);?>">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Ap. Paterno: </label>
            <input type="text" class="form-control" id="apPat" value="<?php echo trim ($_SESSION['soluApPat']);?>">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Ap. Materno </label>
            <input type="text" class="form-control" id="apMat" value="<?php echo trim($_SESSION['soluApMat']);?>">
        </div>
    </div> 
    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">CI:</label>
            <input type="text" class="form-control" id="ci" value="<?php echo trim($_SESSION['soluCi']);?>">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Cargo</label>
            <input type="text" class="form-control" readonly id="cargo" value="<?php echo trim($_SESSION['soluCargo']);?>">
        </div>
    </div>
</form>
