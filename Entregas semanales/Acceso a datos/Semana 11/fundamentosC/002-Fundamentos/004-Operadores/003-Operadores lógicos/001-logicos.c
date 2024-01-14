#include <stdio.h>
//NOS PERMITE COMPARAR GRUPOS DE ELEMENTOS
int main(int argc,char *argv[]){
    //AND se tienen que cumplir todos
    printf("dime si es cierto: %i \n",( 4>3 && 3>2 && 2>1));
    printf("dime si es cierto: %i \n",( 4>3 && 3>2 && 2>2));
    //OR solo se tiene que cumplir uno
    printf("dime si es cierto: %i \n",( 4>3 || 3>2 || 2>1));
    printf("dime si es cierto: %i \n",( 4>3 || 3>2 || 2>2));
    printf("dime si es cierto: %i \n",( 4>3 || 3>3 || 2>2));
    printf("dime si es cierto: %i \n",( 4>4 || 3>3 || 2>2));
    
    return 0;
}