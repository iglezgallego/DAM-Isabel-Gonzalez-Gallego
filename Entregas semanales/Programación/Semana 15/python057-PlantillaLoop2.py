import tkinter as tk

class Persona(object):
    # * con el puntero le decimos que le pasamos una serie de parametros pero no decimos cuantos
    def __init__(self,canvas, *argumentos, **masargumentos):
        #Preparo para pintar un ovalo
        self.canvas = canvas
        self.id = canvas.create_oval(*argumentos, **masargumentos)
        #defino las velocidades dentro del metodo constructor
        self.vx = 5
        self.vy = 5
    def mover():
        print("Voy a mover")

class Aplicacion(object):
    def __init__(self, master):
        self.master = master
    #Llamo a la librería canvas en el objeto principal para poder llamar a multiples canvas
        self.canvas = tk.Canvas(self.master,width=512,height=512)
        self.canvas.pack()
        #Aqui voy a pintar uno o varios ovalos
        #Pasamos los parametros que necesita el create_oval para que no falle
        self.personas = [
            Persona(self.canvas,50,50,10,10,outline="black",fill="green"),
            Persona(self.canvas,250,250,30,30,outline="red",fill="blue")
                         ]
        self.canvas.pack()
        ##Desde el constructor quiero arrancar una vez el bucle
        self.master.after(1000,self.bucle)
    def bucle(self):
    #Este metodo se va a ejecutar de forma continua

        #El metodo se llama a si mismo
        self.master.after(33,self.bucle)
        

        
root = tk.Tk()
aplicacion = Aplicacion(root)

