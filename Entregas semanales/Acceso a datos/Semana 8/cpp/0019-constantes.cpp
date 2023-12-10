//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    int edad = 30;
    cout << "Mi edad es de " << edad << " anios \n";
    //cambio el valor de la variable
    edad = 35;
    cout << "Mi edad es de " << edad << " anios \n";
    //la constantes se declaran con mayusculas
    const float PI = 3.1416;
    cout << "el valor del numero pi es: " << PI << "\n";
    //esto va a dar error ya que hemos declaro pi como una constante y no se puede variar su valor
    PI = 4;
    cout << "el valor del numero pi es: " << PI << "\n";
    return 0;
};