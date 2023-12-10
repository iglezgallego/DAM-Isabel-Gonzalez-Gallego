//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    //declaro la variable de tipo char que guarda solo un caracter
    char inicial1;
    //le doy un valor a la variable char
    inicial1 = 'i';
    //declaro otra variable con otra caracter
    char inicial2;
    inicial2 = 'g';
    
    //concatenar la variable en una línea
    cout << "Mis iniciales son " << inicial1 << inicial2 << "\n";
    return 0;
}