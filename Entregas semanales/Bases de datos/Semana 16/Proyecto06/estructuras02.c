#include <stdio.h>

int main(int argc,char *argv[]){
//ESTRUCTURAS DE CONTROL
    int edad = 8;
    //CONDICIONAL IF
    if(edad < 20){
        //esto se ejecuta en el caso verdadero
        if(edad < 10){
          //esto se ejecuta en el caso verdadero
            printf("Eres un ninio \n");
        }else{
            //esto se ejecuta en el caso falso
            printf("Eres un adolescente \n");
        }
    }else{
       //esto se ejecuta en el caso falso 
        if(edad < 30){
          //esto se ejecuta en el caso verdadero
            printf("Eres un joven \n"); 
        }else{
            //esto se ejecuta en el caso falso
            printf("Ya no eres tan joven \n");
        }
    }
    return 0;
    
}