#include <iostream>
#include <string>
using namespace std;

int main(){
    string nombre = "Isabel Gonzalez-Gallego Rivera";
    string &referencia = nombre;
    
    //obtenemos la dirección de la memoria donde se ha guardado esa variable
    //la referencia acude a esa direccion para dar el valor
    cout << &nombre << "\n";
    
    return 0;
}