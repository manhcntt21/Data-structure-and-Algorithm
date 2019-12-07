/* build queue by array*/
#include<bits/stdc++.h>
#define N 10
int f = 0 ,r = 0;
int Q[N];
void contruction() {
	for (int i = 0; i < N; ++i)
	{
		Q[i] = -1;
	}
}
int size() {
	return (N - f + r )%N;
}

int is_full_queue() {
	return N - 1;
}

void enqueue(int x) {
	if(size() == N - 1) {
		printf("Queue FUll\n");
		exit(1);
	} else {
		Q[r] = x;
		r = (r + 1)%N;
		printf("r = %d \n", r);
	}
}

void display() {
	for(int i = f; i < r ; i ++) {
		printf("%d\n",Q[i]);
	}
}

int main(int argc, char const *argv[])
{
	/* code */
	contruction();
	enqueue(1);
	enqueue(2);
	enqueue(3);
	enqueue(4);
	enqueue(5);
	enqueue(6);
	enqueue(7);
	enqueue(8);
	enqueue(9);
	enqueue(10);
	display();
	return 0;
}