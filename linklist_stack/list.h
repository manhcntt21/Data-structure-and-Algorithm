typedef struct node {
    int data;
    struct node *next;
}Node;
typedef struct list {
	Node *first;
	Node *last;
}list_datatype;
void init_list();
void insert_head_node(int x);
void insert_last_node(int x);
void insert_middle_node(int x, int location);
void delete_head();
void delete_last();
void display_list();
////////////////////////////
////////////////////////////
////////////////////////////
////////////////////////////
// add tow polynominal
typedef struct _node_poly
{
	int coeff;
	int pow;
	struct _node_poly *next;
}Node_Poly;

typedef struct _poly
{
	Node_Poly *head;
	struct _poly *next;
}Poly;

typedef struct list_poly
{
	Poly *head;
}List_Poly;

Node_Poly* creat_node(int coeff, int pow);
void add_node_poly(Poly *_Poly,Node_Poly *node);
void display_polynominal(Poly _Poly);
void add_two_polynominal(Poly _Poly1, Poly _Poly2, Poly *_Poly3);
int min(int a, int b);
int max(int a, int b);
void multiple_two_polynominal(Poly _Poly1, Poly _Poly2, Poly *_Poly3);
int length_poly(Poly _Poly);
void add_list_poly(List_Poly *_List_Poly,Poly *_Poly);
Poly convert_polycontro_to_poly_binhthuong(Poly *a);