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
    <section class="form login">
    <header>TALK +</header>
      <p class="title">Inicia Sesión</p>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text">
          <h1>Correo o Contraseña erroneo!</h1>
        </div>
        <div class="field input">
          <label>Dirección de Correo Electrónico</label>
          <input type="text" name="email" placeholder="Ingresa tu Correo Registrado" required>
        </div>
        <div class="field input">
          <label>Contraseña</label>
          <input type="password" name="password" placeholder="Ingresa tu Contraseña" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Chatear">
        </div>
      </form>
      <div class="link">Aún no te has registrado? <a href="register.php">Regístrate acá</a></div>
    </section>
    </div>
  </div>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>   
</body>
</html>