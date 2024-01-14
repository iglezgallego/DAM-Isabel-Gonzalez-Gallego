#include <iostream>
using namespace std;

//declaro la clase persona
class Persona{
    //propiedades publicas
    public:
        string nombre;
        int edad;
    //declaro el método saluda dentro de la clase
    void saluda(){
        cout << "Yo te digo hola\n";
    }
};

int main(){
    //Primer objeto
    Persona persona1;
    persona1.nombre = "Isabel";
    persona1.edad = 31;
    //Segundo objeto
    Persona persona2;
    persona2.nombre = "Alberto";
    persona2.edad = 34;
    
    cout << persona1.nombre << "\n";
    cout << persona2.nombre << "\n";
    
    //llamo al metodo saluda
    persona1.saluda();
    
    return 0;
}