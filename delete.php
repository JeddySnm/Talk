<?php

include_once "php/config.php";

$correo = $_POST['correo'];
$clave = $_POST['clave'];
$encryp_clave = md5($clave)

$sql = "DELETE FROM users WHERE email = '$correo' && password = '$encryp_clave'";

if($conn -> query($sql) === TRUE){
    echo "Datos eliminados correctamente";
} else {
    echo "Error al eliminar datos" . $conn->error;
}

$conn->close();

?>