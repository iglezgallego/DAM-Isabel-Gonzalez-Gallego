#include <iostream>
#include <string.h>
using namespace std;
//Bucle WHILE no tiene condición de incremento, por lo tanto como la condición siempre se cumple entramos en un bucle infinito
int main(){
    int dia = 1;
    while(dia < 31){
        cout << "Hoy es el dia " << dia << " del mes \n";
        //pongo una condición de incremento para no entrar en un bucle infinito
        dia++;
    }
    return 0;
}