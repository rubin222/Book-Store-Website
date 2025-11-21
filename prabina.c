#include<stdio.h>
int main (){
    float breadth,length,area;

 printf("Enter value for length:");
 scanf("%f",&length); 
 printf("Enter value for breadth:");
 scanf("%f",&breadth); 
 
 area=length*breadth;
 printf("area is:%f",area);
 return 0;
}