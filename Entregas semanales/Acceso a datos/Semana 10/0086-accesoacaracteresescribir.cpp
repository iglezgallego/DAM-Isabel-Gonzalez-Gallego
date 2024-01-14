#include <iostream>
#include <string>
using namespace std;

int main(){
    string nombre = "Yo me llamo Isabel Gonzalez-Gallego Rivera";
    
    //iterno dentro de los caracteres de la cadena
    for(int i = 0;i<nombre.length();i++){
        //una de cada dos veces 
        if(i%2 == 0){
            //escribe un asterisco
            nombre[i] = '*';
        }
    }
    cout << nombre << "\n";
    
    return 0;
}