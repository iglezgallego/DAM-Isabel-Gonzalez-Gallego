//creo variables para las palabras de una peticion completa
var peticion = "SELECT "
var columnas =" * "
var desde = " FROM "
var tabla = ""
$(document).ready(function(){
    
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
        $("#seleccionacampos").load("php/cargacampos.php?tabla="+tabla)
    })
    //// Cuando el elemento seleccionacampos cambie con una selección en el formulario
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
            columnas += seleccionado[i]+",";
        }
        //Elimina la última coma de la cadena columnas para formatearla adecuadamente
        columnas = columnas.slice(0, -1);
        //llamo a la funcion resultadostabla cada vez que se produce  un cambio
        resultadostabla()
    })
})

//defino la función resultadostabla
function resultadostabla(){
    //en sql muestra la peticion por pantalla
    $("#sql").text(peticion+columnas+desde+tabla)
    //en resultados tabla va a cargar el archivo resultadostabla.php y le paso la cadena codificada para asegurar su lectura en la URL
    $("#resultadostabla").load("php/resultadostabla.php?sql="+encodeURI(peticion+columnas+desde+tabla))
}