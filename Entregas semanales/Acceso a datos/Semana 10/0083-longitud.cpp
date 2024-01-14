#include <iostream>
#include <string>
using namespace std;

int main(){
    string nombre = "Yo me llamo Isabel Gonzalez-Gallego Rivera";
    
    //Pongo el tostring para poder concatenar con el \n
    //el metodo .lenght saca la longitud de la cadena
    cout << to_string(nombre.length())+"\n";
    
    return 0;
}