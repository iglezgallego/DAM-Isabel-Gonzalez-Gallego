#include <iostream>
using namespace std;

class Persona{
    public:
        string nombre;
        int edad;
    //declaro metodo constructor que tiene el mismo nombre que la clase
        //pongo los parametros dentro del metodo constructor
        Persona(string minombre,int miedad){
            nombre = minombre;
            edad = miedad;
        }
};

int main(){
    //en el momento de crear el objeto, defino los parámetros gracias al metodo constructor
    Persona persona1("Isabel",31);
    //Creo una salida por pantalla
    cout << persona1.nombre << "\n";
    
    return 0;
}