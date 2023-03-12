#Importo todas las funciones de la librería de tkinter - uso + memoria
from tkinter import *
#Importo la libreria y creo un alias, el nombre que quieras. Para poder trabajar con bbdds
import sqlite3 as lite
#importo modulo del sistema para leer y escribir archivos del disco duro
import sys

#definimos las funciones
def guarda(nombre,telefono,email):
    conexion = lite.connect("agenda.sqlite")
    cursor = conexion.cursor()
    #Petición estática
    #cursor.execute("INSERT INTO contactos VALUES (NULL,'Rita','45124','rita@rita.com');")
    #Hacemos la petición dinámica ("" para entrar y salir de la cadena)
    cursor.execute("INSERT INTO contactos VALUES (NULL,'"+nombre+"','"+telefono+"','"+email+"');")
    conexion.commit()
def lee():
    print("Voy a leer la base de datos")
    
    #En la posición 0 inserta la palabra "hola"
    #titulodevuelve.insert(0, "hola")
    conexion = lite.connect("agenda.sqlite")
    cursor = conexion.cursor()
    cursor.execute("SELECT * FROM contactos;")
    #creo la variable cadena
    cadena = ""
    datos = cursor.fetchall()
    for i in datos:
        #encadene los datos poco a poco sumandolos en la variable cadena
        cadena += str(" nombre:"+i[1]+"\t telefono: "+i[2]+"\t email: "+i[3]+"\n")
    #devuleve la variable encadenada
    titulodevuelve.insert(INSERT,cadena)
        

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

#no escala la imagen, recorta un trozo de imagen
foto = PhotoImage(file="gato2.png",width=100,height=100)

textofoto = Label(marco,image=foto)
textofoto.pack(side=TOP)

#label que te diga lo que tienes que introducir
titulo = Label(marco,text="Introduce un nombre",fg="#45458B",font=("Arial,Verdana,sans-serif",10))
titulo.pack(side=TOP)
#Campo para introducir contenido
camponombre = Entry(marco)
camponombre.pack(side=TOP)

#label que te diga lo que tienes que introducir
titulo = Label(marco,text="Introduce un teléfono",fg="#45458B",font=("Arial,Verdana,sans-serif",10))
titulo.pack(side=TOP)
#Campo para introducir contenido
campotelefono = Entry(marco)
campotelefono.pack(side=TOP)

#label que te diga lo que tienes que introducir
titulo = Label(marco,text="Introduce un email",fg="#45458B",font=("Arial,Verdana,sans-serif",10))
titulo.pack(side=TOP)
#Campo para introducir contenido
campoemail = Entry(marco)
campoemail.pack(side=TOP)

#Creamos un botón con una funcionalidad en command, con lambda le indicamos que le vamos a pasar parametros
#con .get le decimos que nos devuelva el valor
boton = Button(marco, text="Guardar en la base de datos", command=lambda:guarda(camponombre.get(),campotelefono.get(),campoemail.get()))
boton.pack(side=TOP, padx=10, pady=10)


titulo = Label(marco,text="Resultados de la base de datos",fg="#45458B",font=("Arial,Verdana,sans-serif",10))
titulo.pack(side=TOP)

botondame = Button(marco, text="Mostrar registros", command=lambda:lee())
botondame.pack(side=TOP, padx=10, pady=10)
#titulodevuelve lo ponemos con un text para que se puedan leer varias lineas
titulodevuelve = Text(marco, height=30, width=60)
titulodevuelve.pack(side=TOP)



#ejecuto la funcion mainloop
mainloop()
