#include <stdio.h>
#include <stdlib.h>
#include "doublylinklist.h"

void init_list(list_datatype *list) {
	list->head = list->tail = NULL;
} 

void insert_node(list_datatype *list, int x) {
	doubly_node *temperate = (doubly_node*)malloc(sizeof(doubly_node));
	temperate->data = x;
	if(list->head == NULL) {
		list->head = temperate;
		temperate->prev = NULL;
		list->tail = temperate;
		temperate->next = NULL;
	} else if (list->tail == NULL){
		list->head = temperate;
		temperate->prev = NULL;
		list->tail = temperate;
		temperate->next = NULL;
	} else {
		//chen dau
		temperate->next = list->head;
		list->head->prev = temperate;
		list->head = temperate;
		temperate->prev = NULL;

	}
}
// xoa dau
void delete_node(list_datatype *list) {
	doubly_node *temperate = list->head;
	list->head = temperate->next;
	list->head->prev = NULL;
	free(temperate); 	
}

void display(list_datatype list) {
	doubly_node *temperate = list.head;
	while(temperate!=NULL) {
		// printf("%p %d ",temperate, temperate->data);
		printf("%d ",temperate->data);
		temperate = temperate->next;
	}
	printf("\n");
}

void display_invert(list_datatype list) {
	doubly_node *temperate = list.tail;
	while(temperate!=NULL) {
		// printf("%p %d ",temperate, temperate->data);
		printf("%d ",temperate->data);
		temperate = temperate->prev;
	}
	printf("\n");
}

int main(int argc, char const *argv[])
{
	list_datatype list;
	init_list(&list);
	insert_node(&list,1);
	insert_node(&list,2);
	insert_node(&list,3);
	insert_node(&list,6);
	insert_node(&list,7);
	insert_node(&list,8);
	insert_node(&list,9);
	insert_node(&list,10);
	display(list);
	display_invert(list);
	delete_node(&list);
	delete_node(&list);
	delete_node(&list);
	delete_node(&list);
	delete_node(&list);
	display(list);
	display_invert(list);
	return 0;
}