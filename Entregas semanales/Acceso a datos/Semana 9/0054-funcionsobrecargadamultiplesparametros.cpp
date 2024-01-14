#include <iostream>
#include <fstream>

using namespace std;

string saluda(string nombre, int edad){
    //usamos return para que nos devuelva algo, en este caso una cadena
    string micadena = "Hola, " + nombre + ", que sepas que tienes " + to_string(edad) + " años y yo te saludo \n";
    return micadena;
} 
//Le digo que la función va a llevar multiples parámetros 
string saluda(string nombre){
    //usamos return para que nos devuelva algo, en este caso una cadena
    string micadena = "Hola, " + nombre + ", yo te saludo \n";
    return micadena;
} 
//Sobrecarga de función: en este caso declaro la misma función pero sin parámetro
string saluda(){
    //usamos return para que nos devuelva algo, en este caso una cadena
    string micadena = "Hola, yo te saludo \n";
    return micadena;
} 

//funcion principal
int main(){
    //le paso el parámetro a la función
    cout << saluda("Isabel");
    //Le paso el parámetro con otros valores
    cout << saluda("Sofia");
    cout << saluda("Juan");
    //Ahora puedo a llamar a la función sin parámetro por la sobrecarga
    cout << saluda();
    //Ahora llamo a la función y le paso varios parámetros
    cout << saluda("Maria",31);
    
    return 0;
};

