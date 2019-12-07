typedef struct doubly_node {
	int data;
	struct doubly_node *next;
	struct doubly_node *prev;
}doubly_node;

typedef struct list_datatype {
	doubly_node *head;
	doubly_node *tail;
}list_datatype;


void init_list(list_datatype *list);
void insert_node(list_datatype *list, int x);
// xoa dau
void delete_node(list_datatype *list);