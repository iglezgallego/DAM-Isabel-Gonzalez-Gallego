//creo variables para las palabras de una peticion completa
var peticion = "SELECT "
var columnas =" * "
var desde = " FROM "
var tabla = ""
var condiciones = " "
var limite = "LIMIT 10000000"
var ordenar = " "

$(document).ready(function(){
    //Para que aparezcan las opciones como un acordeon
    $("#formulario").accordion({
        heightStyle: "content"
    });
    //SELECCIONAR LA TABLA
    //cuando cargue seleccionatablas carga cargatablas.php
    $("#seleccionatabla").load("php/cargatablas.php");
    //llamo a la funcion cada vez que haga un cambio
    resultadostabla()
    //cuando selecionatabla cambie
    $("#seleccionatabla").change(function(){
        //el valor de tabla cambie
        tabla = $(this).val()
        //llamo a la funcion cada vez que haga un cambio
        resultadostabla()
        
        //SELECCIONAR LOS CAMPOS DE LAS TABLAS
        //cuando cargue seleccionacampos carga cargacampos donde la tabla es igual a la tabla seleccionada
        $("#seleccionacampos").load("php/cargacampos.php?tabla="+tabla);
        $("#seleccionaordenar").load("php/cargaordenar.php?tabla="+tabla);
    })
    $("#seleccionaordenar").change(function(){
        //Creo el array llamado seleccionado para almacenar los valores seleccionados
        seleccionado = []
        // Para cada uno de los campos que podamos seleccionar
        $('input[name="seleccionaordenar"]').each(function(){
            //si estan seleccionados
            if ($(this).is(":checked")){
                //agregamos el valor del campo al final del array seleccionado
                seleccionado.push($(this).val());
            }
        })
        
        //Creo la variable ordenar para almacenar las columnas seleccionadas en forma de cadena
        ordenar = " ORDER BY ";
        //Itero a través de los elementos de seleccionado para construir una cadena de columnas
        for(var i = 0; i<seleccionado.length; i++){
             //añade esto palabra al string ordenar para la peticion SQL
            ordenar += seleccionado[i]+","
        }
        //Elimina la última coma de la cadena ordenar para formatearla adecuadamente
        ordenar = ordenar.slice(0, -1);
        ordenar += " ";
        //console.log(ordenar);
        //llamo a la funcion resultadostabla cada vez que se produce un cambio
        resultadostabla()
    })
        
    // Cuando el elemento seleccionacampos cambie con una selección en el formulario
    $("#seleccionacampos").change(function(){
        //Creo el array llamado seleccionado para almacenar los valores seleccionados
        seleccionado = []
        // Para cada uno de los campos que podamos seleccionar
        $('input[name="seleccionacampos"]').each(function(){
            //si estan seleccionados
            if ($(this).is(":checked")){
                //agregamos el valor del campo al final del array seleccionado
                seleccionado.push($(this).val());
            }
        })
        console.table(seleccionado)
        
        //Creo la variable columnas para almacenar las columnas seleccionadas en forma de cadena
        columnas = "";
        //Itero a través de los elementos de seleccionado para construir una cadena de columnas
        for(var i = 0; i<seleccionado.length; i++){
             //Agrega cada valor al final de columnas seguido de una coma
            columnas += seleccionado[i]+" ";
            //si el input de alias de los campos seleccionados no es igual a nada
            if($("input[alias='"+seleccionado[i]+"']").val() != ""){
                //añade esto palabra al string columnas para la peticion SQL
                columnas += "AS '"+$("input[alias='"+seleccionado[i]+"']").val()+"' "
            }
                columnas += ","
        }
        //Elimina la última coma de la cadena columnas para formatearla adecuadamente
        columnas = columnas.slice(0, -1);
        //llamo a la funcion resultadostabla cada vez que se produce un cambio
        resultadostabla()
        
        //Introduzco las condiciones
        $("#seleccionacondiciones").html("")
        //Itero a través de los elementos de seleccionado para construir una cadena de columnas
        for(var i = 0; i<seleccionado.length; i++){
            //para cada elemento que tenga el id seleccionacondiciones añado un input
             $("#seleccionacondiciones").append('<tr class="condicion"><td>'+seleccionado[i]+'=</td><td> <input type="text" name="" class="nuevacondicion" campo="'+seleccionado[i]+'"></td></tr>');
        }
        //Introduzco los alias
        $("#seleccionaalias").html("")
        //Itero a través de los elementos de seleccionado para construir una cadena de columnas
        for(var i = 0; i<seleccionado.length; i++){
            //para cada elemento que tenga el id seleccionacondiciones añado un input
             $("#seleccionaalias").append('<tr class="alias"><td>'+seleccionado[i]+'=</td><td> <input type="text" name="" class="nuevoalias" alias = "'+seleccionado[i]+'" campo="'+seleccionado[i]+'"></td></tr>');
        }
    })
    //cuando en class nuevacondicion escribamos algo
    //$(".nuevacondicion").change(function(){
    $(document).on("keydown",".nuevacondicion",function(){
        //console.log("hola")
        condiciones = " WHERE "
        //para cada uno de ellos
        $(".nuevacondicion").each(function(){
            //si el valor no es vacío
            if($(this).val() != ""){
                //condiciones será
                condiciones += $(this).attr('campo')+" LIKE '%"+$(this).val()+"%' &"
            }
        })
        //Elimina la última coma de la cadena columnas para formatearla adecuadamente
        condiciones = condiciones.slice(0, -1);
        //Llamo al metodo resultadostabla
        resultadostabla()
    })
    
    //cuando en class nuevoalias escribamos algo
    $(document).on("keydown",".nuevoalias",function(){
        //Creo el array llamado seleccionado para almacenar los valores seleccionados
        seleccionado = []
        // Para cada uno de los campos que podamos seleccionar
        $('input[name="seleccionacampos"]').each(function(){
            //si estan seleccionados
            if ($(this).is(":checked")){
                //agregamos el valor del campo al final del array seleccionado
                seleccionado.push($(this).val());
            }
        })
        //Introduzco los alias
        //Creo la variable columnas para almacenar las columnas seleccionadas en forma de cadena
        columnas = "";
        //Itero a través de los elementos de seleccionado para construir una cadena de columnas
        for(var i = 0; i<seleccionado.length; i++){
             //Agrega cada valor al final de columnas seguido de una coma
            columnas += seleccionado[i]+" ";
            //si el input de alias de los campos seleccionados no es igual a nada
            if($("input[alias='"+seleccionado[i]+"']").val() != ""){
                //añade esto palabra al string columnas para la peticion SQL
                columnas += "AS '"+$("input[alias='"+seleccionado[i]+"']").val()+"' "
            }
                columnas += ","
        }
        //Elimina la última coma de la cadena columnas para formatearla adecuadamente
        columnas = columnas.slice(0, -1);
        //
        
        //llamo a la funcion resultadostabla cada vez que se produce un cambio
        resultadostabla()
    })
    
    //cuando id limite cambie
    $("#limite").change(function(){
        //limite será
        limite = " LIMIT "+$(this).val()+" ";
        resultadostabla()
    })
})

//defino la función resultadostabla
function resultadostabla(){
    sentencia = peticion+columnas+desde+tabla+condiciones+ordenar+limite
    //en sql muestra la peticion por pantalla
    $("#sql").text(sentencia)
    //en resultados tabla va a cargar el archivo resultadostabla.php y le paso la cadena codificada para asegurar su lectura en la URL
    $("#resultadostabla").load("php/resultadostabla.php?sql="+encodeURI(sentencia))
}