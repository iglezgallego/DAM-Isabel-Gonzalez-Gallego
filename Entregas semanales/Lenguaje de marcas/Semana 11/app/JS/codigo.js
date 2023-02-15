    //Cuando el documento este preparado
    $(document).ready(function(){
        //Cuando pase el raton por encima del articulo quiero que se haga grande
        $("section article").hover(function(){
            $(this).addClass("aumentado")
        })
        
        //Cuando pase el ratón fuera del artículo quiero que se haga pequeño otra vez
        $("section article").mouseout(function(){
            $(this).removeClass("aumentado")
        })
        
        //Cuando haga click en el botón, quiero que la tira actual avance una casilla
        $(".anterior").click(function(){
            var midesfase = 0
            $(this).parent().parent().find(".ribbon").each(function(){
                midesfase = $(this).css("left")
            })
            midesfase = Math.round ((midesfase.replace("px","")*1)/100)*100                         //Cuando te encuentres con .px reemplazalo por nada
            midesfase -= 200;                                                                       //Resta -200 al atributo left (que es 0)
            console.log(midesfase)      
            
                $(this).parent().parent().find(".ribbon").each(function(){
                    $(this).css("left", (midesfase)+"px")
            })
            
        })
        
        //Cuando haga click en el botón posterior, quiero que la tira actual retroceda una casilla
        $(".posterior").click(function(){
             var midesfase = 0
            $(this).parent().parent().find(".ribbon").each(function(){
                midesfase = $(this).css("left")
            })
            midesfase = Math.round ((midesfase.replace("px","")*1)/100)*100                      //Cuando te encuentres con .px reemplazalo por nada, para que                                                                                        la cadena de caracteres se convierta en numero.
            midesfase += 200;                                                                    //Sumar +200 al atributo left (que es 0)
            console.log(midesfase)
            
                $(this).parent().parent().find(".ribbon").each(function(){
                    $(this).css("left", (midesfase)+"px")
            })
        })
        
        //Cuando haga click con el raton en un nuevo articulo:
        $("article").click(function(){
            //A los detalles les quita la clase abierto
            $(this).parent().parent().next().removeClass("abierto")
            $(this).parent().parent().next().removeClass("muyabierto")

            var este = $(this)                                                                    //Creamos la variable este para poder introducir el this en                                                                                            el timeout
            
            //Dentro de un segundo y medio, que es = a 1500, carga los nuevos detalles
            setTimeout(function(){
                
                este.parent().parent().next().find("h2").text(titulo)
                este.parent().parent().next().find("h3").text(subtitulo)
                este.parent().parent().next().find("p").text(descripcion)
                este.parent().parent().next().find("img").attr("src",imagen)
                este.parent().parent().next().addClass("abierto")
                este.parent().parent().next().find(".infocurso").text("Aquí voy a poner la info del curso")
                
            },1500)
            
            //Coge los datos del articulo: titulo, descripcion, texto e imagen en el que he hecho click
                var titulo = ""
                $(this).find("h3").each(function(){
                    titulo = $(this).text()
                })
                var subtitulo = ""
                $(this).find("h4").each(function(){
                    subtitulo = $(this).text()
                })
                var descripcion = ""
                $(this).find("p").each(function(){
                    descripcion = $(this).text()
                })
            
                var id = ""
                $(this).find(".identificador").each(function(){
                    id = $(this).attr("identificador")
                    console.log("Que sepas que el identificador es: "+id)
                })
            
                var imagen = ""
                $(this).find("img").each(function(){
                    imagen = $(this).attr("src")
                })
        })
        
        //Cuando haga click en el botón de mas informacion, haz el bloque mas grande todavia
        $(".masinfo").click(function(){
            $(this).parent().addClass("muyabierto")
        })
        
})