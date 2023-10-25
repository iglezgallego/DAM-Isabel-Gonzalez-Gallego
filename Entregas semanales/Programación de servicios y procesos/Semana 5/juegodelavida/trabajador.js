//recibo los datos enviados del bloque de 3x3 pixeles
onmessage = function(json){
    //la variable datos lleva los datos del json
    datos = json.data.datos
    //la celula del centro
    centro = datos.data[16]
    var viva;
    var celulasvivas = 0;
        //miramos cada una de las celulas
        //arriba izquierda
        if(datos.data[0] == 0){celulasvivas++;}
        //arriba
        if(datos.data[4] == 0){celulasvivas++;}
        //arriba derecha
        if(datos.data[8] == 0){celulasvivas++;}
        //izquierda
        if(datos.data[12] == 0){celulasvivas++;}
        //derecha
        if(datos.data[20] == 0){celulasvivas++;}
        //abajo izquierda
        if(datos.data[24] == 0){celulasvivas++;}
        //abajo
        if(datos.data[28] == 0){celulasvivas++;}
        //abajo derecha
        if(datos.data[32] == 0){celulasvivas++;}
        
        //si la celula esta muerta
        if(centro == 255){
            //si celulasvivas son 3 en ese caso
            if(celulasvivas == 3){
                //esta viva
                viva = true;
            //en caso contrario
            }else{
                //esta muerta
                viva = false;
            } 
        }
    
        //si la celula esta viva
        if(centro == 0){
            //si la celula es igual a tres o a dos
            if(celulasvivas == 3 || celulasvivas == 2){
                //esta viva
                viva = true;
            //en caso contrario
            }else{
                //esta muerta
                viva = false;
            }
        }
    //creo el json con los datos que hay que devolver
    var jsondevuelta = {"datos":viva, "x":json.data.x, "y":json.data.y}
    //envio el mensaje con el json al archivo principal
    postMessage(jsondevuelta);
}