<?php
    session_start();

?>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Correo Institucional:</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['soluUsuario'];?>">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nombre Completo: </label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['soluNombre']." ".$_SESSION['soluApPat']." ".$_SESSION['soluApMat'];?>">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">CI:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['soluCi'];?>">
</div>
 <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Cargo</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['soluCargo'];?>">
</div>