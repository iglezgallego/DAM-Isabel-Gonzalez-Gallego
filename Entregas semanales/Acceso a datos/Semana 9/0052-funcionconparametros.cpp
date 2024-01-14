#include <iostream>
#include <fstream>

using namespace std;

 //Las funciones nos van a permitir reutilizar bloques de código dentro del código que escribamos

//Le digo que la función va a llevar un parámetro que será el nombre
string saluda(string nombre){
    //usamos return para que nos devuelva algo, en este caso una cadena
    string micadena = "Hola, " + nombre + ", yo te saludo \n";
    return micadena;
}

//funcion principal
int main(){
    //le paso el parámetro a la función
    cout << saluda("Isabel");
    //Le paso el parámetro con otros valores
    cout << saluda("Sofia");
    cout << saluda("Juan");
    return 0;
};

