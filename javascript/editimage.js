  //Envia formulario a editImage.php y actualiza Avatar
  document.getElementById('editImageForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    const menuImageEdit = document.querySelector('.contenedorImageEditdesplegado');
  
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'php/editImage.php');
  xhr.send(formData);
  
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Manejar la respuesta del servidor
      const response = xhr.responseText;
      menuImageEdit.removeAttribute('class');
      menuImageEdit.setAttribute('class', 'contenedorImageEdit');
      document.getElementById('inputImagen').value = '';
      console.log(response);
  
      // Actualizar la imagen de perfil en la página
      document.getElementById('profilePicture').src = response;
    } else {
      console.log('Error: ' + xhr.status);
    }
  }});