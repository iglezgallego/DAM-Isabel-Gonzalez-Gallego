#include <iostream>
#include <string>
using namespace std;

int main(){
    string nombre = "Isabel Gonzalez-Gallego Rivera";
    string &referencia = nombre;
    
    //Un puntero es un variable que almacena la direccion de la memoria del valor y llama a la direccion de la memoria
    // con * indico que estoy generando un puntero
    string* puntero = &nombre;
    // al poner *puntero cambia el valor de la direccion por el valor
    cout << *puntero << "\n";
    
    return 0;
}