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
//------------------------------------------------------------
//VALIDACION DEL FORMULARIO-----------------------------------
$nombre = document.getElementById('nombre');
$apellidos = document.getElementById('apellidos');
$email = document.getElementById('email');
$password = document.getElementById('password');
if(document.querySelector('.alerta-error')){
    showModal($modal);
}
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
//--------------------------------------------------------------