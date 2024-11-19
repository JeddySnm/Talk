<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fnameEd']);
    $lname = mysqli_real_escape_string($conn, $_POST['lnameEd']);
    $idUser = $_SESSION['unique_id'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE users SET fname='$fname', lname='$lname' WHERE unique_id=$idUser";

        if ($conn->query($sql) === TRUE) {
            echo "Cambio Realizado Exitosamente";
        } else {
            echo "Error en la Actualizacion de Datos: " . $conn->error;
        }

    $conn->close();
    }
?>