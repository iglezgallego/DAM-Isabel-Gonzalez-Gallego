//Operadores de comparación

//declaramos variables
double operando1 = 4;
double operando2 = 3;
bool resultado;
 //igualdad
resultado = operando1 == operando2;
Console.WriteLine("Es cierto que "+operando1+" es igual que "+operando2+"?:"+resultado);
//no igualdad
resultado = operando1 != operando2;
Console.WriteLine("Es cierto que " + operando1 + " no es igual que " + operando2 + "?:" + resultado);
//menor que
resultado = operando1 < operando2;
Console.WriteLine("Es cierto que " + operando1 + " es menor que " + operando2 + "?:" + resultado);
//mayor que
resultado = operando1 > operando2;
Console.WriteLine("Es cierto que " + operando1 + " es mayor que " + operando2 + "?:" + resultado);
//menor o igual a
resultado = operando1 <= operando2;
Console.WriteLine("Es cierto que " + operando1 + " es menor o igual que " + operando2 + "?:" + resultado);
//mayor o igual a
resultado = operando1 >= operando2;
Console.WriteLine("Es cierto que " + operando1 + " es mayor o igual que " + operando2 + "?:" + resultado);

