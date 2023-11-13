
import tkinter as tk                                                #Importo la librería de interfaces de usuario
from tkinter import ttk                                             #Importo la nueva librería ttk
import sqlite3 as bd                                                #Importo la libreria de sqlite
from tkinter.colorchooser import askcolor                           #Importo el selector de color
import time

##CLASES DEL PROGRAMA
class Nota:                                                                 #Declaramos una primera clase
    def __init__(self,texto,color,fecha):                                   #Este es el método constructor
        self.texto = texto                                                  #Creo una propiedad texto
        self.color = color                                                  #Creo una propiedad color
        self.fecha = fecha                                                  #Creo una propiedad fecha



##CONEXIÓN INICIAL CON LA BASE DE DATOS
conexion = bd.connect("notas.sqlite")                               #Indico el nombre de la base de datos
cursor = conexion.cursor()                                          #Creo un cursor
#Sobre el cursor ejecuto una petición para crear una tabla en la base de datos en el caso de que no exista anteriormente
cursor.execute("""                                                          
    CREATE TABLE IF NOT EXISTS 'notas'(
        'id' INTEGER,
        'texto' TEXT,
        'color' TEXT,
        'fecha' TEXT,
        PRIMARY KEY('id' AUTOINCREMENT)
    );
""")
#Sobre el cursor ejecuto una peticion para crear una tabla de usuarios en caso de que no exista
cursor.execute("""                                                          
    CREATE TABLE IF NOT EXISTS 'usuarios'(
        'id' INTEGER,
        'usuario' TEXT,
        'contrasena' TEXT,
        'email' TEXT,
        PRIMARY KEY('id' AUTOINCREMENT)
    );
""")

##DECLARO FUNCIONES PARA EL PROGRAMA

def iniciasesion():                                                 #Función de inicio de sesión
    print("Vamos a iniciar sesión")                                 #Imprime un mensaje en pantalla
    print("El nombre del usuario es:"+varusuario.get())             #Imprime el usuario introducido por pantalla
    print("La contraseña del usuario es:"+varcontrasena.get())      #Imprime la contraseña introducida por pantalla
    print("El email del usuario es:"+varemail.get())                #Imprime el email introducido por pantalla
    #Comprobar si existe un usuario en la bbdd
    cursor = conexion.cursor()                                      #Creo un cursor
    cursor.execute('SELECT * FROM usuarios')                        #Ejecuto una petición de seleccionar ususarios
    datos = cursor.fetchall()                                       #Cargo los datos
    numerousuarios = 0                                              #Creo una variable contador        
    for i in datos:                                                 #Para cada uno de los registros devueltos
        numerousuarios = numerousuarios + 1                         #Le sumo un valor al contador
    if(numerousuarios == 0):                                        #Si el contador es 0, si no hay usarios
        print("Actualmente no hay ningun usuario en la base de datos")
        #Inserto usuario contraseña email en la base de datos
        cursor.execute("INSERT INTO usuarios VALUES(NULL,'"+varusuario.get()+"','"+varcontrasena.get()+"','"+varemail.get()+"');")    
        conexion.commit()                                           #Ejecuto la inserccion
    else:                                                           #En el caso de que haya usarios
        print("Existe un usuario en la base de datos")
        cursor.execute('''                     
            SELECT * FROM usuarios
            WHERE
            usuario = "'''+varusuario.get()+'''"
            AND contrasena = "'''+varcontrasena.get()+'''"
            AND email = "'''+varemail.get()+'''"
            ''')                                                    #Realizo una consulta a la bbdd
        existe = False                                              #Le doy un valor false inicial a existe
        existe = True                                               #Fuerzo el valor de existe para no tener que validar durante el desarrollo
        datos = cursor.fetchall()                                   #Cargo los datos
        for i in datos:                                             #Para cada uno de los registros devueltos
            existe = True                                           #Actualizo el valor de existe
        if existe == True:                                          #Si existe un usuario con ese nombre
            print("El usuario que has introducido SI existe")
            marco.destroy()                                          #Elimino la ventana inicial y me quedo con la segunda
            marco2 = ttk.Frame(raiz)                                #Creo un nuevo marco
            marco2.pack()                                           #Empaqueto el marco
            
            iconoaplicacion = tk.PhotoImage(file="icono2.png")      #Cargo una imagen
            etiquetaicono = ttk.Label(                              #Muestro la imagen en el label
                marco2,
                text = "Notas v0.01",
                image = iconoaplicacion,
                compound=tk.TOP,
                font=("Arial", 14)
                )
            etiquetaicono.image = iconoaplicacion                   #Especifico de nuevo la imagen
            etiquetaicono.pack()                                    #Empaqueto la imagen
            botonnuevanota = ttk.Button(marco2,text="Nueva Nota", command=creaNota)  #Creo el boton de iniciar sesion
            botonnuevanota.pack(pady=10)                            #Y lo empaqueto
            botonguardanotas = ttk.Button(marco2,text="Guardar notas", command=guardaNotas)  #Creo el boton de guardar
            botonguardanotas.pack(pady=10,expand=True)              #Y lo empaqueto

            ##CARGO LAS NOTAS DE LA BASE DE DATOS
            cursor.execute('SELECT * FROM notas')                   #Realizo una consulta a la bbdd
            datos = cursor.fetchall();                              #Cargo los datos
            for i in datos:                                         #Para cada una de las notas
                print("Hay una nota en la base de datos")
                print(i)
                cargaNota(i[1],i[2],i[3])
                #notas.append(Nota(i[1],i[2],i[3]))
                #identificador = identificador + 1

                for i in notas:                                                 #Para cada una de las notas
                    print(i.texto)                                              #Imprimo su contenido
                    print(i.color)                                              #Imprimo su color
                    print(i.fecha)                                              #Imprimo su fecha

        else:                                                       #Si no existe un usuario con ese nombre
            print("El usuario que has introducido NO existe")
            raiz.after(3000,lambda:raiz.destroy())                  #Cierro la ventana después de 3 segundos

def guardaNotas():
    for i in notas:                                                 #Para cada una de las notas
        print(i.texto)                                              #Imprimo su contenido
        print(i.color)                                              #Imprimo su color
        print(i.fecha)                                              #Imprimo su fecha
        existe = False
        cursor.execute('SELECT * FROM notas WHERE fecha = "'+i.fecha+'"')   #Comprobamos la fecha de la nota guardada
        datos = cursor.fetchall();                                  #Cargamos los datos
        for i in datos:                                             #Para cada una de las notas
            existe = True                                           #Si ya existe esa fecha existe es true
            print("La nota que intentas introducir existe")
        if existe == False:                                         #Si no existe esa fecha aún
            print("Como la nota no existe, guardo la nota ")
            cursor.execute("INSERT INTO notas VALUES(NULL,'"+i.texto+"','"+i.color+"','"+i.fecha+"');") #Inserto la nota en la base de datos
        conexion.commit()                                           #Ejecuto la inserccion

           
def creaNota():                                                     #Defino la función creaNota
    global notas                                                    #Traigo la variable global notas aquí
    global identificador                                            #Traigo la variable global identificador aquí
    fecha = str(int(time.time()))                                   #Saco la fecha actual
    notas.append(Nota('','',fecha))                                 #Añado una nota a la lista
    
    for i in notas:                                                 #Para cada una de las notas
        print(i.texto)                                              #Imprimo su contenido
        print(i.color)                                              #Imprimo su color
        print(i.fecha)                                              #Imprimo su fecha

    ventananuevanota = tk.Toplevel()                                #Nueva ventana flotante      
    anchura = 400                                                   #Defino la anchura en la variable
    altura = 450                                                    #Defino la altura en la variable
    ventananuevanota.geometry(str(anchura)+'x'+str(altura)+'+100+100')   #Geometría de la ventana y margen con la pantalla
    texto = tk.Text(ventananuevanota,bg="white")                    #Creo un cuadro de texto con el fondo blanco
    texto.pack()                                                    #Empaqueto
    identificadorpropio = identificador
    selectorcolor = ttk.Button(ventananuevanota, text="Cambiar color", command=lambda:cambiaColor(ventananuevanota,texto,identificadorpropio))  #Creo boton para cambiar el color
    selectorcolor.pack()                                            #Empaqueto 
    identificador = identificador + 1                               #Subo el identificador

def cargaNota(mitexto,color,fecha):                                 #Defino la función cargaNota
    global notas                                                    #Traigo la variable global notas aquí
    global identificador                                            #Traigo la variable global identificador aquí
    #fecha = str(int(time.time()))                                  #Saco la fecha actual
    notas.append(Nota(mitexto,color,fecha))                         #Añado una nota a la lista
    
    for i in notas:                                                 #Para cada una de las notas
        print(i.texto)                                              #Imprimo su contenido
        print(i.color)                                              #Imprimo su color
        print(i.fecha)                                              #Imprimo su fecha

    ventananuevanota = tk.Toplevel()                                #Nueva ventana flotante      
    anchura = 400                                                   #Defino la anchura en la variable
    altura = 450                                                    #Defino la altura en la variable
    ventananuevanota.geometry(str(anchura)+'x'+str(altura)+'+100+100')   #Geometría de la ventana y margen con la pantalla
    texto = tk.Text(ventananuevanota,bg="white")                    #Creo un cuadro de texto con el fondo blanco
    texto.insert("1.0",mitexto)
    texto.pack()                                                    #Empaqueto
    ventananuevanota.configure(bg = color)                          #Cojo el color de fondo a la ventana seleccionada
    try:
        texto.configure(bg = color)                                     #Cojo el color del cuadro de texto
    except Exception as e:
        print(e)
        
    identificadorpropio = identificador
    selectorcolor = ttk.Button(ventananuevanota, text="Cambiar color", command=lambda:cambiaColor(ventananuevanota,texto,identificadorpropio))  #Creo boton para cambiar el color
    selectorcolor.pack()                                            #Empaqueto 
    identificador = identificador + 1                               #Subo el identificador
    
def cambiaColor(ventana,texto,identificador):                       #Defino función de cambio de color tomando parámetros
    nuevocolor = askcolor(title="Selecciona un color")              #Introduzco un selector de color
    ventana.configure(bg = nuevocolor[1])                           #Cambio el color de fondo a la ventana seleccionada
    texto.configure(bg = nuevocolor[1])                             #Cambio el color del cuadro de texto
    notas[identificador].color = nuevocolor[1]
    notas[identificador].texto = texto.get("1.0", tk.END)
    print("El identificador es: "+str(identificador))
    #comprobar que cambie el color de todas las notas
    for i in notas:                                                 #Para cada una de las notas
        print(i.texto)                                              #Imprimo su contenido
        print(i.color)                                              #Imprimo su color
        print(i.fecha)                                              #Imprimo su fecha


## CREACCION DE LA VENTANA PRINCIPAL Y ESTILO DE LA VENTANA ##
raiz = tk.Tk()                                                      #Creo un interfaz gráfica de usuario
raiz.title("Notas  v0.01")                                          #Pongo un título a la ventana
raiz.geometry('300x300+20+50')                                      #Geometría de la ventana y margen con la pantalla
raiz.attributes("-topmost",True)                                    #Para que esté siempre encima del resto de las ventanas
raiz.attributes("-alpha",0.9)                                       #Añado un efecto de transparencia a la ventana
raiz.resizable(0,0)                                                 #Impido que el usuario pueda redimensionar la ventana
estilo = ttk.Style()                                                #Añado soporte para estilos
estilo.theme_use('xpnative')                                        #Selecciono el estilo clasico de aplicaciones

##DECLARO VARIABLES GLOBALES DEL PROGRAMA

varusuario = tk.StringVar()                                         #Variable para almacenar el usuario
varcontrasena = tk.StringVar()                                      #Variable para almacenar la contraseña
varemail = tk.StringVar()                                           #Variable para almacenar el email
notas = []                                                          #Creo una lista vacía de notas
identificador = 0                                                   #Inicializo un identificador

## AÑADIMOS WIDGETS A LA VENTANA ##

marco = ttk.Frame(raiz)
marco.pack()

version = tk.Label(marco,text="Notas v0.01")                        #Creamos un label
version.pack()                                                      #Lo añadimos a la ventana

inputusuario = ttk.Entry(marco,textvariable = varusuario)           #Creo una entrada para que el usuario diga quien es
inputusuario.insert(0, 'Introduce tu usuario')                      #Creo un texto de inicio en la entrada 
inputusuario.pack(pady=10)                                          #Empaqueto la entrada y le pongo un padding

inputcontrasena = ttk.Entry(marco, textvariable = varcontrasena)    #Creo una entrada para introducir la contraseña
inputcontrasena.insert(0, 'Introduce tu contraseña')                #Creo un texto de inicio en la entrada 
inputcontrasena.pack(pady=10)                                       #Empaqueto la entrada y le pongo un padding

inputemail = ttk.Entry(marco, textvariable = varemail)              #Creo una entrada para introducir el email
inputemail.insert(0, 'Introduce tu email')                          #Creo un texto de inicio en la entrada
inputemail.pack(pady=10)                                            #Empaqueto la entrada y le pongo un padding

botonlogin = ttk.Button(marco,text="Enviar", command=iniciasesion)  #Creo el boton de iniciar sesion
botonlogin.pack(pady=10)                                            #Y lo empaqueto

## INTENTO INTRODUCIR ANTIALIAS EN WINDOWS Y LANZO EL BUCLE ##

try:                                                                #Intento ejecutar
    from ctypes import windll                                       #Importo la librería específica de interfaces de usuario de Windows
    windll.shcore.SetProcessDpiAwareness(1)                         #Activo el antialias para texto etc dentro de las interfaces
except Exception as e:                                              #Atrapo el error en caso de que se produzca
    print(e)                                                        #Saco el error por pantalla
finally:                                                            #En todo caso siempre
    raiz.mainloop()                                                 #Detiene la ejecucuión y previene que la ventana se cierre
