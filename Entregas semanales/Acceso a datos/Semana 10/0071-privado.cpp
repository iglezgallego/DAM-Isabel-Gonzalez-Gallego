#include <iostream>
using namespace std;

class Persona{
    //propiedades publicas
    public:
        string nombre;
        int edad;
    //propiedades privadas
    private:
        double altura;
};

int main(){
    
    Persona persona1;
    persona1.nombre = "Isabel";
    //Al compilar esto va a dar error porque es una propiedad privada que no puedo editar
    persona1.altura = 1.62;
    return 0;
}