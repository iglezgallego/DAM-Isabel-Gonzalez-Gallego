#include <iostream>
using namespace std;

//Declaro una clase que no entra dentro de la jerarquía de las otras clases
class Deidad{
    public:
        string humanos(){
            return "humanos rendidme pleitesia\n";
        }
};
class Animal{
    public:
        string seMueve(){
            return "este animal se mueve\n";
        }
};
class Mamifero: public Animal{
    public:
        string mama(){
            return "este animal mama cuando es pequeño\n";
        }
};
//La clase gato puede heredar de varias clases
class Gato: public Mamifero, public Deidad{
    public:
        string nombre;
        int edad;
        string maulla(){
            return "el gato esta maullando\n";
        }
};

int main(){
    Gato gato1;
    cout << gato1.maulla();
    cout << gato1.mama();
    cout << gato1.seMueve();
    cout << gato1.humanos();
    
    return 0;
}