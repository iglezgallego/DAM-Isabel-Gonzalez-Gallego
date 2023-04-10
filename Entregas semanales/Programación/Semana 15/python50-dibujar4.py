from tkinter import *

marco = Frame(width=300,height=30)
marco.pack(padx=30,pady=30)

#lienzo es una variable que tiene la funcion Canvas de tkinter
lienzo = Canvas()
#outline es la linea, fill es el relleno, width es la anchura del trazo
lienzo.create_rectangle(10,10,200,200, outline="#ff0000", fill="#00ff00")

##radios x y iguales es un circulo, radios diferentes ovalo
##circulo
lienzo.create_oval(50,50,150,150, outline="#ff00ff", fill="#00ffff", width=5)
##ovalo
##lienzo.create_oval(50,50,200,100, outline="#0000ff", fill="#ffffff")

lienzo.pack(side=TOP)
