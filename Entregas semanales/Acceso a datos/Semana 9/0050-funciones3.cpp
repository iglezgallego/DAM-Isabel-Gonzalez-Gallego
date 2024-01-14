#include <iostream>
#include <fstream>

using namespace std;

 //Las funciones nos van a permitir reutilizar bloques de código dentro del código que escribamos

//Declaro la nueva función con string porque devuelve una cadena
string saluda(){
    //usamos return para que nos devuelva algo, en este caso una cadena
    return "Yo te saludo \n";
} 

//funcion principal
int main(){
    //lo que haga la función devuelvelo por un cout
    cout << saluda();
    return 0;
};

