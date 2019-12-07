#include <stdio.h>
#include "stack.h"
#include <stdlib.h>
#include <string.h>
#include <string>
#include <iostream>
using namespace std;

// doan khai bao nay su dung voi char 


// typedef struct stack_node {
// 	char data;
// 	struct stack_node *next;
// }stack_node;

// typedef struct _stack {
// 	stack_node *top;
// }Stack;

// void stack_construction(Stack *stack);
// void stack_destroy(Stack *stack);
// int is_stack_empty(Stack *stack);
// void stack_pop(Stack *stack);
// void stack_push(Stack *stack, char data);
// void stack_full();
// void display_stack(Stack *stack);

void stack_construction(Stack *stack) {
	if(!stack) {
		printf("ERORR ALLOCATION MEMORY\n");
		exit(1);
	}
	stack->top = NULL;
}

void stack_destroy(Stack *stack) {
	stack_node *temperate;
	while(!is_stack_empty(stack)) {
		temperate = stack->top;
		stack->top = temperate->next;
		free(temperate);
	}
}

void stack_pop(Stack *stack) {
	if(is_stack_empty(stack)) {
		printf("STACK RONG\n");
		exit(1);
	} else {
		stack_node *temperate = stack->top;
		stack->top = temperate->next;
		free(temperate);
	}
}

void stack_push(Stack *stack, int data) {
	stack_node *temperate = (stack_node*)malloc(sizeof(stack_node));
	if(!temperate) {
		stack_full();
		exit(1);
	}
	temperate->data = data;
	temperate->next = stack->top;
	stack->top = temperate;
}

void stack_full() {
	printf("NO MEMORY, STACK IS FULL\n");
}
int is_stack_empty(Stack *stack) {
	return (stack->top == NULL);
}

void display_stack(Stack *stack) {
	stack_node *temperate;
	if(is_stack_empty(stack)) {
		printf("STACK RONG\n");
		exit(0);
	} else {
		temperate = stack->top;
		// printf("%d\n",temperate->data);
		// temperate = temperate->next;
		// printf("%d\n",temperate->data);
		while(temperate != NULL) {
			printf("%d\n",temperate->data);
            // cin>> temperate->data;
			temperate = temperate->next;
		}
	}
}


int main(int argc, char const *argv[])
{
	Stack s;
	stack_construction(&s);
	printf("STACK PUSH\n");
	stack_push(&s,1);
	stack_push(&s,2);
	stack_push(&s,3);
	stack_push(&s,4);
	stack_push(&s,5);
	stack_push(&s,6);
	display_stack(&s);
	// printf("STACK POP\n");
	// stack_pop(&s);
	// stack_pop(&s);
	// display_stack(&s);
	// printf("DESTROY STACK\n");
	// stack_destroy(&s);
	// display_stack(&s);

	// compute exponet = stack
	// printf("%lf",pow(2,10));
 //    int t;
 //    string s[1001];
 //    scanf("%d",&t);
	// for(int i = 0 ; i < t ; i ++) {
	// 	cin >> s[i];
	// }
	// for(int i = 0 ; i < t ; i ++) {
 //        printf("%d\n", check_parenthesis(s[i]));
	// }
	// bo thu vien stack.h di
	// de submit
	return 0;
}



// double pow(int x, int n) {
// 	Stack s;
// 	stack_construction(&s);
// 	while( n > 0) {
// 		stack_push(&s,n);
// 		n = n/2;
// 	}
// 	double tmp = 1;
// 	int a;
// 	while(!is_stack_empty(&s)) {
// 		a = s.top->data;
// 		stack_pop(&s);
// 		if(a&1) tmp = tmp*tmp*x;
// 		else tmp = tmp*tmp;
// 	}
// 	return tmp;
// }

 // int check_parenthesis(string s) {
 // 	Stack sa;
 // 	stack_construction(&sa);
 // 	int length = s.size();
 //    for(int i = 0 ; i < length ;i++) {
 //        stack_push(&sa,s[i]);
 //        if(sa.top->data == ')') {
 //            if( sa.top->next->data == '(') {
 //                stack_pop(&sa);
 //                stack_pop(&sa);
 //            } else return 0;
 //        } else if(sa.top->data == ']') {
 //            if( sa.top->next->data == '[') {
 //                stack_pop(&sa);
 //                stack_pop(&sa);
 //            } else return 0;
 //        } else if(sa.top->data == '}') {
 //            if( sa.top->next->data == '{') {
 //                stack_pop(&sa);
 //                stack_pop(&sa);
 //            } else return 0;
 //        }
 //    }
 //    return 1;
 // }