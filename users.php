<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}

?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
  <div class="barra">
    <section class="users">
      <div class="headerUsers">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img id="profilePicture" src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span id="nameDetail"><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <section class="ajustes">
          <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout"><img src="icons8-cerrar-sesión-96.png" alt=""></a>
          <a id="toggleButton" href="#"> <img class="tuerca" src="icons8-ajustes-128.png" alt=""></a>
          <button class="botonBuscarChat"><img class="iconSearch" src="icons8-lupa-104.png" alt=""></button>  
        </section>
      </header>
      </div>
      <input id="inputBarra" type="text" placeholder="Introduce un nombre...">
      <div class="users-list"></div>
      <section class="ajustes">
      </section>
      <div id="adjustments" class="opcionesAjustes">
         <ul>  
           <li><a id="nameEdit" href="#">Editar Nombre</a></li>
           <li><a id="imageEdit" href="#">Cambiar Foto de Perfil</a></li>
           <li><a id="passEdit" href="#">Cambiar Contraseña</a></li>
           <li ><a id="deleteCuenta" class="alertColor" href="#">Eliminar Cuenta</a></li>
         </ul>
       </div>
    </section>
  </div>


<div class="contenedorNameEdit">
    <form id="editNameForm" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="datosNew">
        <label>Tu nombre</label>
        <input type="text" id="name" placeholder="Nombre" required>
      </div>
      <div class="datosNew">
        <label>Tu apellido</label>
        <input type="text" id="lastname" placeholder="Apellido" required>
      </div>
      <div class="button">
        <input id="aplicarBoton" type="submit" name="submit" value="Aplicar">
      </div>
    </form>
</div>


<div class="contenedorImageEdit">
    <form id="editImageForm" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="datosNew">
        <div div class="field image">
          <label>Nuevo Avatar</label>
          <div class="preview-image">
                  <img id="preview-img" src="" alt="Imagen previa">
          </div>
          <button class="chooseFile">
            <input id="inputImagen" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            Elige un Avatar
          </button>
          <button class="chooseFile" id="enterBton" style="background: #439150;">
            <input id="aplicarBoton" type="submit" name="submit" value="Aplicar">
            Actualizar
          </button>
        </div>
      </div>
    </form>
</div>


<div class="contenedorPasssEdit">
  <form action="#" id="editPassForm" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="datosNew">
        <div class="inputDato">
            <label>Correo</label>
            <input type="text" name="email" placeholder="tucorreo@correo.com" required>
        </div>
        <div class="inputDato">
            <label>Contraseña Antigua</label>
            <input id="passCode"type="password" name="password" placeholder="Ingresa tu contraseña" required>
            <i class="fas fa-eye"></i>
        </div>
        <div class="inputDato">
            <label>Nueva Contraseña</label>
            <input id="passCode"type="password" name="newpassword" placeholder="Ingresa contraseña nueva" required>
            <i class="fas fa-eye"></i>
        </div>
        <div class="inputDato">
            <label>Confirmar Nueva Contraseña</label>
            <input id="passCode"type="password" name="newpasswordconfir" placeholder="Confirma tu nueva contraseña" required>
            <i class="fas fa-eye"></i>
        </div>
        <div class="inputDato">
            <p id="classSecurityQuestion">
              ¿<?php echo $row['security_question'];?>?
            </p>
        </div>
        <div class="inputDato">
            <input type="text" name="security_answer" placeholder="Tu respuesta aquí..." required>
        </div>                
        <button class="chooseFile" id="enterBton" style="background: #439150;">
            <input id="aplicarBoton" type="submit" name="submit" value="Aplicar">
            Actualizar
        </button>
  </form>
</div>
<script>
  //Envia formulario a changepass.php para actualizar la contraseña del usuario
  document.getElementById('editPassForm').addEventListener('submit', function(event) {
  event.preventDefault();

    var formData = new FormData(event.target);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/changepass.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle successful response
            console.log(xhr.responseText);
        } else {
            // Handle error
            console.log('Error: ' + xhr.statusText);
        }
    };
    xhr.send(formData);
});
</script>
  <script src="javascript/editimage.js?v=" defer></script>
  <script src="javascript/editname.js?v=" defer></script>
  <script src="javascript/users.js"></script>
  <script src="javascript/menufunciones.js?v=1.2"></script>
  <script src="javascript/show-avatar.js"></script>
  <script src="javascript/pass-show-hide-users.js?v=1.2"></script>

</body>

</html>