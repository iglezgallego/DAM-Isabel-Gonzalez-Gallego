import mysql.connector as my
import matplotlib.pyplot as plt
import numpy as np

##PARTE BASE DE DATOS
mibd = my.connect(
    host = "localhost",
    user = "isabel",
    password = "isabel",
    database = "cursopython"
    )

micursor = mibd.cursor()
nombres = "'hola'"
performance = [0]

micursor.execute("SELECT COUNT(id) as cuenta FROM logs WHERE `navegador` LIKE ('%Macintosh%')")
miresultado = micursor.fetchall()
for i in miresultado:
    nombres += ",'Macintosh'"
    performance.append(i[0])

micursor.execute("SELECT COUNT(id) as cuenta FROM logs WHERE `navegador` LIKE ('%Windows%')")
miresultado = micursor.fetchall()
for i in miresultado:
    nombres += ",'Windows'"
    performance.append(i[0])

micursor.execute("SELECT COUNT(id) as cuenta FROM logs WHERE `navegador` LIKE ('%iPhone%')")
miresultado = micursor.fetchall()
for i in miresultado:
    nombres += ",'iPhone'"
    performance.append(i[0])

micursor.execute("SELECT COUNT(id) as cuenta FROM logs WHERE `navegador` LIKE ('%Android%')")
miresultado = micursor.fetchall()
for i in miresultado:
    nombres += ",'Andorid'"
    performance.append(i[0])

micursor.execute("SELECT COUNT(id) as cuenta FROM logs WHERE `navegador` LIKE ('%Linux%')")
miresultado = micursor.fetchall()
for i in miresultado:
    nombres += ",'Linux'"
    performance.append(i[0])
   
people = eval(nombres)
print(people)

##PARTE DE GRAFICA MATPLOTLIB DE BARRAS
plt.rcdefaults()
fig, ax = plt.subplots()

# Example data
y_pos = np.arange(len(people))

print(performance)
error = np.random.rand(len(people))

ax.barh(y_pos, performance, xerr=error, align='center')
ax.set_yticks(y_pos, labels=people)
ax.invert_yaxis()  # labels read top-to-bottom
ax.set_xlabel('Performance')
ax.set_title('How fast do you want to go today?')

#Para mostrar la grafica por pantalla
plt.show()

#para guardar la grafica como un png
#plt.savefig('foo.png')
