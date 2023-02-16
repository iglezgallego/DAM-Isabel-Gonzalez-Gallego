// Informo al usuario sobre el nombre del programa
Console.WriteLine("Programa de calculadora de velocidad del sonido v.0.1");
// Le indico al usuario lo que le voy a pedir
Console.WriteLine("Indica cuántos segundos han pasado desde el trueno hasta el rayo");
// Almaceno la entrada en una variable
string segundos = Console.ReadLine();
// Como la entrada es un string, lo convierto en entero
int segundosentero = Int32.Parse(segundos);
// Saco por pantalla una comprobación
Console.WriteLine("El sonido ha tardado " + segundos + " segundos en llegar");
// Introduzco como variable la velocidad del sonido
int velocidadsonido = 343;
// La distancia es igual a los segundos multiplicado por la velocidad
int distancia = velocidadsonido * segundosentero;
// Saco el resultado por pantalla
Console.WriteLine("La velocidad del sonido es " + velocidadsonido + " metros por segundo");
Console.WriteLine("La tormenta se encuentra a una distancia de " + distancia + " metros");
