from tkinter import *

marco = Frame(width=300,height=30)
marco.pack(padx=0,pady=0)

#lienzo es una variable que tiene la funcion Canvas de tkinter
lienzo = Canvas()

#el canvas empieza a dibujar en la parte de abajo(empieza en : x,y, se extiende hasta x,y)
#la x empieza en la izquierda y se extiende hacia la derecho y la y empieza arriba y se extiende hacia abajo
#como la x empieza en 25 y se extiende en 25 dibujamos una linea horizontal
##lienzo.create_line(12,25,200,25)

#dibujo una linea diagonal hacia abajo
lienzo.create_line(15,25,200,225)
#linea diagonal paralela discontinua (4 pixeles dibujados, 2 sin dibujar)
lienzo.create_line(15,55,200,270, dash =(4,8))




lienzo.pack(side=TOP)
