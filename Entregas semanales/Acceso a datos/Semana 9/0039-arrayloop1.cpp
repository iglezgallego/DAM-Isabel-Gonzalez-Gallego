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
    
    //recorro el array para que me muestre cada elemento de la agenda
    for(int i =0; i<longitud;i++){
        cout << "Elemento en la agenda: " << agenda[i] << "\n";
    }
    
    return 0;
};