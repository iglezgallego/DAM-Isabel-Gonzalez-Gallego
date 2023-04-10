import threading
import time
import math

def trabajador(numero):
    ##print("hola soy un trabajador numero %s \n" % numero)
    #no se ejecuta secuencialmente

    #para darle caña al procesador
    minumero = math.pi/(numero+1)
    time.sleep(0.1)
    trabajador(numero)
    

tareas = []

#400 tareas de procesamiento independientes que el SSOO reparta las tareas entre los hilos de procesamiento del hardware y los ha ejecutado de forma paralela
for i in range(400):
    #De la librería threading cojo una instancia de un objeto de tipo Thread
    t = threading.Thread(target = trabajador,args=(i,))
    tareas.append(t)
    t.start()
