//Aqui vemos lo que hace el worker cuando recibe el mensaje
//Cuando el worker recibe recibe el mensaje, se activa la funcion onmessage
onmessage = function(){
//solo se envía un postmessage cuando se recive un onmessage
    
    //dentro de esta función el worker realiza los siguientes cálculos complejos
    console.log("vamos con el calculo 1")
            var numero = 0.0000423343;
            var iteraciones = 100000000;
            for(var i = 0;i<iteraciones;i++){
                //para realizar muchas operaciones básicas pero complejas
                numero = numero * 1.000000000005435;
            }
    
    //Tras realizar los calculos, el worker le envía un mensaje de vuelta al hilo principal usando postmessage, el cual tiene el resultado del calculo
    postMessage(numero);
}