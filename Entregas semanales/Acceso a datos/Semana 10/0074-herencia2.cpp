#include <iostream>
using namespace std;

//declaro la clase mamifero
class Mamifero{
    public:
        //declaro el metodo mama
        string mama(){
            return "Este animal mama cuando es pequeño \n";
        }
};

//declaro la clase gato, que hereda todo lo que tiene la clase mamifero
class Gato: public Mamifero{
    public:
        string nombre;
        int edad;
        //declaro el metodo maulla
        string maulla(){
            return "el gato esta maullando\n";
        }
};

int main(){
    //creo un objeto de la clase
    Gato gato1;
    cout << gato1.maulla();
    //llamo al metodo mama que esta heredado de la clase mamifero
    cout << gato1.mama();
    
    
    return 0;
}