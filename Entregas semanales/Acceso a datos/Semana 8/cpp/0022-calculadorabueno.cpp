//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    //Declaración de las variables que van a usarse
        int operando1;
        int operando2;
        int suma;
    //Entrada de datos por parte del usuario
        cout << "Introduce el valor del primer operando: \n";
        cin >> operando1;
        cout << "Introduce el valor del segundo operando \n";
        cin >> operando2;
    //Calculos con la información que ha introducido el usuario
        suma = operando1 + operando2;
    //Saco el resultado por pantalla
        cout << "El resultado es : " << suma << "\n";
    
    return 0;
};