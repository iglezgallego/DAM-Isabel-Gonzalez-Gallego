import tkinter as tk
import random

class Persona(object):
    # * con el puntero le decimos que le pasamos una serie de parametros pero no decimos cuantos
    def __init__(self,canvas, *argumentos, **masargumentos):
        #Preparo para pintar un ovalo
        self.canvas = canvas
        self.id = canvas.create_oval(*argumentos, **masargumentos)
        #defino las velocidades dentro del metodo constructor
        self.vx = 1
        self.vy = 0
    def mover(self):
        #quiero que los elementos se muevan aleatoriamente
        #creo un bounding box (caja de alcance) coge las coordenadas de un recuadro y las pasa a una tupla
        x1,y1,x2,y2 = self.canvas.bbox(self.id)
        self.vx = random.randint(-1, 1)
        self.vy = random.randint(-1, 1)
        #Las pelotas se muevan aleatoriamente
        #Cuando ejecuto mover, se va a preguntar si la vx es -1(izquiera), 0(quieto) ,1(derecha)
        #y en vy -1(arriba), 0(quieto), 1(abajo)
        self.canvas.move(self.id,self.vx,self.vy)

class Aplicacion(object):
    def __init__(self, master):
        self.master = master
    #Llamo a la librería canvas y lo quiero en el objeto principal para poder llamar a multiples canvas
        self.canvas = tk.Canvas(self.master,width=512,height=512)
        self.canvas.pack()
        #Aqui voy a pintar uno o varios ovalos
        #Pasamos los parametros que necesita el create_oval para que no falle
        self.personas = [
            Persona(self.canvas,50,50,100,100,outline="black",fill="green"),
                         ]
        #Hacer más bolitas sin repetir código
        for i in range (10):
            self.personas.append(Persona(self.canvas,random.randint(0,51),random.randint(0,51),100,100,outline="black",fill="green"))
        self.canvas.pack()
        ##Desde el constructor quiero arrancar una vez el bucle
        self.master.after(1000,self.bucle)
    def bucle(self):
    #Este metodo se va a ejecutar de forma continua
    #cojo de una a una a las personas y las muevo, recorriendo una lista
        for persona in self.personas:
            persona.mover()
        #El metodo se llama a si mismo
        self.master.after(33,self.bucle)
        

        
root = tk.Tk()
aplicacion = Aplicacion(root)

