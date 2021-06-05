$overlay = document.getElementById('overlay');
$registro = document.getElementById('registro');
$inicio = document.getElementById('inicio');
$modal = document.getElementById('modal');
$modal_login = document.getElementById('modal-login');
$exit = document.getElementById('exit');
$exit_login = document.getElementById('exit-login');
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