#include <iostream>
//Esta libreria vamos a poder trabajar mas facilmente con cadenas
#include <string>
using namespace std;

int main(){
    string nombre = "Isabel";
    string apellidos = "González-Gallego Rivera";
    string retorno = "\n";
    //uno dos cadenas con el signo +
    string nombrecompleto = nombre+" "+apellidos+retorno;
    
    //saco por pantalla el nombre completo
    cout << nombrecompleto;
    
    return 0;
}