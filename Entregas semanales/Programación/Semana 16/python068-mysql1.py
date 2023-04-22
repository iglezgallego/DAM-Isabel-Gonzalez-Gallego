import mysql.connector as my

mibd = my.connect(
    host = "localhost",
    user = "isabel",
    password = "isabel"
    )
print(mibd)
#esto da error porque no estamos conectados a un servidor
