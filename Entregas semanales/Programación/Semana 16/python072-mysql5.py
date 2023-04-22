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
#ACTUALIZAR DATOS
    micursor.execute("UPDATE personas SET telefono = '56789'")
    mibd.commit()

#programacion defensiva
except:
    print("Ha ocurrido un error en la base de datos")
