$overlay = document.getElementById('overlay');
$registro = document.getElementById('registro');
$inicio = document.getElementById('inicio');
$modal = document.getElementById('modal');
$modal_login = document.getElementById('modal-login');
$exit = document.getElementById('exit');
$exit_login = document.getElementById('exit-login');
//MANEJO DEL MODAL-------------------------------------------
$registro.addEventListener('click',()=>{
    showModal($modal);
});
$inicio.addEventListener('click',()=>{
    showModal($modal_login);
});
$exit.addEventListener('click',()=>{
    hideModal($modal);
})
$exit_login.addEventListener('click',()=>{
    hideModal($modal_login);
});
function showModal($modal){
    $overlay.classList.add('active');
    $modal.style.animation = 'modalIn .5s ease-out forwards';
}
function hideModal($modal){
    $overlay.classList.remove('active');
    $modal.style.animation = 'modalOut .5s ease-out forwards';
}
if(document.querySelector('.alerta.error')){
    showModal($modal);
}
if(document.getElementById('El Correo no es valido') || document.getElementById('El Password no es valido') || document.getElementById('No se pudo validar el usuario')){
    showModal($modal_login);
}
//------------------------------------------------------------
//VALIDACION DEL FORMULARIO-----------------------------------
$nombre = document.getElementById('nombre');
$apellidos = document.getElementById('apellidos');
$email = document.getElementById('email');
$password = document.getElementById('password');
$correo_login = document.getElementById('correo-login');
$pass_login = document.getElementById('pass-login');
if(document.getElementById('Nombre no valido')){
    $nombre.style.border="1px solid red";
}
if(document.getElementById('Apellidos no validos')){
    $apellidos.style.border="1px solid red";
}
if(document.getElementById('Email no valido')){
    $email.style.border="1px solid red";
}
if(document.getElementById('Password no valido')){
    $password.style.border="1px solid red";
}
//PARA EL LOGIN
if(document.getElementById('El Correo no es valido')){
    $correo_login.style.border="1px solid red";
}
if(document.getElementById('El Password no es valido')){
    $pass_login.style.border="1px solid red";
}
if(document.getElementById('No se pudo validar el usuario')){
    $pass_login.style.border="1px solid red";
}
