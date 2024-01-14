#include <iostream>
#include <fstream>

using namespace std;

 //Las funciones nos van a permitir reutilizar bloques de código dentro del código que escribamos

//Declaro la nueva función antes de la función principal para que la reconozca correctamente
void saluda(){
    cout << "Yo te saludo \n";
} 

//funcion principal
int main(){
    saluda();
    return 0;
};

