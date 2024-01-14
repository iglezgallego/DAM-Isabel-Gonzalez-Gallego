#include <iostream>
#include <cstring>
using namespace std;
//Vamos a partir una cadena

int main(){
    //creo una cadena y lo convierto en un array
    char cadena[100] = "uno,dos,tres";
    //creamos un puntero
    char *ptr;
    ptr = strtok(cadena, ",");
    int contador = 0;
    //mientras ptr no es null
    while (ptr != NULL)  
    {   
        if(contador == 0){
            cout << "nombre:";
        }else if(contador == 1){
            cout << "telefono:";
        }
        else if(contador == 2){
            cout << "email:";
        }
        contador++;
        cout << ptr  << endl; // print the string token
        ptr = strtok (NULL, " , "); 
    }  
    
    cout << "\n\n\n";
    return 0;
}