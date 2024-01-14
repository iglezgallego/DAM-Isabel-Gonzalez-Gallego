#include <iostream>
using namespace std;

int main(){
    //struct es como un array multidimensional con otras ventajas
    
    struct{
        string nombre;
        int telefono;
        string email;
    } registro1,registro2;
    
    //es mas limpio que utilizar arrays
    registro1.nombre = "Isabel";
    registro1.telefono = 928373;
    registro1.email = "iglez@gmail.com";
        
    cout << registro1.nombre << "\n";
    
    
    
    return 0;
};