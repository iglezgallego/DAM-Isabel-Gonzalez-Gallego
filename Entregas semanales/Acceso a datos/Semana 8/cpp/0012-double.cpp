//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    //declaro la variable de tipo entero
    int altura;
    //le doy un valor a la variable, que al ser de tipo double no dará el número correcto
    altura = 1.60;
    //concatenar la variable en una línea
    cout << "Mi altura es de " << altura << " metros\n";
    return 0;
}