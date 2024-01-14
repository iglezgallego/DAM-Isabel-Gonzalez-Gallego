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
    public:
        //Llegamos a esas propiedades privadas a través de unos métodos públicos - setters y getters
        void ponAltura(double alt){
            altura = alt;
        }
        double dameAltura(){
            return altura;
        }
};

int main(){
    
    Persona persona1;
    persona1.nombre = "Isabel";
    //Aquí pongo el valor de la propiedad altura
    persona1.ponAltura(1.62);
    //saca por pantalla la altura
    cout << persona1.dameAltura();
    return 0;
}