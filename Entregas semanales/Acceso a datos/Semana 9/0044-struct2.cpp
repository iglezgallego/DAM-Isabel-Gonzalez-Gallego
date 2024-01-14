#include <iostream>
using namespace std;

int main(){
    //struct es como un array multidimensional con otras ventajas
    
    //le indicamos que es un registro
    struct registro{
        string nombre;
        int telefono;
        string email;
    };
    
    registro agenda[20];
    //forma mas limpia de acceder a los recursos
    agenda[0].nombre = "Isabel";
    agenda[0].telefono = 23455;
    agenda[0].email = "iglez@gmail.com";
        
    cout << agenda[0].nombre << "\n";
    
    return 0;
};