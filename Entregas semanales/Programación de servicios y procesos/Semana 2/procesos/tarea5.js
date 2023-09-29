//recojo los datos le paso desde index5
onmessage = function(datos){
    
    console.log(datos)
    //imprimo el elemento edad del json
    console.log("tu edad es: " + datos.data.edad)
    //imprimo el elemento nombre del json
    console.log("tu nombre es: " + datos.data.nombre)
    //Calculo
    console.log("vamos con un calculo")
            //CALCULO 1
            //console.log("vamos con el calculo 1")
            var numero = 0.0000423343;
            var iteraciones = 10000000000;
            for(var i = 0;i<iteraciones;i++){
                numero = numero * 1.000000000005435;
            }
    
    //el worker le envía el resultado al hilo principal con postmessage
    postMessage(numero);
}