#include <iostream>
#include <string>
using namespace std;

int main(){
    string edad = "31";
    string diez = "10";
    
    //para que pase de string a int y nos sume en vez de encadenar
    int suma = stoi(edad) + stoi(diez);
    
    //Convierto la suma en un string
    cout << to_string(suma)+"\n";
    
    return 0;
}