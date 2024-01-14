#include <iostream>
using namespace std;

//declaro la clase persona
class Persona{
    //propiedades publicas
    public:
    //tipo de propiedades que soporta la clase
        string nombre;
        int edad;
};

int main(){
    //creo una primer objeto
    Persona persona1;
    persona1.nombre = "Isabel";
    persona1.edad = 31;
    //creo una segundo objeto
    Persona persona2;
    persona2.nombre = "Alberto";
    persona2.edad = 34;
    //saco los valores por pantalla
    cout << persona1.nombre << "\n";
    cout << persona2.nombre << "\n";
    
    return 0;
}