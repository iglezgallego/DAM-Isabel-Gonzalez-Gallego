// Informo al usuario del nombre del programa
Console.WriteLine("Programa ¿Cuanto queda para llegar?");
// Indico al usuario lo que le voy a pedir
Console.WriteLine("Indica la velocidad a la que va tu coche en km/h:");
// Almaceno la entrada en una variable
string velocidad = Console.ReadLine();
// Indico al usuario lo que le voy a pedir
Console.WriteLine("Indica la distancia hasta tu destino en km:");
// Almaceno la entrada en una variable
string distancia = Console.ReadLine();
// Convierto la variable a flotante
float velocidadfloat = float.Parse(velocidad);
float distanciafloat = float.Parse(distancia);
// Saco por pantalla
Console.WriteLine("La velocidad a la que va tu coche es: " + velocidad + " km/s");
Console.WriteLine("La distancia hasta tu destino es de: " + distancia + " km");
// Realizo los cálculos
float tiempo = distanciafloat / velocidadfloat;
// Saco el resultado por pantalla
Console.WriteLine("Quedan " + tiempo + " horas para llegar tu destino");
