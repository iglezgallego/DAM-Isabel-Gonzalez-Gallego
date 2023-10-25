from PIL import Image
import tkinter as tk
from tkinter import ttk

#ventana para interfaz
raiz = tk.Tk()

#funcion para las dimensiones de la interfaz
raiz.geometry('200x200')

#variable para el contenido del texto en el entry
textoescrito = tk.StringVar()
#variable para el nombre del archivo en el entry
nombrearchivo = tk.StringVar()

#defino la funcion guardar
def guardar():
    #crear una imagen
    img = Image.new('RGBA',(30,30), color = 'black')
    #dame el texto escrito en el entry
    texto = textoescrito.get()
    x = 0
    y = 0
    #ir letra a letra del spring
    for letra in texto:
        print(letra)
        #ord para obtener el codigo ascii de la letra
        #va a poner cada una de las letras del texto en un pixel de la imagen
        img.putpixel((x,y),(ord(letra),0,0,255))
        x = x+1
        #si la x es mayor que 30
        if x == 30:
            #la posicion horizontal vuelve a ser cero
            x = 0
            #y la posicion vertical salta una línea
            y = y + 1
            
    #Al guardar la imagen, el nombre de la imagen coge el entry del nombre del archivo
    img.save(nombrearchivo.get()+'.png')
    

#creo un label con el siguiente texto
etiqueta1 = tk.Label (raiz, text = "Indica el nombre del archivo")
etiqueta1.pack()

#creo una entrada para la respuesta
entrada1 = tk.Entry(raiz, textvariable=nombrearchivo)
entrada1.pack()

#creo otro label con el siguiente texto
etiqueta2 = tk.Label (raiz, text = "Escribe el mensaje")
etiqueta2.pack()

#creo una entrada para la respuesta 
entrada2 = tk.Entry(raiz, textvariable=textoescrito)
entrada2.pack()

boton = tk.Button(raiz,text="Guarda",command=guardar)
boton.pack()

raiz.mainloop()




