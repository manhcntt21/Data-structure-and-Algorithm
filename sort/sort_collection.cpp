#include <bits/stdc++.h>
#define MAX 100
/*
con thieu may cai sort nua nhung khong biet thay co day khong
bo sung sau
*/
void print(int *a, int array_size);
void print(int *a, int left, int right);

void shuffle(int *array, size_t n)
{
    srand(time(0));
    if (n > 1)
    {
        size_t i;
        for (i = 1; i < n - 1; i++)
        {
          size_t j = i + rand() / (RAND_MAX / (n - i) + 1);
          int t = array[j];
          array[j] = array[i];
          array[i] = t;
        }
    }
}
// quicksort
void swap_(int *a, int *b) {
    int tmp = *a;
    *a = *b;
    *b = tmp;
}

int partition_(int *a, int left, int right) {
    int pivot = a[right];
    int i = left - 1;

    for(int j = left; j <= right - 1; j ++) {
        if(a[j] < pivot) {
            i++;
            swap_(&a[j],&a[i]);
        }
    }
    swap_(&a[i+1],&a[right]);
    return (i+1);
}

int quicksort(int *a, int left, int right) {
    int pivot_index;
    if(left < right) {
        int pivot_index = partition_(a, left, right);
        printf("%d\n",pivot_index);
        quicksort(a,left,pivot_index - 1);
        print(a,left,pivot_index-1);
        quicksort(a, pivot_index + 1, right);
        print(a,pivot_index-1, right);

    }

}
//

// merge sort

void merge_(int *a,int left, int mid, int right) {
	int length = right - left + 1;
	int tmp[right+1];
	int i = left; // dau cua nua trai
	int j = mid + 1; // dau cua nua phai;
	for(int k = left ; k <= right ;k++) {
		if(i > mid) {
			tmp[k] = a[j];
			j++;
		} else if(j > right) {
			tmp[k] = a[i];
			i++;
		} else {
                if(a[i] < a[j]) {
                tmp[k] = a[i];
                i++;
            } else if( a[i] > a[j]) {
                tmp[k] = a[j];
                j++;
            }
		}
	}
	for (int k = left; k <= right; k++)
	{
		a[k] = tmp[k];
	}

}

void merge_sort(int *a,int left, int right) {
	if( left < right) {
		int mid = (left + right)/2;
		merge_sort(a,left,mid);
		merge_sort(a,mid+1,right);
		merge_(a,left,mid,right);
	}
	print(a,left,right);
}

void print(int *a, int array_size) {
    for(int i = 0 ; i <  array_size ; i++) {
        printf("%-5d",a[i]);
    }
    printf("\n");
}
void print(int *a, int left, int right) {
    for(int i = left ; i <=  right ; i++) {
        printf("%-5d",a[i]);
    }
    printf("\n");
}
/*
    sap xep chen
*/
void inserttion_sort(int *a, int array_size) {
    int i,j, last;
    for(i = 1; i < array_size ; i++) {
        last = a[i];
        j = i;
        while((j > 0) && ( a[j-1] > last)) {
            a[j] = a[j-1];
            j = j - 1;
        }
        a[j] = last;
        print(a,array_size);
    }
}
/*
    sap xep lua chon
*/

void selection_sort(int *a, int array_size) {
    int i,j,min_,tmp;
    for(i = 0; i < array_size - 1 ; i++) {
        min_ = i;
        for( j = i + 1; j < array_size ; j++) {
            if(a[j] < a[min_]) {
                min_ = j;
            }
        }
        swap_(&a[i],&a[min_]);
        print(a,array_size);
    }
}

/*
    sap xep noi bot
*/

void bubble_sort(int *a, int array_size) {
    int i,j;
    for(i = array_size - 1; i >= 0; i--) {
        printf("i = %-10d\n",i);
        for( j = 1 ; j <= i ; j++) {
            if(a[j-1] > a[j]) {
                swap_(&a[j],&a[j-1]);
                print(a,array_size);
            }
        }
        printf("\n");
    }
}


/*
    sap xep vun dong
*/

int root_tree(int *a) {
    return a[1];
}

int left_child(int i) {
    return (i<<1);
}

int right_child(int i) {
    return 2*i+1;
}

int parent_node(int i) {
    return i<<1 + 1;
}

int heap_size(int length_A) {
    return length_A;
}

void max_heapify(int *a, int i, int heap_size) {
    int left, right,n;
    int largest;
    n = heap_size;
    left = left_child(i);
    right = right_child(i);
    if(left<= n && a[left] > a[i]) largest = left;
    else largest = i;
    if(right<=n && a[right] > a[largest]) largest = right;

    if(largest != i)  {
        swap_(&a[i],&a[largest]); // nghia la phan tu max la con trai hoac con phai
        max_heapify(a,largest,n);
    }

}

void min_heapify(int *a, int i, int heap_size) {
    int left, right,n;
    int smallest;
    n = heap_size;
    left = left_child(i);
    right = right_child(i);
    if(left<= n && a[left] < a[i]) smallest = left;
    else smallest = i;
    if(right<=n && a[right] < a[smallest]) smallest = right;

    if(smallest != i)  {
        swap_(&a[i],&a[smallest]); // nghia la phan tu max la con trai hoac con phai
        min_heapify(a,smallest,n);
    }

}

int length_A = 3; // la kich thuoc that cua heap, khong chua phan tu a[0] = 0 mac dinh
/*
    khoi phuc tinh chat dong cua ca cay O(logn)
*/
void build_max_heap(int *a) {
//    printf("%d",a[2]);
    int n = heap_size(length_A);
    int i;
    for(i = n/2 ; i>=1 ; i--) {
        max_heapify(a,i,n);
    }
}

void build_min_heap(int *a) {
    int n = heap_size(length_A);
    int i;
    for(i = n/2 ; i>=1 ; i--) {
        min_heapify(a,i,n);
    }
}

/*
    bat dau sap xep
*/

void heap_sort(int *a) {
//    build_max_heap(a);
    build_min_heap(a);
    int i;
    int n = heap_size(length_A);
    for(i = n; i>=2 ; i--) {
        swap_(&a[1],&a[i]);
//        max_heapify(a,1,i-1);
          min_heapify(a,1,i-1);
    }
}


/*
hang doi uu tien
*/
int N; // so luong phan tu trong hang doi uu tien
/*
    phai luon duy tri tinh chat dong
*/
void insert_element_queue_priority(int *a, int val) {
    length_A = length_A + 1;
    int i = length_A;
    a[i] = val;
    if(length_A >= 3) {
        build_max_heap(a);
    } else {
        max_heapify(a,1,length_A);
    }
}
/*
    tra lai phan tu lon nhat trong hang doi uu tien
*/
int max_priority_queue(int *a) {
    return a[1];
}


/*
    tra lai phan tu lon nhat va loai bo no ra khoi hang doi
*/
int extract_max_priority_queue(int *a) {
    if( length_A == 0) {
        printf("queue empty\n");
        return -1;
    } else {
        int tmp = a[length_A];
        swap_(&a[1], &a[length_A]);
        length_A = length_A - 1;
        build_max_heap(a);
        return a[length_A];
    }
}
/*
    tang khoa cua phan tu x(index) len gia tri  k
    suy ra k > x
*/
void increase_key(int *a,int x, int key) {
    // voi truong hop max
    if( key < x) {
        printf("khoa moi nho hon khoa hien tai\n");

    } else {
        a[x] = key;
        build_max_heap(a);
    }
}
int main() {
//    int a[MAX] = {10,-75,-100,0,71,-48,58,34,-70,-32};
//    int array_size = 10;
//    print(a,array_size);
//    inserttion_sort(a,array_size);
//    selection_sort(a,array_size);
//    bubble_sort(a,array_size);
//    merge_sort(a,0,array_size-1);
//    quicksort(a,0,array_size-1);

//    int A[MAX] = {0,4,1,3,2,16,9,10,14,8,7};
//    print(A,length_A + 1); // do bao gom phan tu dau tien  = 0
//    shuffle(A,length_A + 1);
//    print(A,length_A + 1);
//    heap_sort(A);
//    print(A,length_A+1);

    int a[MAX];
    a[0] = 0;
    a[1] = 10;
    a[2]  = 7;
    a[3] = 9;
    print(a,length_A+1);
    insert_element_queue_priority(a,15);
    print(a,length_A+1);
    printf("phan tu lon nhat trong hang doi uu tien %d\n", max_priority_queue(a));
    extract_max_priority_queue(a);
    print(a,length_A+1);
    extract_max_priority_queue(a);
    print(a,length_A+1);
    extract_max_priority_queue(a);
    print(a,length_A+1);
    extract_max_priority_queue(a);
    print(a,length_A+1);
    extract_max_priority_queue(a);

    insert_element_queue_priority(a,10);
    insert_element_queue_priority(a,7);
    insert_element_queue_priority(a,9);
    insert_element_queue_priority(a,15);
    print(a,length_A+1);
    increase_key(a,4,50);
    print(a,length_A+1);

    return 0;
}

