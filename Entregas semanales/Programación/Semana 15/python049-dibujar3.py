from tkinter import *

marco = Frame(width=300,height=30)
marco.pack(padx=30,pady=30)

#lienzo es una variable que tiene la funcion Canvas de tkinter
lienzo = Canvas()

#dibujo un corazon a partir del archivo html canvas, ya que podemos aprovechar las coordenadas
lienzo.create_line(21.810814, 33.956957,31.997901, 29.516432,38.528085, 34.348766,44.927665, 29.647036,55.637166, 33.565144,57.988031, 44.013438,47.409135, 54.331128,38.789293, 61.775539,28.863412, 54.331129,19.721155, 44.405251)




lienzo.pack(side=TOP)
