#include <bits/stdc++.h>

/* cai dat danh sach bang mang*/

#define MAXLEN 6

typedef struct LIST
{
	int elements[MAXLEN];
	int last; // vi tri cua phan tu cuoi cung
}list_type;
list_type L;
// initialization
void initialization() {
	// ban dau danh sach co 1 phan tu 0 o dau tien
	L.last = 0;
	for(int i = 0 ; i < MAXLEN ; i++) {
		L.elements[i] = 0;
	}
}
// insert value x into index p
void insertion(int x, int p) {
	if(L.last >= MAXLEN - 1) {
		printf("array overflow\n");
		// return; // de ham ket thuc "dot tu"
	} else {
		if(p > L.last || p < 0) {
			printf("index not valid\n");
			// return;
		} else {
			L.last++;
			for(int q = L.last; q > p ; q--) {
				L.elements[q] = L.elements[q-1];
			}
			L.elements[p] = x;
		}
	}
}
// delete
//  vi tri p
void deletion(int p) {
	if( p >= MAXLEN || p > L.last || p < 0) {
		printf("index is not valid\n");
	} else {
		for(int q = p ; q <= L.last - 1 ; q++) {
			L.elements[q] = L.elements[q+1];
		}
		L.last--;
	}
}

// display
void display() {
	for(int i = 0 ; i <= L.last ; i++) {
		printf("%d ",L.elements[i]);
	}
	printf("\n");
}

int location(int value) {
	for(int i = 0 ; i <= L.last ; i++) {
		if( L.elements[i] == value) return i;
	}
	return -1;
}

int main(int argc, char const *argv[])
{
	initialization();
	insertion(1,0);	
	insertion(2,0);
	insertion(3,0);		
	insertion(4,0);		
	insertion(5,0);		
	display();
	// deletion(5);
	display();
	printf("%d\n",location(-1));
	return 0;
}