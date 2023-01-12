// Operadores lógicos

double operando1 = 4;
double operando2 = 4;
double operando3 = 3;
double operando4 = 4;

bool comparacion;

//AND (Se tienen que cumplir las 2)
comparacion = operando1 == operando2 && operando3 == operando4;
Console.WriteLine("La expresión anterior es: "+comparacion);
//OR (Solo hace falta que se cumpla 1)
comparacion = operando1 == operando2 || operando3 == operando4;
Console.WriteLine("La expresión anterior es: " + comparacion);

