<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
$security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($security_question) && !empty($security_answer)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$email - ¡Este e-mail ya existe!";
            } else {
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ["jpeg", "png", "jpg"];
                    if (in_array($img_ext, $extensions) === true) {
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if (in_array($img_type, $types) === true) {
                            $time = time();
                            $new_img_name = $time . $img_name;
                            if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                                $ran_id = rand(time(), 100000000);
                                $status = "Disponible";
                                $encrypt_pass = md5($password);
                                $encrypt_answer = md5($security_answer);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, security_question, security_answer)
                                    VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$security_question}', '{$encrypt_answer}')");
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if (mysqli_num_rows($select_sql2) > 0) {
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "Proceso Exitoso";
                                    } else {
                                        echo "¡Esta dirección de correo electrónico no existe!";
                                    }
                            } else {
                                    echo "Algo salió mal. ¡Inténtalo de nuevo!";
                            }
                        }
                    } else {
                            echo "Cargue un archivo de imagen: jpeg, png, jpg";
                    }
                } else {
                        echo "Cargue un archivo de imagen: jpeg, png, jpg";
                }
            }
        } else {
            echo "$email ¡No es un correo electrónico válido!";
        }
} else {
    echo "¡Todos los campos de entrada son obligatorios!";
}