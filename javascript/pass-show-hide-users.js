const pswrdField = document.querySelector(".contenedorPasssEdit .datosNew .inputDato #passCode"),
toggleIcon = document.querySelector(".contenedorPasssEdit .datosNew .inputDato i");

toggleIcon.onclick = () =>{
  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
}