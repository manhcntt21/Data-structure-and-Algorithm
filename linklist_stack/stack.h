typedef struct stack_node {
	int data;
	struct stack_node *next;
}stack_node;

typedef struct _stack {
	stack_node *top;
}Stack;

void stack_construction(Stack *stack);
void stack_destroy(Stack *stack);
int is_stack_empty(Stack *stack);
void stack_pop(Stack *stack);
void stack_push(Stack *stack, int data);
void stack_full();
void display_stack(Stack *stack);

