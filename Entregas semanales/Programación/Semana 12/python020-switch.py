print("Dime que día de la semana es hoy:")
dia = input()

# En lugar de switch (dia)

if dia =='lunes':
    print("Hoy es el peor día de la semana")
elif dia == 'martes':
    print("Hoy es el segundo peor día de la semana")
elif dia == 'miércoles':
    print("Estamos ya a mitad de semana")
elif dia == 'jueves':
    print("Hoy es juernes")
elif dia == 'viernes':
    print("Ya empieza el fin de semana")
elif dia == 'sábado':
    print("Hoy es el mejor día de la semana")
elif dia == 'domingo':
    print("Ya es casi lunes otra vez")
else:
    print("Lo que has escrito no es un día de la semana")
