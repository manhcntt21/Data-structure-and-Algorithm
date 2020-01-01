#include <bits/stdc++.h>

/*
 Tree General

+ preorder
+ postorder
+ inorder traversal dosenot have a natural definition, because there is no
particular number of children for an internal node

*/


typedef struct node {
    int data;
    struct node *left_most_child;
    struct node *right_subling;
}node;

node* create_node(int data) {
    node *root = (node*)malloc(sizeof(node));
    root->data = data;
    root->left_most_child = NULL;
    root->right_subling = NULL;
    return root;
}

node* create_tree() {
    node *a = create_node('A');
    node *b = create_node('B');
    node *c = create_node('C');
    node *d = create_node('D');
    node *e = create_node('E');
    node *f = create_node('F');
    node *g = create_node('G');
    node *h = create_node('H');
    node *i = create_node('I');
    node *j = create_node('J');

    // link notes

    a->left_most_child = b;
    b->right_subling = c;
    c->right_subling = d;

    c->left_most_child = e;
    e->right_subling = f;

    d->left_most_child = g;

    e->left_most_child = h;
    h->right_subling = i;

    f->left_most_child = j;

    return a;
}


void preOrder(node *root) {
    if(root != NULL) {
        printf("%c  ",root->data);
        preOrder(root->left_most_child);
        preOrder(root->right_subling);
    }

}
// chua nghi ra, cach duoi chi ap dung voi cay nhi phan.

//void inOrder(node *root) {
//    if(root != NULL) {
//        inOrder(root->left_most_child);
//        printf("%c  ",root->data);
//        inOrder(root->right_subling);
//    }
//
//}

void postOrder(node *root) {
    if(root != NULL) {
        postOrder(root->left_most_child);
        postOrder(root->right_subling);
        printf("%c  ",root->data);
    }
}

void free_tree(node *root) {
    if (root == NULL) {
        return;
    }
    free_tree(root->left_most_child);
    free_tree(root->right_subling);
    free(root);
}
int main() {
    node *root = create_tree();
    printf("Thu tu truoc\n");
    preOrder(root);
//    printf("\n");
//    printf("Thu tu giua\n");
//    inOrder(root);
    printf("\n");
    printf("Thu tu sau\n");
    postOrder(root);
    free_tree(root);
}

