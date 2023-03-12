#Importo todas las funciones de la librería de tkinter - uso + memoria
from tkinter import *

#Creo una variable que es un Frame(lo identifica la libreria)
#Esta variable es la ventana de la interfaz de usuario con sus dimensiones
marco = Frame(width=300,height=300)

#establezco el padding horizontal x y el vertical y
marco.pack(padx=0,pady=0)

#fg para cambiar el color de la letra
titulo = Label(marco,text="Programa agenda v0.1",fg="#45458B",font=("Arial,Verdana,sans-serif",16))
titulo.pack(side=TOP)

autor = Label(marco,text="Isabel González-Gallego", fg="grey",font=("Arial,Verdana,sans-serif",12))
autor.pack(side=TOP)

#al establecer la altura y la anchura no escala la imagen, recorta un trozo de la misma
foto = PhotoImage(file="gato2.png",width=100,height=100)

textofoto = Label(marco,image=foto)
textofoto.pack(side=TOP)

#ejecuto la funcion mainloop
mainloop()
