#include <iostream>
#include <fstream>

using namespace std;

 //Las funciones nos van a permitir reutilizar bloques de código dentro del código que escribamos

//funcion principal
int main(){
    saluda();
    return 0;
};

//creo una nueva función aunque así declara va a dar error
void saluda(){
    cout << "Yo te saludo \n";
}