#include <iostream>
using namespace std;

//declaro la clase
class Persona{
    public:
        string nombre;
        int edad;
    //declaro el metodo saluda con la propiedad nombre
    void saluda(){
        cout << "Yo me llamo " << nombre << " y te digo hola\n";
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
    
    persona1.saluda();
    persona2.saluda();
    
    return 0;
}