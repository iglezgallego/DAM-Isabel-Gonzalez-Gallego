//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    //declaro variable 1
    int operando1;
    //hago la salida de información para el usuario
    cout << "Introduce el valor del primer operando: \n";
    //creo una entrada para el operando 1 
    cin >> operando1;
    //declaro la variable del operando 2
    int operando2;
    //le digo al usuario lo que tiene que hacer
    cout << "Introduce el valor del segundo operando \n";
    //creo una entrada para el operando 2
    cin >> operando2;
    //introduzco la operación a realizar
    int suma = operando1 + operando2;
    suma = operando1 + operando2;
    cout << "El resultado es : " << suma << "\n";
    return 0;
};