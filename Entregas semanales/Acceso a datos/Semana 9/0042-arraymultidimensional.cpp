
#include <iostream>
using namespace std;

int main(){
    //primera dimension con 20 indices y segunda con 3 indices
    int longitud = 20;
    string agenda[20][3];
    
    agenda[0][0] = "Isabel";
    agenda[0][1] = "32345";
    agenda[0][2] = "iglez@gamil.com";
    
    agenda[1][0] = "Ismael";
    agenda[1][1] = "3444345";
    agenda[1][2] = "ismael@gamil.com";
    
    agenda[2][0] = "Iris";
    agenda[2][1] = "366775";
    agenda[2][2] = "iris@gamil.com";
    
    for (int i= 0;i<longitud;i++){
        cout << "nombre: " << agenda[i][0] << " - telefono: " << agenda[i][1] << " - email: " << agenda[i][2] << "\n";
    }
    
    return 0;
};