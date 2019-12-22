#include <bits/stdc++.h>

typedef struct node_avl {
    int key;
    int bal;
    int height;
    struct node_avl *left;
    struct node_avl *right;
    struct node_avl *parent;

}node_avl;

void free_tree(node_avl *root) {
    if (root == NULL) {
        return;
    }
    free_tree(root->left);
    free_tree(root->right);
    free(root);
}

node_avl* create_node(int key) {
    node_avl *root = (node_avl*)malloc(sizeof(node_avl));
    if(root == NULL) {
        printf("\nERORR ALLOCATE");
        exit(1);
    }
    root->key = key;
    root->left = NULL;
    root->right = NULL;
    root->parent = NULL;
    root->bal = 0;
    root->height = 1;
    return root;
}

void inOrder(node_avl *root) {
    if(root != NULL) {
        inOrder(root->left);
        printf("\nkey = %-5d bal = %-5d height = %-5d",root->key, root->bal, root->height);
        inOrder(root->right);
    }

}

int max_(int a, int b) {
    return ( a > b ? a : b);
}

int height(node_avl *root) {
    if(root == NULL) return 0;
    else {
        int lheight = height(root->left);
        int rheight = height(root->right);
        root->height = 1 + max_(lheight, rheight);
        return root->height;
    }
}

int balance(node_avl *root) {
    if(root == NULL) return 0;
    else {
        int lheight = height(root->left);
        int rheight = height(root->right);
        root->bal = lheight - rheight;
        return root->bal;
    }
}

node_avl* rightRotate(node_avl *k2) {
    node_avl *k1 = k2->left;
    node_avl *tmp = k1->right;

    // thuc hien xoay
    k1->right = k2;
    k2->left = tmp;
    // update height , bal;

    // phai de la height(k2->left) vi neu no null thi con ra 0
    k2->height = max_(height(k2->left), height(k2->right)) + 1;
    k1->height = max_(height(k1->left), height(k2)) + 1;

    k2->bal = balance(k2);
    k1->bal = balance(k1);
//    printf("%d", k1->key);
//    inOrder(k1);
    return k1;

}

node_avl* leftRotate(node_avl *k2) {
    node_avl *k1 = k2->right;
    node_avl *tmp = k1->left;

    // thuc hien xoay
    k1->left = k2;
    k2->right = tmp;
    // update height , bal;
    k2->height = max_(height(k2->right), height(k2->left)) + 1;
    k1->height = max_(height(k1->right), height(k2)) + 1;
    k2->bal = balance(k2);
    k1->bal = balance(k1);
//    printf("%d", k1->key);
//    inOrder(k1);
    return k1;

}

node_avl* insert_avl(node_avl *root, int value) {
    if( root == NULL) {
        root = create_node(value);
    } else if ( value > root->key) {
        root->right = insert_avl(root->right, value);
        /* update pararen cho node them vao do
            se bi trung lap vs cai node truoc do
            nhung khong sao
        */
        root->right->parent = root;
    } else if ( value < root->key) {
        root->left = insert_avl(root->left, value);
        root->left->parent = root;
    } else return root; // truong hop key duplicate

    int heigth = height(root);
    int bal = balance(root);

    if(bal > 1 && value < root->left->key) {
    /**
            tinh huong 1: xoay phai-lech trai
    */
        return rightRotate(root);
    } else if ( bal < -1 && value > root->right->key) {
        /**
            tinh huong 2: xoay trai-lech phai
    */
        return leftRotate(root);
    }
    else if(bal > 1 && value > root->left->key) {
            /**
            tinh huong 3: xoay phai, xong xoay trai
            cay con trai cao hon cay con phai do cay con phai cua cay con trai
    */
        root->left = leftRotate(root->left);
        return rightRotate(root);
    }
    else if(bal < -1 && value < root->right->key) {
            /**
            tinh huong 4: xoay trai, xong xoay phai
            cay con phai cao hon cay con trai do cay con trai cua cay con phai
    */
        root->right = rightRotate(root->right);
        return leftRotate(root);
    }
    return root;
}

node_avl* search_(node_avl *root, int target) {
    if( root!= NULL) {
        if(target < root->key) {
            return search_(root->left, target);
        } else if ( target > root->key) {
            return search_(root->right, target);
        }
        return root;
    }
    return NULL;
}

node_avl* find_min(node_avl *root) {
    if(root == NULL) {
        return (NULL);
    } else {
        if(root->left == NULL) return root;
        else return find_min(root->left);
    }
}

node_avl *delete_avl(node_avl *root, int value) {
    node_avl *tmp;
    if( value > root->key) {
        root->right = delete_avl(root->right, value);
    } else if( value < root->key) {
        root->left = delete_avl(root->left, value);
    } else if(root->left && root->right){
        /** node co 2 con, roi vao truong hop 4
            tim sucessor y cua node can xoa x
            go y ra khoi cay
            noi con con phai cua y vao cha cua y (VI SUCCESSOR CUA NO LA PHAN TU TRAI NHAT ROI,
             NEN NEU CO, THI CHI CO THE CO CON PHAI THOI)
            thay the y vao vi tri can xoa
        */
        tmp = find_min(root->right);
        root->key = tmp->key;
        /**
            xoa voi tree moi, tra ve goc la root->right
        */
        root->right = delete_avl(root->right, tmp->key);

    } else {
        /**den day la tim duoc vi tri can xoa roi
            truong hop 1-3
        */
        tmp = root;
        /**
            node chi co con phai, hoac khong co con nao (leaf)
        */
        if(tmp->left == NULL) {
            root = root->right;
        } else if(tmp->right == NULL) {
        /**
            node chi co con trai
        */
            root = root->left;
        }
        free(tmp);
    }
    int heigth = height(root);
    int bal = balance(root);

    if(bal > 1 && value < root->left->key) {
    /**
            tinh huong 1: xoay phai-lech trai
    */
        return rightRotate(root);
    } else if ( bal < -1 && value > root->right->key) {
        /**
            tinh huong 2: xoay trai-lech phai
    */
        return leftRotate(root);
    }
    else if(bal > 1 && value > root->left->key) {
            /**
            tinh huong 3: xoay phai, xong xoay trai
            cay con trai cao hon cay con phai do cay con phai cua cay con trai
    */
        root->left = leftRotate(root->left);
        return rightRotate(root);
    }
    else if(bal < -1 && value < root->right->key) {
            /**
            tinh huong 4: xoay trai, xong xoay phai
            cay con phai cao hon cay con trai do cay con trai cua cay con phai
    */
        root->right = rightRotate(root->right);
        return leftRotate(root);
    }
    return root;
}
node_avl* delete_avl_result(node_avl *root, int value) {
    if(search_(root, value)) {
        return delete_avl(root, value);
    } else {
        printf("\nnode not exist");
        return root;
    }
}

int main() {
    node_avl *root = create_node(40);
    root = insert_avl(root,30);
    root = insert_avl(root,65);
    root = insert_avl(root,25);
    root = insert_avl(root,35);
    root = insert_avl(root,50);
    root = insert_avl(root,10);
    root = insert_avl(root,28);
    root = insert_avl(root,33);
    root = insert_avl(root,34);
    root = delete_avl_result(root,50);
    inOrder(root);
    free_tree(root);
    return 0;
}

