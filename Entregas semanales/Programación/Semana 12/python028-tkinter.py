#De la libreria tkinter damelo todo
from tkinter import *

#Crear una ventana para el programa
f = Frame(width=600, height=600)
f.pack(padx=30, pady=30)

#Creamos un label en el frame
titulo = Label(f, text = "Hola Isa")
titulo.pack(side=TOP)
