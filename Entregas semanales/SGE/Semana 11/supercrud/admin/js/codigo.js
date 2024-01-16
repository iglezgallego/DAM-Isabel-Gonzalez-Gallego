//Cuando el documento este preparado
$(document).ready(function(){ 
    //todo lo que tenga select se va a convertir en select2
    //$('select').select2();
     $('body').on('DOMNodeInserted', 'select', function(){
        $(this).select2().on('select2:select', function(e){
            var data = e.params.data;
            console.log(data);
            var valoraenviar = data.id;
            var texto = data.text;
            var tabla = $(this).parent().attr("tabla");
            var columna = $(this).parent().attr("columna");
            var identificador = $(this).parent().attr("identificador");
            //console.log(this)
            //console.log("te cojo el id y es: "+identificador)
            //console.log(identificador);
            console.log("voy a poner el valor "+valoraenviar+" en la tabla "+tabla+", en la columna "+columna+" y en el identificador "+identificador);
            $("#ajax").load("inc/ajaxmodifica.php?valor="+valoraenviar+"&tabla="+tabla+"&columna="+columna+"&identificador="+identificador)
            console.log("el id es: "+identificador)
            $(this).parent().html("<td><b>"+valoraenviar+"</b> - "+texto+"</td>");
        });
    });
    
    console.log("la pagina esta lista");
    
    //cuando haga doble click sobre un td
     $("td").dblclick(function(){
        //console.log("click");
         //Si campoexterno es igual a no
        if($(this).attr("externo") == "no"){
           
            var selector;
            //el elemento se convierte en editable y cuando salga del elemento
            $(this).attr('contenteditable','true').blur(function(){
                selector = $(this);
                console.log("salgo")
                //el contenido ya no sea editable
                selector.attr('contenteditable','false');
                //Creo las variables con los valores para poder trabajar con ajax
                var valoraenviar = selector.text();
                var tabla = selector.attr("tabla");
                var identificador = selector.attr("identificador");
                var columna = selector.attr("columna");
                console.log("voy a poner el valor "+valoraenviar+" en la tabla "+tabla+" en la columna "+columna+" con el identificador "+identificador);
                //en ese elemento ajax voy a usar una función load con los valores que quiero enviar, que se procesa en ajaxmodifica
                $("#ajax").load("inc/ajaxmodifica.php?valor="+valoraenviar+"&tabla="+tabla+"&columna="+columna+"&identificador="+identificador)
                });
            }
            //si el campoexterno es igual a si
            if($(this).attr("externo") == "si"){
                selector = $(this);
                var tabla = selector.attr("tablaexterna");
                var columna = selector.attr("columnaexterna");
                var claveexterna = selector.attr("claveexterna");
                console.log("voy a poner el una cosa en la tabla "+tabla+", en la columna "+columna+" y en el identificador "+claveexterna);
                $(this).load("inc/ajaxvalores.php?tabla="+tabla+"&columna="+columna+"&claveexterna="+claveexterna);
                //$('select').select2();
        }
        })    
})
