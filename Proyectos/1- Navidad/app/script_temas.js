//SCRIPT PARA EFECTO DESPLEGABLE DE LOS TEMAS Y DE LOS CALENDARIOS
$(document).ready(function(){
    $("span").click(function(){
        var idpadre = '#';
        idpadre += $(this).attr('id');
        console.log(idpadre)
        $(idpadre).children("p").toggle();
    })
})