import mysql.connector as my
import matplotlib.pyplot as plt

##PARTE BASE DE DATOS
mibd = my.connect(
    host = "localhost",
    user = "isabel",
    password = "isabel",
    database = "cursopython"
    )
##print(mibd)

micursor = mibd.cursor()

micursor.execute("SELECT * FROM nombresninos ORDER BY totalnino DESC LIMIT 15")
miresultado = micursor.fetchall()

for i in miresultado:
    print("tengo un resultado que es:")
    print(str(i[1])+" - "+str(i[2]))


##PARTE GRAFICA (no hace nada, seguimos en el siguiente archivo)

labels = 'Frogs', 'Hogs', 'Dogs', 'Logs'
#pongo los numeros de la bbdd
sizes = [15, 30, 45, 10]
explode = (0, 0.1, 0, 0)  # only "explode" the 2nd slice (i.e. 'Hogs')
fig, ax = plt.subplots()
ax.pie(sizes, explode=explode, labels=labels, autopct='%1.1f%%',
        shadow=True, startangle=90)
plt.show()
