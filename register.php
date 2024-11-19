<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>


<body>
  <div class="wrapper">
  <div class="barra">
    <section class="form signup">
    <header>TALK +</header>
    <p class="title">Inicia Sesión</p>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <section class="cajaOverflow">
                <div class="error-text"></div>
                <div class="name-details">
            <div class="fieldcontainer">
                <section class="nameDetails">
                <div class="field input">
                    <label>Tu nombre</label>
                    <input type="text" name="fname" placeholder="Nombre" required>
                </div>
                <div class="field input">
                    <label>Tu apellido</label>
                    <input type="text" name="lname" placeholder="Apellido" required>
                </div>
            </section>
            <section class="avatar">
                <div class="field image">
                <label>Tu Avatar</label>
                <div class="preview-image">
                        <img id="preview-img" src="" alt="Imagen previa">
                </div>
                  <button class="chooseFile">
                  <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                  Elige un Avatar
                  </button>
                </div>
            </section>
            </div>
                </div>
                <div class="field input">
                <label>Correo</label>
                <input type="text" name="email" placeholder="tucorreo@correo.com" required>
                </div>
                <div class="field input">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
                <i class="fas fa-eye"></i>
                </div>
                <div class="field input">
                <label>Pregunta de Seguridad</label>
                <input type="text" name="security_question" placeholder="Nombre de tu mascota..." required>
                </div>
                <div class="field input">
                <label>Respuesta de Seguridad</label>
                <input type="text" name="security_answer" placeholder="Tu respuesta aquí..." required>
                </div>        
        </section>
                <div class="field button">
                  <input type="submit" name="submit" value="Acceder al Chat">
                </div>
                
            </form>

      <div class="link">Ya te has registrado? <a href="login.php">Ingresa desde acá</a></div>
    </section>
    </div>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
  <script src="javascript/show-avatar.js"></script>

</body>

</html>