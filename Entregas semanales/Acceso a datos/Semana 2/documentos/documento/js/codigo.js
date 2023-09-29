        //cuando el documento este preparado
        $(document).ready(function(){
                //Para cambiar el tipo de encabezado, cuando seleccione el elemento tipotexto que quiera
                $("#tipotexto").change(function(){
                    //coge el valor y añadelo a continuación como etiqueta html. ej <h2> h2 </h2>
                    $("#pagina").append("<"+$(this).val()+">"+$(this).val()+"</"+$(this).val()+">")
                })
                //Para cambiar el tipo de fuente
                $("#selectfont").change(function(){
                    $("#pagina").append("<span style='font-family:"+$(this).val()+"'>"+$(this).val()+"</span>")
                })
                //Para cambiar el tamaño de la fuente
                $("#fontsize").change(function(){
                    $("#pagina").append("<span style='font-size:"+$(this).val()+"px'>"+$(this).val()+"</span>")
                })
                //Para cambiar a negrita, cursiva o subrayado
                $("#bold").click(function(){
                    $("#pagina").append("<span style='font-weight:bold'>Negrita</span>")
                })
                $("#cursive").click(function(){
                    $("#pagina").append("<span style='font-style:italic'>Cursiva</span>")
                })
                $("#underline").click(function(){
                    $("#pagina").append("<span style='text-decoration:underline'>Subrayado</span>")
                })
                //Para cambiar el color de la letra
                $("#fontcolor").change(function(){
                    $("#pagina").append("<span style='color:"+$(this).val()+"'>"+$(this).val()+"</span>")
                })
                
                //Cuando le de al boton de guardar
                $("#guardar").click(function(){
                    //SOLICITUD AJAX para comunicarse con un servidor sin tener que recargar toda la pagina
                    $.ajax({
                        //aqui pongo la url a la que se envían los datos
                        url: "guarda.php" ,
                        //aqui especifico los datos que quiero enviar
                        data: {datos: $("#pagina").html(), nombredocumento:$("#documentname").val()},
                        //aqui se especificando que la solicitud es tipo POST
                        type: "POST",
                        //aqui se define una función que se ejecutará cuando la solicitud AJAX sea exitosa. El resultado de la solicitud se pasa como un parámetro llamado "result"
                        success: function(result){
                        //en este caso, la función simplemente imprime un mensaje en la consola del navegador que dice "ok" seguido del resultado
                        console.log("ok"+result)
                        }
                    });
                })
            })