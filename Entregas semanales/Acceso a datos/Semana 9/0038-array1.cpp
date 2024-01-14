//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    //declaro la variable que es un array con 20 elementos
    string agenda[20];
    //pongo elementos en la agenda
    agenda[0] = "Isabel";
    agenda[1] = "Ismael";
    agenda[2] = "Iris";
    agenda[3] = "Ivan";
    agenda[4] = "Ingrid";
    
    
    
    cout << "La agenda es: \n";
    //nos da la direccion de memoria de la agenda
    cout << agenda;
    //en este caso si nos da el valor del elemento de la agenda
    cout << agenda[0];
    cout << "\n";
    cout << agenda[1];
    cout << "\n";
    cout << agenda[2];
    cout << "\n";
    cout << agenda[3];
    cout << "\n";
    cout << agenda[4];
    cout << "\n";
    return 0;
};