#include <iostream>
using namespace std;
//declaro la clase animal
class Animal{
    public:
        string seMueve(){
            return "este animal se mueve\n";
        }
};
//declaro la clase mamifero que hereda de animal
class Mamifero: public Animal{
    public:
        string mama(){
            return "este animal mama cuando es pequeño\n";
        }
};
//declaro la clase gato que hereda de mamifero, y por tanto, tambien de animal
class Gato: public Mamifero{
    public:
        string nombre;
        int edad;
        string maulla(){
            return "el gato está maullando\n";
        }
};

int main(){
    Gato gato1;
    cout << gato1.maulla();
    cout << gato1.mama();
    //llamo al metodo seMueve que esta heredado de la clase animal y mamifero
    cout << gato1.seMueve();
    
    
    return 0;
}