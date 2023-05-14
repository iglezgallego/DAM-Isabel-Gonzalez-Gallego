//SCRIPT PARA EFECTO DESPLEGABLE DE LOS TEMAS Y DE LOS CALENDARIOS
$(document).ready(function(){
    $("span").click(function(){
        var idpadre = '#';
        idpadre += $(this).attr('id');
        console.log(idpadre)
        $(idpadre).children("p").toggle();
    });
    
    //SCRIPT PARA LOS BOTONES CHECK
    //idcheck es la posicion del array y checked es si esta marcado o no
    $(".controlcheck").on('change', function(){
        var idcheck = $(this).attr('idcheck');
        var estado = $(this).prop('checked') ? 1 : 0;
        //guardo los valores idcheck para identificar a que reto pertenece y el valor como checked que puede ser 0 o 1
        console.log(idcheck);
        console.log(estado);
        //uso ajax para realizar la acción de manera asíncrona
        $.ajax({
            url: 'update_ajax.php',
            type: 'POST',
            data: { 
                checkid: idcheck,
                status: estado
            },
            success: function(response) {
                // código a ejecutar si la petición es exitosa
                console.log(response);
            },
            error: function(xhr, status, error) {
                // código a ejecutar si hay algún error en la petición
                console.log(error);
            }
        });
        
    })
})