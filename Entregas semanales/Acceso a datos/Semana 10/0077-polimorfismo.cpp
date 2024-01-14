#include <iostream>
using namespace std;

//declaro la clase mamifero
class Mamifero{
    //propiedades publicas
    public:
    //declaro metodo mama
        string mama(){
            return "este animal mama cuando es pequeño\n";
        }
    //declaro un segundo metodo grita
        string grita(){
            return "este animal esta gritando\n";
        }
};
class Gato: public Mamifero{
    public:
        string nombre;
        int edad;
        string maulla(){
            return "el gato esta maullando\n";
        }
    //la clase hija (gato) va a sobreescribir el método de la clase madre
        string grita(){
            return "este gato esta gritando\n";
        }
};

int main(){
    Gato gato1;
    cout << gato1.maulla();
    cout << gato1.grita();
    
    return 0;
}