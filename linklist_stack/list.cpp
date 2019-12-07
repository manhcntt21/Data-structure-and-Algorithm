#include <stdio.h>
#include <stdlib.h>
#include "list.h"
#include <bits/stdc++.h>


list_datatype *list;
int number_element = 0;
void init_list() {
	list = (list_datatype*)malloc(sizeof(list_datatype));
	list->first = NULL;
	list->last = NULL;
}
void insert_head_node(int x) {
	Node *newnode = (Node*)malloc(sizeof(Node));
	newnode->data = x;
	if(list->first == NULL) {
		list->first = newnode;
		list->last = newnode;
		number_element++;
	} else {
		newnode->next = list->first;
		list->first = newnode;
		number_element++;
	}
}
void insert_last_node(int x) {
	Node *newnode = (Node*)malloc(sizeof(Node));
	Node *temperate = (Node*)malloc(sizeof(Node));
	newnode->data = x;
	if(list->last == NULL) {
		list->last = newnode;
		list->first = newnode;
		number_element++;
	} else {
		temperate = list->last;
		temperate->next = newnode;
		list->last = newnode;
		number_element++;
	}
}

void insert_middle_node(int x, int location) {
	// neu vi tri can chen la 1 thi thanh chen dau, nen can location >= 2 moi chen dc

	if(number_element < 2 || location < 2 || location >= number_element) {
		printf("ERORR INSERT\n");
		exit(1);
	}
	int count_element = 1;
	Node *newnode = (Node*)malloc(sizeof(Node));
	newnode->data = x;
	Node *temperate = list->first;
	while(count_element != location - 1) {
		temperate = temperate->next;
		count_element++;
	}
	newnode->next = temperate->next;
	temperate->next = newnode;
	number_element++;
}

void delete_head() {
	Node *temperate = list->first;
	list->first = temperate->next;
	number_element--;
	free(temperate);
}
void delete_last() {
	Node *temperate1 = list->first;
	Node *temperate2 = list->first;
	while(temperate1->next != NULL) {
		temperate2 = temperate1;
		temperate1 = temperate1->next;
	}
	temperate2->next = NULL;
	list->last = temperate2;
	number_element--;
	free(temperate1);
}
void delete_middle_node(int location) {
	if(number_element < 2 || location < 2 || location >= number_element) {
		printf("ERORR DELETE\n");
		exit(1);
	}
	int count_element = 1;
	Node *temperate1 = list->first;
	Node *temperate2 ;
	while(count_element != location - 1) {
		temperate1 = temperate1->next;
		count_element++;
	}
	temperate2 = temperate1->next;
	temperate1->next = temperate2->next;
	number_element--;
	free(temperate2);

}
void display_list() {
	Node *tmp = list->first;
	while(tmp) {
		// printf("%p %d ",tmp,tmp->data);
		printf("%d ",tmp->data);
		tmp = tmp->next;
	}
	printf("\nnumber_element = %d",number_element );
	printf("\n");
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

Node_Poly* creat_node(int coeff, int pow) {
	Node_Poly *temporary = (Node_Poly*)malloc(sizeof(Node_Poly));
	if(!temporary) {
		printf("OVERFLOW STACK\n");
		exit(1);
	}
	temporary->coeff = coeff;
	temporary->pow = pow;
	temporary->next = NULL;
	return temporary;
}
void add_node_poly(Poly *_Poly,Node_Poly *node){
	Node_Poly *temporary ;
	if(_Poly->head == NULL) {
		_Poly->head = node;

	}
	else {
		temporary = _Poly->head;
		// duyet den phan tu cuoi cung cua list
		while(temporary->next != NULL) {
			temporary = temporary->next;
		}
		temporary->next = node;
	}
}

void add_list_poly(List_Poly *_List_Poly,Poly *_Poly){
	Poly *temporary ;
	if(_List_Poly->head == NULL) {
		_List_Poly->head = _Poly;

	}
	else {
		temporary = _List_Poly->head;
		// duyet den phan tu cuoi cung cua list
		while(temporary->next != NULL) {
			temporary = temporary->next;
		}
		temporary->next = _Poly;
	}
}

void display_polynominal(Poly _Poly) {
	Node_Poly *temporary = _Poly.head;
	// printf("aaaaaaaaaaa\n");
	while(temporary->next!=NULL) {
		printf("%dxX^%d + ",temporary->coeff, temporary->pow);
		temporary = temporary->next;
	}
	printf("%dxX^%d ",temporary->coeff, temporary->pow);
	printf("\n");
}

int min(int a, int b) {
	return a > b ? b : a;
}
int max(int a, int b) {
	return a < b ? b : a;
}

void add_two_polynominal(Poly _Poly1, Poly _Poly2, Poly *_Poly3) {
	Node_Poly *temporary1 = _Poly1.head;
	Node_Poly *temporary2 = _Poly2.head;
	while(temporary1!= NULL && temporary2 != NULL) {
		if(temporary1->pow > temporary2->pow) {
			Node_Poly *a = (Node_Poly*)malloc(sizeof(Node_Poly));
			a->pow = temporary1->pow;
			a->coeff = temporary1->coeff;
			temporary1 = temporary1->next;
			add_node_poly(_Poly3,a);
		} else if (temporary1->pow < temporary2->pow) {
			Node_Poly *a = (Node_Poly*)malloc(sizeof(Node_Poly));
			a->pow = temporary2->pow;
			a->coeff = temporary2->coeff;
			temporary2 = temporary2->next;
			add_node_poly(_Poly3,a);
		} else {
			Node_Poly *a = (Node_Poly*)malloc(sizeof(Node_Poly));
			a->pow = temporary2->pow;
			a->coeff = (temporary2->coeff + temporary1->coeff);
			temporary2 = temporary2->next;
			temporary1 = temporary1->next;
			add_node_poly(_Poly3,a);
		}
	}
	// nghia la temporary2 van con
	if(temporary1 == NULL) {
		while(temporary2 != NULL) {
			add_node_poly(_Poly3,temporary2);
			temporary2 = temporary2->next;
		}
	}

	// nghia la temporary1 van con
	if(temporary2 == NULL) {
		while(temporary1 != NULL) {
			add_node_poly(_Poly3,temporary1);
			temporary1 = temporary1->next;
		}
	}
}
// add voi 2 poly la con tro
void add_two_polynominal_2(Poly *_Poly1, Poly *_Poly2, Poly *_Poly3) {
	Node_Poly *temporary1 = _Poly1->head;
	Node_Poly *temporary2 = _Poly2->head;
//	printf("%d",temporary2->next->pow);
	while(temporary1!= NULL && temporary2 != NULL) {
		if(temporary1->pow > temporary2->pow) {
			Node_Poly *a = (Node_Poly*)malloc(sizeof(Node_Poly));
			a->pow = temporary1->pow;
			a->coeff = temporary1->coeff;
			temporary1 = temporary1->next;
			add_node_poly(_Poly3,a);
		} else if (temporary1->pow < temporary2->pow) {
			Node_Poly *a = (Node_Poly*)malloc(sizeof(Node_Poly));
			a->pow = temporary2->pow;
			a->coeff = temporary2->coeff;
			temporary2 = temporary2->next;
			add_node_poly(_Poly3,a);
		} else {
			Node_Poly *a = (Node_Poly*)malloc(sizeof(Node_Poly));
			a->pow = temporary2->pow;
			a->coeff = (temporary2->coeff + temporary1->coeff);
			temporary2 = temporary2->next;
			temporary1 = temporary1->next;
			add_node_poly(_Poly3,a);
		}
	}
	// nghia la temporary2 van con
	if(temporary1 == NULL) {
		while(temporary2 != NULL) {
			add_node_poly(_Poly3,temporary2);
			temporary2 = temporary2->next;
		}
	}

	// nghia la temporary1 van con
	if(temporary2 == NULL) {
		while(temporary1 != NULL) {
			add_node_poly(_Poly3,temporary1);
			temporary1 = temporary1->next;
		}
	}

}

int length_poly(Poly _Poly) {
	Node_Poly *a = _Poly.head;
	int length = 0;
	while(a!=NULL) {
		a = a->next;
		length++;
	}
	return length;
}

void multiple_two_polynominal(Poly _Poly1, Poly _Poly2, Poly *_Poly3) {
	// printf("%d\n",length_poly(_Poly1));
	// printf("%d\n",length_poly(_Poly2));
	int min_pow = min(_Poly1.head->pow,_Poly2.head->pow);
	List_Poly lp;
	lp.head = NULL;
	// tao cac don thuc con
	if(min_pow == _Poly1.head->pow ) {
		Node_Poly *a = _Poly1.head;
		while(a!=NULL) {
			Poly *tmp = (Poly*)malloc(sizeof(Poly));
			tmp->head = NULL;
			Node_Poly *b = _Poly2.head;
			// da thuc poly2 nhan voi nhan tu dau tien cua da thuc poly1
			while(b!=NULL) {
                Node_Poly *c = (Node_Poly*)malloc(sizeof(Node_Poly));
				c->coeff = (b->coeff)*(a->coeff);
				c->pow = (b->pow)+(a->pow);
				b = b->next;
				add_node_poly(tmp,c);
			}
			add_list_poly(&lp,tmp);
			a = a->next;
		}
	}
	else if( min_pow == _Poly2.head->pow) {
		Node_Poly *a = _Poly2.head;
		while(a!=NULL) {
			Poly *tmp = (Poly*)malloc(sizeof(Poly));
			tmp->head = NULL;
			Node_Poly *b = _Poly1.head;
			// da thuc poly2 nhan voi nhan tu dau tien cua da thuc poly1
			while(b!=NULL) {
                Node_Poly *c = (Node_Poly*)malloc(sizeof(Node_Poly));
				c->coeff = (b->coeff)*(a->coeff);
				c->pow = (b->pow)+(a->pow);
				b = b->next;
				add_node_poly(tmp,b);
			}
			add_list_poly(&lp,tmp);
			a = a->next;
		}
	}

//test ket qua cua cai tren
	Poly *aa = lp.head;
    printf("\\\\\\\\\\\\\\\\\n");
	while(aa!=NULL) {
        Node_Poly *temporary = aa->head;
        while(temporary->next!=NULL) {
            printf("%dxX^%d + ",temporary->coeff, temporary->pow);
            temporary = temporary->next;
        }
        printf("%dxX^%d ",temporary->coeff, temporary->pow);
        printf("\n");
        aa = aa->next;
	}
//

//	 gio cong cac da thuc con lai voi nhau
	Poly *aaaa = lp.head;
	Poly b_b;
	b_b.head = NULL;
    add_two_polynominal_2(aaaa,aaaa->next,&b_b);
//    display_polynominal(b_b);
    aaaa = aaaa->next;
    aaaa = aaaa->next;
     while(aaaa!=NULL) {
        add_two_polynominal_2(&b_b,aaaa,&b_b);
        aaaa = aaaa->next;
     }
//    display_polynominal(b_b);

}

int main() {
	// init_list();
	// printf("CHEN VAO DAU DANH SACH\n");
	// insert_head_node(2);
	// insert_head_node(3);
	// insert_head_node(4);
	// display_list();
	// printf("CHEN VAO SAU DANH SACH\n");
	// insert_last_node(1);
	// insert_last_node(2);
	// insert_last_node(3);
	// insert_last_node(4);
	// insert_last_node(5);
	// // printf("%p\n",list->last->next->next->next);
 //    display_list();
	// printf("CHEN VAO GIUA DANH SACH\n");
 //    insert_middle_node(10,3);
 //    insert_middle_node(20,3);
 // //    insert_middle_node(50,9);
 //    display_list();
	// printf("XOA DAU DANH SACH\n");
	// delete_head();
	// delete_head();
	// delete_head();
	// delete_head();
	// delete_head();
	// display_list();
	// printf("XOA CUOI DANH SACH\n");
	// delete_last();
	// delete_last();
	// display_list();
	// printf("XOA GIUA DANH SACH\n");
	// delete_middle_node(2);
	// // delete_middle_node(2);
	// display_list();
 //    free(list);
	Poly l1,l2,l_resul,l_multiple_resul;
	l1.head = NULL;
	l2.head = NULL;
	l_resul.head = NULL;
	l_multiple_resul.head = NULL;
	Node_Poly *a1 = creat_node(2,2);
	Node_Poly *a2 = creat_node(4,1);
	Node_Poly *a3 = creat_node(3,0);
	add_node_poly(&l1,a1);
	add_node_poly(&l1,a2);
	add_node_poly(&l1,a3);
	display_polynominal(l1);

	Node_Poly *a4 = creat_node(3,6);
	Node_Poly *a5 = creat_node(4,1);
    Node_Poly *a6 = creat_node(3,0);
	add_node_poly(&l2,a4);
	add_node_poly(&l2,a5);
    // add_node_poly(&l2,a6);
	display_polynominal(l2);
	add_two_polynominal(l1,l2,&l_resul);
	display_polynominal(l_resul);
    multiple_two_polynominal(l1,l2,&l_multiple_resul);
	free(a1);
	free(a2);
	free(a3);
	free(a4);
	free(a5);
    free(a6);
	return 0;
}

