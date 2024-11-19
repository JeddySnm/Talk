<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TALK +</title>
    <link rel="icon" href="imagen.avif">
    <link rel="stylesheet" href="eliminarcuenta.css">

</head>
 
<body>

<div class="formulario">

<h1>Eliminar cuenta</h1>

<form action="delete.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="username">
        <input type="text" name="correo" required>
        <label>Correo Electronico</label>
    </div>

    <div class="username">
    <input type="password" name="clave" required>
    <label>Contraseña</label>

</div> 

<div class="checkbox">
    <input type="checkbox" required>
    <label>Seguro que deseas eliminar tu cuenta?</label>
</div>

<input type="submit" value="Borrar">
</form>
</div>

</body>
</html>