let listOptions = document.querySelector('.opcionesAjustes');
let toggleButton = document.querySelector('#toggleButton');

function showMenu() {
    listOptions.classList.add("menuDesplegado");
}

function hideMenu() {
    listOptions.classList.remove("menuDesplegado");
    listOptions.classList.add("opcionesAjustes");
}

toggleButton.addEventListener('click', () => {
    if (!listOptions.classList.contains('menuDesplegado')) {
        showMenu();

    } else {
        hideMenu();
        
    }
});

const botonBuscarChat = document.querySelector('.botonBuscarChat');
const inputBarra = document.querySelector('#inputBarra');
const headerUsers = document.querySelector('.headerUsers')

botonBuscarChat.addEventListener('click', () => {
  if (inputBarra.getAttribute('id') === 'inputBarraActiva') {
    inputBarra.removeAttribute('id');
    inputBarra.setAttribute('id', 'inputBarra');
    headerUsers.removeAttribute('class');
    headerUsers.setAttribute('class', 'headerUsers');
  } else {
    inputBarra.removeAttribute('id');
    inputBarra.setAttribute('id', 'inputBarraActiva');
    headerUsers.removeAttribute('class');
    headerUsers.setAttribute('class', 'headerUsersActive');
  }
});

inputBarra.onkeyup = ()=>{
  let searchTerm = inputBarra.value;
  if(searchTerm != ""){
    inputBarra.classList.add("active");
  }else{
    inputBarra.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!inputBarra.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

const nameEditBton= document.querySelector('#nameEdit');
const menuNameEdit = document.querySelector('.contenedorNameEdit');

nameEditBton.addEventListener('click', () => {
  if (!listOptions.classList.contains('contenedorNameEdit')) {
    hideMenu();
    menuNameEdit.removeAttribute('class');
    menuNameEdit.setAttribute('class', 'contenedorNameEditdesplegado');
} else {
    menuNameEdit.removeAttribute('class');
    menuNameEdit.setAttribute('class', 'contenedorNameEdit');
}
})

const imageEditBton= document.querySelector('#imageEdit');
const menuImageEdit = document.querySelector('.contenedorImageEdit');

imageEditBton.addEventListener('click', () => {
  if (!listOptions.classList.contains('contenedorImageEdit')) {
    hideMenu();
    menuImageEdit.removeAttribute('class');
    menuImageEdit.setAttribute('class', 'contenedorImageEditdesplegado');
} else {
    menuImageEdit.removeAttribute('class');
    menuImageEdit.setAttribute('class', 'contenedorImageEdit');
}
})


const passEditBton= document.querySelector('#passEdit');
const deleteCuentaBton= document.querySelector('#deleteCuenta');