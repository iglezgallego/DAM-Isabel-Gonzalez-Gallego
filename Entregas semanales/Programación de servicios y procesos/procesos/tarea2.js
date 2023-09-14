onmessage = function(){
    
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