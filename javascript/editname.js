//Envia formulario a editname.php y actualiza datos
document.getElementById('editNameForm').addEventListener('submit', function(event) {
event.preventDefault();

    var name = document.getElementById('name').value;
    var lastname = document.getElementById('lastname').value;
    const menuNameEdit = document.querySelector('.contenedorNameEditdesplegado');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/editname.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            
            // Actualizar el nombre y apellido
            var newName = name + " " + lastname;
            document.getElementById('nameDetail').innerText = newName;
            menuNameEdit.removeAttribute('class');
            menuNameEdit.setAttribute('class', 'contenedorNameEdit');
            document.getElementById('name').value = '';
            document.getElementById('lastname').value = '';
        } else {
            // Mostrar el mensaje de error
            alert('Error: ' + xhr.statusText);
        }
    };
    xhr.send('fnameEd=' + name + '&lnameEd=' + lastname);
});
