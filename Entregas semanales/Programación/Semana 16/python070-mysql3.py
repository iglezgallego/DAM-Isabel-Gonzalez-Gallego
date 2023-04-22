import mysql.connector as my
try:
    mibd = my.connect(
        host = "localhost",
        user = "isabel",
        password = "isabel",
        database = "cursopython"
        )
    ##print(mibd)

    micursor = mibd.cursor()

    micursor.execute("SELECT * FROM  personas")

    miresultado = micursor.fetchall()

    ##print(miresultado)

    #recorrer la tabla de la base de datos

    for i in miresultado:
        print("tengo un resultado que es:")
        print(i[2])
        
#programacion defensiva
except:
    print("Ha ocurrido un error en la base de datos")
