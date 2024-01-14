#include <iostream>
#include <string>
using namespace std;

int main(){
    string nombre = "Isabel Gonzalez-Gallego Rivera";
    //REFERENCIA A LA PALABRA ORIGINAL
    //creo una referencia con & que me pasa la variable nombre
    string &referencia = nombre;

    cout << referencia << "\n";
    
    return 0;
}