#include <stdio.h>


void conver(int n, int b) {
	if( n > 0) conver(n/b,b);
	printf("%d",n%b);
}

void func(int n) {
	if(n > 0) func(--n);
	printf("%d\n",n);
}
#define MAX 100
int a[MAX] ;
// khởi tạo 
int fib3(int n) {
    if (n < 3) return a[n];
    a[n] =  fib3(n - 1) + fib3(n - 2);
    return a[n];
}

int main(int argc, char const *argv[])
{	
	a[1] = 1, a[2] = 1;
	fib3(10);
	printf("%d\n",a[10]);
	return 0;
}