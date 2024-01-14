//Incluyo la librería iostream
#include <iostream>
using namespace std;
//creo el metodo principal con nombre main
int main(){
    //creo un array con la longitud de la agenda
    int longitud = 20;
    //al declarar el array pongo la variable longitud
    string agenda[longitud];
    //pongo elementos en la agenda
    agenda[0] = "Isabel";
    agenda[1] = "Ismael";
    agenda[2] = "Iris";
    agenda[3] = "Ivan";
    agenda[4] = "Ingrid";
    
    //otra forma de iterar en el loop es con una estructura foreach
    for(string i : agenda){
        cout << "Tengo un elemento en la agenda que es  " << i << "\n";
    }
    
    return 0;
};