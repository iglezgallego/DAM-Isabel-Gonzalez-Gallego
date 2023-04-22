import mysql.connector as my
import matplotlib.pyplot as plt

##PARTE BASE DE DATOS
mibd = my.connect(
    host = "localhost",
    user = "isabel",
    password = "isabel",
    database = "cursopython"
    )

micursor = mibd.cursor()

micursor.execute("SELECT * FROM nombresninos ORDER BY totalnino DESC LIMIT 10")
miresultado = micursor.fetchall()

sizes = [0]
#forzar las comillas simples para decirle al sistema que son string dentro de una tupla
nombres = "'hola'"

for i in miresultado:
    sizes.append(i[2])
    #forzar las comillas simples para decirle al sistema que son string dentro de una tupla
    nombres += ",'"+str(i[1])+"'"

labels = eval(nombres)

print("vamos a comprobar")
print(labels)
print(sizes)
print("quiero ver el tipo de dato")
print(type(labels))

fig1, ax1 = plt.subplots()
ax1.pie(sizes, labels=labels, autopct='%1.1f%%',
        shadow=True, startangle=90)
ax1.axis('equal')
plt.show()
