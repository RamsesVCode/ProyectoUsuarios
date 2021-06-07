//--------------------------------------------------------------
//PARA LA BUSQUEDA
function buscar(input){
    // $buscar = document.getElementById('buscar').value;
    let buscar = input.value;
    $contenedor = document.getElementById('section-container');
    let ajaxHtml = new XMLHttpRequest();
    ajaxHtml.onreadystatechange = function(){
        if(ajaxHtml.readyState==4 && ajaxHtml.status==200){
            $contenedor.innerHTML = ajaxHtml.responseText;
        }
    }
    ajaxHtml.open("GET","busqueda.php?buscar="+buscar,true);
    ajaxHtml.send();
}