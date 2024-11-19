<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    die("No valid session.");
}
include_once "config.php";
$idUser = $_SESSION['unique_id'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el archivo subido
$file = $_FILES['image'];

// Verificar si se subió un archivo
if ($file['error'] === UPLOAD_ERR_OK) {
    // Obtener las propiedades del archivo
    $name = $file['name'];
    $size = $file['size'];
    $type = $file['type'];

    // Verificar el tipo de archivo
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($type, $allowed_types)) {
        $response = "Error: Solo se permiten archivos JPG, PNG y GIF.";
        echo $response;
    }else{
        // Verificar el tamaño del archivo (máximo 10 MB)
        if ($size > 10 * 1024 * 1024) {
            $response = "Error: El tamaño del archivo excede el límite permitido (10 MB).";
            echo $response;
            exit;
        }
        
        // Generar un nombre único para el archivo
        $new_name = uniqid() . '-' . $name;

        // Mover el archivo a la carpeta images
        $target_dir = "images/";
        $target_file = $target_dir . $new_name;
        if (!move_uploaded_file($file['tmp_name'], $target_file)) {
            $response = "Error al mover el archivo.";
            echo $response;
        }else{
            $sql = "UPDATE users SET img='$new_name' WHERE unique_id=$idUser";

            if ($conn->query($sql) === TRUE) {
                // Crear la variable con la URL de la nueva imagen
                $new_image_url = 'php/images/' . $new_name;
                $response = $new_image_url;
            } else {
                $response = array('status' => 'error', 'message' => 'Error en la Actualizacion de Datos: ' . $conn->error);
            }
        }
    }
/*
    // Mostrar las propiedades del archivo
    $response = "Nombre: $new_name\n";
    $response .= "Tamaño: " . ($size / 1024) . " KB\n";
    $response .= "Tipo: $type\n";
*/

$conn->close();

} else {
    $response = "Error al subir el archivo: " . $file['error'];
}

// Devolver la respuesta al cliente
header('Content-Type: text/plain');
echo $response;
?>
