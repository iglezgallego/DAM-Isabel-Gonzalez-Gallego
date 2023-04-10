from tkinter import *
import time

marco = Frame(width=300,height=30)
marco.pack(padx=30,pady=30)


lienzo = Canvas()

lienzo.create_rectangle(10,10,200,200, outline="#ff0000", fill="#00ff00")
lienzo.create_oval(50,50,150,150, outline="#ff00ff", fill="#00ffff", width=5)


lienzo.pack(side=TOP)
#while 1 = while true
#entro en un bucle infinito controlado
while 1:
    print("hola")
    lienzo.create_rectangle(10,10,200,200, outline="#ff0000", fill="#00ff00")
    lienzo.create_oval(50,50,150,150, outline="#ff00ff", fill="#00ffff", width=5)

    lienzo.pack(side=TOP)
    time.sleep(1)
