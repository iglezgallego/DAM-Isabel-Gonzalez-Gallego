//recojo los datos le paso desde index7
onmessage = function(datos){
    //console.log(datos)
    
        var destino = 0;
        //recorrro los pixeles uno a uno
        for(var i=0;i<datos.data.px.data.length-8;i+=4){
            //en princinpio supongo que no hay un borde en el pixel que estoy registrando
            var borde = false;
            //para cada uno de los pixeles compruebo si hay mucha diferencia de color o no 
            //pixel de arriba izquierda
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i-(datos.data.mianchurabucket*4)-4])>datos.data.miumbral){borde = true;}
            //pixel de arriba 
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i-(datos.data.mianchurabucket*4)])>datos.data.miumbral){borde = true;}
            //pixel de arriba a la derecha
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i-(datos.data.mianchurabucket*4)+4])>datos.data.miumbral){borde = true;}
            //pixel de la izquierda
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i-4])>datos.data.miumbral){borde = true;}
            //pixel de la derecha
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i+4])>datos.data.miumbral){borde = true;}
            //pixel de abajo a la izquierda
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i+(datos.data.mianchurabucket*4)-4])>datos.data.miumbral){borde = true;}
            //pixel de abajo
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i+(datos.data.mianchurabucket*4)])>datos.data.miumbral){borde = true;}
            //pixel de abajo a la derecha
            if(Math.abs(datos.data.px.data[i]-datos.data.px.data[i+(datos.data.mianchurabucket*4)+4])>datos.data.miumbral){borde = true;}

            //en el caso de que haya un borde pinta de negro
            if(borde == true){
                datos.data.pxdst.data[i] = 0;
                datos.data.pxdst.data[i+1] = 0;
                datos.data.pxdst.data[i+2] = 0;
                datos.data.pxdst.data[i+3] = 255;
            }else{
                datos.data.pxdst.data[i] = 255;
                datos.data.pxdst.data[i+1] = 255;
                datos.data.pxdst.data[i+2] = 255;
                datos.data.pxdst.data[i+3] = 255;
            }
        } 
        json = {mix:datos.data.mix,miy:datos.data.miy,resultado:datos.data.pxdst,miidworker:datos.data.idworker}
        postMessage(json)
}
