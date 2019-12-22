#include <bits/stdc++.h>
#define MAX 100



/*
    sap xep chen
*/
void print(int *a, int array_size) {
    for(int i = 0 ; i <  array_size ; i++) {
        printf("%-5d",a[i]);
    }
    printf("\n");
}
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
    }
}

/*
    day phai duoc sap xep theo thu tu khong giam (tang dan co the bang nhau)
    phai cho phep truy cap truc tiep, suy ra khong ap dung voi danh sach lien ket don

*/

int binary_search_(int *a, int size_, int value_target) {
/*
    cach dung vong lap
    logn
*/
    int lower, upper, mid;
    lower = 0;
    upper = size_ - 1;
    while(lower <= upper) {
        mid = (lower + upper)/2;
        if(value_target > a[mid] ) {
            lower = mid + 1;
        } else if (value_target < a[mid]) {
            upper = mid - 1;
        } else {
            return mid;
        }
    }
    return -1;
}

int binary_search_(int *a, int lower, int upper, int value_target) {
/*
    cach dung de quy
    logn
*/

//    printf("\n%d %d\n", lower, upper);
    if( lower > upper) {
        return -1;
    }

    int mid;
    mid = (lower + upper)/2;
    if( value_target < a[mid]) {
        return binary_search_(a,0,mid-1,value_target);
    } else if ( value_target > a[mid]) {
        return binary_search_(a,mid+1,upper,value_target);
    } else {
        return mid;
    }
}




/*
    binary search tree
*/

typedef struct node {
    int data;
    struct node *left;
    struct node *right;
    struct node *parent;
}node;

node* create_node(int data) {
    node *root = (node*)malloc(sizeof(node));
    if(root == NULL) {
        printf("\nERORR ALLOCATE");
        exit(1);
    }
    root->data = data;
    root->left = NULL;
    root->right = NULL;
    root->parent = NULL;
    return root;
}

void inOrder(node *root) {
    if(root != NULL) {
        inOrder(root->left);
        printf("%d  ",root->data);
        inOrder(root->right);
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

node* create_tree() {
    node *a_ = create_node(50);
    node *b = create_node(30);
    node *c = create_node(55);
    node *d = create_node(25);
    node *e = create_node(35);
    node *f = create_node(53);
    node *g = create_node(60);
    node *h = create_node(10);
    node *i = create_node(31);
    node *k = create_node(37);
    node *j = create_node(62);
    node *l = create_node(20);
    node *m = create_node(23);
    //link
    a_->parent = NULL;
    a_->left =  b;
    a_->right = c;
    b->parent = a_;
    c->parent = a_;

    b->left = d;
    b->right = e;
    d->parent = b;
    e->parent = b;

    c->left = f;
    c->right = g;
    f->parent = c;
    f->parent = c;

    d->left = h;
    h->parent = d;

    e->left = i;
    e->right = k;
    i->parent = e;
    k->parent = e;

    g->right =j;
    j->parent = g;

    h->right = l;
    l->parent = h;

    l->right = m;
    m->parent = l;
    return a_;
}

node* find_min(node *root) {
    if(root == NULL) {
        return (NULL);
    } else {
        if(root->left == NULL) return root;
        else return find_min(root->left);
    }
}

node* find_max(node *root) {
    if(root == NULL) {
        return (NULL);
    } else {
        if(root->right == NULL) return root;
        else return find_max(root->right);
    }
}

int successor(node *root, node *x) {
    if(x->right != NULL) {
        node *tmp = find_min(x->right);
        return tmp->data;
    }

    // neu no khong co cay con phai
    // thi tim to tien gan nhau co cay con trai la no
    // hoac to tien gan nhat co cay con trai
    node *p = x->parent;
    while(p != NULL && p->right == x) {
        x = p;
        p = x->parent;
    }
    return p->data;
}

int predecessor(node *root, node *x) {
    if(x->left != NULL) {
        node *tmp = find_max(x->left);
        return tmp->data;
    }

    // neu no khong co cay con phai
    // thi tim to tien gan nhau co cay con trai la no
    // hoac to tien gan nhat co cay con trai
    node *p = x->parent;
    while(p != NULL && p->left == x) {
        x = p;
        p = x->parent;
    }
    return p->data;
}
/*
    chinh la binary search
*/
node* search_(node *root, int target) {
//    int flag = 0;
    if(root != NULL) {
        if(target < root->data) {
            return search_(root->left, target);
        } else if( target > root->data) {
            return search_(root->right, target);
        } else {
            return root;
        }
    }
    return NULL;
}

void search_result(node *root, int target) {
    node *tmp2 = search_(root,target);
    if(tmp2 != NULL) {
        printf("founded");
    } else {
        printf("not founded");
    }
    printf("\n");
}

/*
    thac tac insert
    phai dam bao van la cay bst
*/

node* insert_bst(node *root, int value) {
    if( root == NULL) {
        root = create_node(value);
    } else if ( value > root->data) {
        root->right = insert_bst(root->right, value);
        /* update pararen cho node them vao do
            se bi trung lap vs cai node truoc do
            nhung khong sao
        */
        root->right->parent = root;
    } else if ( value < root->data) {
        root->left = insert_bst(root->left, value);
        root->left->parent = root;
    }
    return root;
}
/*
    thao tac delete, khi loai bo 1 node can dam bao cay van la bst
    4 truong hop
    thu nhat: node can loai bo la node leaf
    thu hai: chi co con trai
    thu ba: chi co con phai
    thu 4: co ca 2 con

*/

node* delete_bst(node *root,int value) {
    node *tmp;
    if( value > root->data) {
        root->right = delete_bst(root->right, value);
    } else if ( value < root->data) {
        root->left = delete_bst(root->left, value);
    } else if( root->left && root->right) {
        /* node co 2 con, roi vao truong hop 4
            tim sucessor y cua node can xoa x
            go y ra khoi cay
            noi con con phai cua y vao cha cua y (VI SUCCESSOR CUA NO LA PHAN TU TRAI NHAT ROI,
             NEN NEU CO, THI CHI CO THE CO CON PHAI THOI)
            thay the y vao vi tri can xoa
        */
        tmp = find_min(root->right);
        root->data = tmp->data;
        root->right = delete_bst(root->right, tmp->data);
    }
    else{
        /*den day la tim duoc vi tri can xoa roi*/
        /* truong hop 1-3`*/
        tmp = root;
        /* node CHI CO con phai, hoac khong co con*/
        if(tmp->left == NULL) {
            root = root->right;
        } else if ( tmp->right == NULL) {
        /* node co 1 con trai*/
            root = root->left;
        }
        free(tmp);
        return root;
    }

}

void delete_bst_result(node *root, int value) {
    if( search_(root, value)) {
        delete_bst(root, value);
    } else {
        printf("\nnode not exist");
    }
}


int main() {
/**
    int a[MAX] = {20,4,1,3,2,16,9,10,14,8,7};
    int size_ = 10;
    inserttion_sort(a,size_);
    print(a,size_);
    int value_target = 16;
    printf("%d\n", binary_search_(a,size_,value_target));
    // recursive
    printf("%d", binary_search_(a,0,size_,value_target));
*/

/**
    node *root = create_tree();

    node *tmp = find_min(root);
    printf("\nmin tree bst = %d",tmp->data);
    node *tmp1 = find_max(root);
    printf("\nmax tree bst = %d",tmp1->data);
    printf("\nsuccessor: ");
    printf("%d ---> %d ",root->left->left->left->right->right->data,successor(root,root->left->left->left->right->right));
    printf("\npredecessor: ");
    printf("%d ---> %d ",root->left->left->left->right->right->data,predecessor(root,root->left->left->left->right->right));
    printf("\ninorder tree: ");
    inOrder(root);
    int node_target = -300;
    printf("\nsearch value node %d: ",node_target);
    search_result(root,node_target);

    printf("\ninsert 34");
    insert_bst(root, 34);
    printf("\ninorder tree: ");
    inOrder(root);
    printf("\ninsert 36");
    insert_bst(root, 36);
    printf("\ninorder tree: ");
    inOrder(root);
    printf("\n<<<<test>>>>");
    printf("\nsuccessor: ");
    printf("%d ---> %d ",root->left->right->left->data,successor(root,root->left->right->left));
//    printf("\n %d", root->left->right->left->right->parent->data);
    printf("\npredecessor: ");
    printf("%d ---> %d ",root->left->right->right->data,predecessor(root,root->left->right->right));

    printf("\ndelete value node leaf 23: ");
    delete_bst_result(root,23);
    printf("\ndelete value node leaf 20: ");
    delete_bst_result(root,20);
    printf("\ndelete value node leaf 25: ");
    delete_bst_result(root,25);
    printf("\ninorder tree: ");
    inOrder(root);
    printf("\ndelete value node not leaf 50: ");
    delete_bst_result(root,50);
    printf("\ninorder tree: ");
    inOrder(root);
    free_tree(root);

    node *a = create_node(25);
    insert_bst(a,25);
    insert_bst(a,15);
    insert_bst(a,40);
    insert_bst(a,20);
    insert_bst(a,30);
    insert_bst(a,45);
    insert_bst(a,17);
    delete_bst_result(a,15);
    printf("\ninorder tree: ");
    inOrder(a);
    free(a);
*/

    return 0;
}


