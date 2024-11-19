<?php
session_start();

// Verificar si existe una sesión única
if (!isset($_SESSION['unique_id'])) {
    die("No existe una sesión válida.");
}

// Incluir el archivo de configuración
include_once "config.php";

// Obtener el id de usuario de la sesión
$idUser = $_SESSION['unique_id'];

// Preparar la consulta para obtener los datos del usuario
$sql = "SELECT email, password, security_answer FROM users WHERE unique_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $idUser);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Obtener los datos del usuario
$email = $row['email'];
$passwordVieja = $row['password'];
$security_answer_verf = $row['security_answer'];

// Verificar si la conexión a la base de datos fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$email_val = $_POST['email'];
$old_password = $_POST['password'];
$newPassword = $_POST['newpassword'];
$confirm_password = $_POST['newpasswordconfir'];
$security_answer = $_POST['security_answer'];

// Verificar que todos los datos del formulario estén presentes
if (isset($_SESSION['unique_id']) && isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['security_answer'])) {
    // Verificar que los campos del formulario no estén vacíos
    if (!empty($email_val) && !empty($old_password) && !empty($newPassword) && !empty($confirm_password) && !empty($security_answer)) {
        // Verificar que el correo electrónico coincida con el de la sesión
        if ($email_val == $email) {
            // Verificar que la contraseña anterior coincida con la almacenada
            if (md5($old_password) == $passwordVieja) {
                // Verificar que las nuevas contraseñas coincidan
                if ($newPassword == $confirm_password) {
                    // Verificar que la respuesta de seguridad coincida con la almacenada
                    if (md5($security_answer) == $security_answer_verf) {
                        // Actualizar la contraseña en la base de datos
                        $hashed_password = md5($newPassword);
                        $sql = "UPDATE users SET password = '$hashed_password' WHERE unique_id = '$idUser'";
                        if ($conn->query($sql) === TRUE) {
                            $response = "Proceso exitoso!";
                        } else {
                            die("Error actualizando la contraseña: " . $conn->error);
                        }
                    } else {
                        $response = "Respuesta de seguridad incorrecta, verifique...";
                    }
                } else {
                    $response = "Confirmación de contraseña incorrecta, verifique...";
                }
            } else {
                $response = "Contraseña anterior incorrecta, verifique...";
            }
        } else {
            $response = "Correo electrónico incorrecto, verifique...";
        }
    } else {
        $response = "Datos incompletos, verifique...";
    }
} else {
    // Acción si falta alguna clave de sesión
    $response = "sesion erronea, verifique...";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>