#include <iostream>
using namespace std;

//declaro la clase
class Persona{
    public:
        string nombre;
        int edad;
    //declaro el metodo con STRING en vez de void y con la propiedad nombre
    string saluda(){
        string cadena = "Yo me llamo " + nombre + " y te digo hola\n";
        return cadena;
    }
};

int main(){
    Persona persona1;
    persona1.nombre = "Isabel";
    persona1.edad = 31;
    
    Persona persona2;
    persona2.nombre = "Alberto";
    persona2.edad = 34;
    
    cout << persona1.nombre << "\n";
    cout << persona2.nombre << "\n";
    
    //como el cout no lo tengo dentro de la clase, llamo a la clase con cout
    cout << persona1.saluda();
    cout << persona2.saluda();
    
    return 0;
}