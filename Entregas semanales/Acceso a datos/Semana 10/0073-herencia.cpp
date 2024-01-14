#include <iostream>
using namespace std;

//declaro la clase
class Gato{
    public:
        string nombre;
        int edad;
        //declaro el metodo maulla
        string maulla(){
            return "el gato está maullando\n";
        }
};

int main(){
    //creo un objeto de la clase
    Gato gato1;
    cout << gato1.maulla();
    
    return 0;
}