#include <iostream>
using namespace std;

class Persona{
    public:
        string nombre;
        int edad;
    string saluda(){
        string cadena = "Yo me llamo " + nombre + " y te digo hola\n";
        return cadena; 
    }
    
    string buenosDias();
};
//Declaro el metodo fuera de la clase Persona
string Persona::buenosDias(){
    return "yo te digo buenos dias\n";
}

int main(){
    Persona persona1;
    persona1.nombre = "Isabel";
    persona1.edad = 31;
    
    Persona persona2;
    persona2.nombre = "Alberto";
    persona2.edad = 34;
    
    cout << persona1.nombre << "\n";
    cout << persona2.nombre << "\n";
    
    cout << persona1.saluda();
    cout << persona2.saluda();
    cout << persona1.buenosDias();
    
    return 0;
}