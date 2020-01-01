#include <bits/stdc++.h>
using namespace std;
/*
    Bianry tree
    1 thu tu giua
    2 thu tu truoc
    3 thu tu sau
    4 thu tu muc level
    5 free cay
    6 dem so node
    7 tinh do sau
    8 dem so nut la cua cay
    9 dem so node la co gia tri chan
    10 dem so node la co gia tri lon hon k
    11duong di dai nhat trong cay

*/


typedef struct node {
    int data;
    struct node *left;
    struct node *right;
}node;

int deepth_tree(node *root);

node* create_node(int data) {
    node *root = (node*)malloc(sizeof(node));
    root->data = data;
    root->left = NULL;
    root->right = NULL;
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
    node *k = create_node('K');
    node *j = create_node('J');
    node *l = create_node('L');


    // link notes

    h->left = d;
    h->right= k;

    d->left = b;
    d->right = f;

    k->left = j;
    k->right = l;

    b->left = a;
    b->right = c;

    f->right = e;

    return h;
    
//    node *a = create_node('A');
//    node *b = create_node('B');
//    node *c = create_node('C');
//    node *d = create_node('D');
//    node *e = create_node('E');
//    node *f = create_node('F');
//    node *g = create_node('G');
//    node *h = create_node('H');
//    node *i = create_node('I');
//    node *j = create_node('J');
//    node *k = create_node('K');
//    node *l = create_node('L');
//    node *m = create_node('M');
//    node *n = create_node('N');
//    node *o = create_node('0');
//
//    a->left = b;
//    a->right = c;
//    b->left = d;
//    b->right = e;
//    c->right = f;
//    d->left = g;
//    d->right = h;
//    e->right = i;
//    h->left = j;
//    i->left = k;
//    i->right = l;
//    j->left = m;
//    j->right = n;
//    l->right = o;
//
//    return a;
}


void preOrder(node *root) {
    if(root != NULL) {
        printf("%c  ",root->data);
        preOrder(root->left);
        preOrder(root->right);
    }

}


void inOrder(node *root) {
    if(root != NULL) {
        inOrder(root->left);
        printf("%c  ",root->data);
        inOrder(root->right);
    }

}

void postOrder(node *root) {
    if(root != NULL) {
        postOrder(root->left);
        postOrder(root->right);
        printf("%c  ",root->data);
    }
}


void my_level_order(node* root, int lvl)
    {
        if (!root)  return;
        if (lvl==1) {
            printf("%c ",root->data);
        }
        else
        {
            my_level_order(root->left, lvl-1);
            my_level_order(root->right, lvl-1);
        }
    }

void levelOrder(node * root) {
    int h = deepth_tree(root);
    for(int i = 1 ; i <= h ; i++) {
        my_level_order(root,i);
    }
}


void free_tree(node *root) {
    if (root == NULL) {
        return;
    }
    free_tree(root->left);
    free_tree(root->right);
    free(root);
}

int countNodes(node *root) {
    /*
        dem so note cua cay
    */
    if( root == NULL) return 0;
    else {
        int ld = countNodes(root->left);
        int rd = countNodes(root->right);
        return 1 + ld + rd;
    }
}

int deepth_tree(node *root) {
    /*
        tinh do sau cau cay
    */
    if(root == NULL ) return 0;
    else {
        int ld = deepth_tree(root->left);
        int rd = deepth_tree(root->right);
        return 1 + ( ld > rd ? ld : rd) ;
    }
}
int count_ = 0;
int countLeaf(node *root) {
/*
    dem so nut la cua cay
*/
    if( root == NULL) {
        return 0;
    }
    else {
        int ld = countLeaf(root->left);
        int rd = countLeaf(root->right);
        if( ld == 0 && rd == 0) {
            count_ ++;
        }
    }
    return count_;
}

int count_1 = 0;
int count_notLeaf(node *root) {
/*
    dem so nut khong la cua cay
*/
    if( root == NULL || ( root->left == NULL && root->right == NULL)) {
        return 0;
    }
    else {
        int ld = count_notLeaf(root->left);
        int rd = count_notLeaf(root->right);
        return 1 + ld + rd;
        }
    return count_1;
}


void t1(node *root) {
    if(root != NULL ) {
        printf("%c",root->data);
        t1(root->left);
        t1(root->right);
        printf("%c",root->data);
    }
}


int evenleaf(node *root) {
    /*
        dem so leaf co gia tri chan
    */

    if( root == NULL) {
        return 0;
    } 
    else if ( root->left == NULL && root->right == NULL) {
        if(root->data%2 == 0) {
//            printf("%c ",root->data);
            return 1;
        } else return 0;
    }
    else {
//        printf("%d ",root->data);
        int ld = evenleaf(root->left);
        int rd = evenleaf(root->right);
        return ld + rd; 
    }
}

int countLeaf(node *root, int k) {
    // dem so nut co gia tri lon hon k
    if( root == NULL) {
        return 0;
    }
    else {
//        printf("%d ",root->data);
        int ld = countLeaf(root->left,k);
        int rd = countLeaf(root->right,k);
        if(root->data > k) {
            return 1 + ld + rd; 
        } else return 0;

    }
}

int bt_diag(node *root) {
    /*
    duong di dai nhat trong cay
    */
    if( root == NULL) {
        return 0;
    }
    else {
        int lheight = deepth_tree(root->left);
        int rheight = deepth_tree(root->right);

        int l_bt_diag = bt_diag(root->left);
        int r_bt_diag = bt_diag(root->right);

        return max(lheight + rheight + 1, max(l_bt_diag, r_bt_diag));
    }
}

int main() {
    node *root = create_tree();
    printf("Thu tu truoc\n");
    preOrder(root);
    printf("\n");
    printf("Thu tu giua\n");
    inOrder(root);
    printf("\n");
    printf("Thu tu sau\n");
    postOrder(root);
    printf("\n");
    printf("Thu tu level\n");
    levelOrder(root);
    printf("\nNumber of node = %d ", countNodes(root));
    printf("\nDeep tree = %d ", deepth_tree(root));
    printf("\nNumber of leaf = %d ", countLeaf(root));
    printf("\nNumber of not leaf = %d ", count_notLeaf(root));

    printf("\nExercise\n");
    t1(root);

    printf("\nLeaf, data even = ");
    printf("%d",evenleaf(root));

    printf("\nLeaf, data > k  : ");
    printf("%d",countLeaf(root,69));

    printf("\nDiameter of tree : %d", bt_diag(root));
    free_tree(root);
}

