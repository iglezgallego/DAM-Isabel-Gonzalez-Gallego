import tkinter as tk

#object quiere decir que voy a instanciar algo
class Persona(object):
##    pass
    def saluda():
        print("yo soy una persona")
#uso pass cuando no quiero escribir código debajo de una clase y no me de error(sirve tambien para las estructuras de control)
class Aplicacion(object):
    def __init__(self, master):
        self.master = master
    #El metodo constructor se va a ejecutar una sola vez
        print("este es el método constructor")
        ##Desde el constructor quiero arrancar una vez el bucle
        self.master.after(1000,self.bucle)
        ##.after hace un timeout, despues de un segundo ejecuta el bucle
    def bucle(self):
    #Este metodo se va a ejecutar de forma continua
        print("El programa ha arrancado y empezará a dar vueltas")
        #yo hago cosas
        #...y esas cosas tarndan 100 milisegundos en hacerse
        #yo hago cosas
        self.master.after(1000,self.bucle)
        #Hago una función que se llama a sí misma para entrar en un bucle infinito controlado

        

#A aplicación le cargamos la libreria tk para poder utilizarla dentro de la clase, es decir, le decimos que solo exista dentro de la clase
#Es una forma de hacer que algunos elementos tengan algo similar al estatus de privado
#Carga la librería de tkinter
root = tk.Tk()
#root es raiz e indica que el programa arranca a partir de la raíz
aplicacion = Aplicacion(root)

