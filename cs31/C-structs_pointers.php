<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link rel="icon" href="style/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="style/images/favicon.ico" type="image/x-icon">
<title>CS31: Intro to C Structs and Pointers</title>

<style type="text/css">
@import url("style/stylesheet_hw.css");
</style>
</head>


<body> 
<div id="Wrapper"> 
  <div id="HeadImgMed"> 
    <div id="HeaderSmall">
            <h1>Intro to C for CS31 Students</h1>
             <h2>Part 2: structs &amp; pointers</h2>
<hr>
<h3>Contents:</h3>
<ol>
 <li><a href="#structs">Structs</a>  </li>
 <li><a href="#ptrs">Pointers</a> </li> 
 <li><a href="#ref">Pointers and Functions</a> C style "pass by referece" </li> 
<li> <a href="#malloc">Dynamic Memory Allocation</a> (malloc and free)</li> 
 <li><a href="#ptr_struct">Pointers to Structs</a> </li> 
</ol>
<a href="http://www.cs.swarthmore.edu/~newhall/cs31/resources/C-intro.php">Part 1</a> contains C basics, including functions, static arrays, I/O 
<br><a href="http://www.cs.swarthmore.edu/~newhall/unixlinks.html#Clang">Links to other C programming Resources</a>

</div>

 <div class="TagLine"> 
C Stucts and Pointers
 </div>
  </div> <!--Header image box-->
     
  <div id="Content">

<p>This is the second part of a two part introduction to the C programming
language.  It is written specifically for CS31 students.
The first part covers C programs, compiling and running, 
variables, types, operators, loops, functions, arrays, parameter passing 
(basic types and arrays), standard I/O (printf, scanf), and file I/O.  
It also includes links to other C programming resources:
<br>
<a href="http://www.cs.swarthmore.edu/~newhall/cs31/resources/C-intro.php">Introduction to C programming for CS31 students Part 1</a>
<p>
Code examples on this page can be copied over from my 
<tt>public/cs31/C_examples</tt> directory:
<pre>
   # if you don't have a cs31 subdirectory, create one first:
   <b>mkdir cs31</b>
   # copy over my C example files into your cs31 subdirectory:
   <b>cd cs31</b>
   <b>cp -r /home/newhall/public/cs31/C_examples  .</b>
   # cd into your copy, run make to compile
   <b>cd C_examples</b>
   <b>make</b>
   <b>ls</b>
</pre>

<div class="TagLine" id="structs"> Structs </div>

C is not an object-oriented language, and thus does not have support for
classes.  It does, however, have support for defining structured types 
(like the data part of classes).  
<p>
A struct is a type used to represent a heterogeneous collection of data;
it is a mechanism for treating a set of different types as a single, 
coherent unit.  For example, a student may have a name, age, gpa, and
graduation year.  A struct type can be defined to store these four 
different types of data associated with a student.
<p>
In general, there are three steps to using structured types in C programs:
<ol>
<li> Define a new struct type representing the structure.
<li> Declare variables of the struct type
<li> Use DOT notation to access individual field values
</ol>

<h3>Defining a struct type</h3>
struct type definitions should appear near the top of a program file, 
outside of any function definition.  There are several different ways
to define a struct type but we will use the following:
<pre>
struct &lt;struct name&gt; {
  &lt;field 1 type&gt; &lt;field 1 name&gt;;
  &lt;field 2 type&gt; &lt;field 2 name&gt;;
  &lt;field 3 type&gt; &lt;field 3 name&gt;;
  ...
};
</pre>
Here is an example  of defining a new type 'struct studentT' for storing 
student data:
<pre>
struct studentT {
   char name[64];
   int  age;
   int  grad_yr;
   float gpa;
};

// with structs, we often use typedef to define a shorter type name
// for the struct; typedef defines an alias for a defined type
// ('studentT' is an alias for 'struct studentT')
typedef struct studentT studentT; 
</pre>

<h3>Declaring variables of struct types</h3>

Once the type has been defined, you can declare variables of the 
structured type:
<pre>
struct studentT  student1;   // student1 is a struct studentT
studentT  student2;          // student2 is also a struct studentT
                             // (we are just using the typedef alias name)

studentT cs31[50];           // an array of studentT structs: each bucket
                             // stores a studentT struct
</pre>


<h3>Accessing field values</h3>

To access field values in a struct, use dot notation:
<pre>
&lt;variable name&gt;.&lt;field name&gt;
</pre>
It is important to think very carefully about type when you use structs
to ensure you are accessing field values correctly based on their type.
Here are some examples:
<pre>
student1.grad_yr = 2017;
student1.age = 18 + 2;
strcpy(student1.name, "Joseph Schmoe");
student2.grad_yr = student1.grad_yr;
cs31[0].age = student1.age;
cs31[5].gpa = 3.56;
</pre>
structs are lvalues, meaning that you can use them on the left-hand-side
of an assignment statement, and thus, can assign field values like this:
<pre>
student2 = student1;  // student2 field values initialized to the value of
                      // student1's corresponding field values
cs31[i] = student2;
</pre>
<b><font color="red">Question:</font></b> For each expression below, what is its type? Are any invalid?
(here are the <a href="answer.html">answers</a>)
<pre>
   (1) student1
   (2) student1.grad_yr
   (3) student1.name
   (4) student1.name[2]
   (5) cs31
   (6) cs31[4]
   (7) cs31[4].name
   (8) cs31[4].name[5]
</pre>

<h3>Passing structs to functions</h3>

When structs are passed to functions, they are passed 
<b>BY VALUE</b>.  That means that the function will receive a
<b>COPY OF</b> the struct, and that copy is what is manipulated
from within the function.  All field values in the copy 
will have the exact same values as the field values of the original 
struct - but the original struct and the copy occupy different locations 
in memory. As such, changing a field value within the function will NOT 
change the corresponding field value in the original struct that was passed in.
<p>
If one of the fields in a struct is a statically
declared array (like the name field in the studentT struct), the parameter
gets a copy of the entire array (every bucket value).  This is because the 
complete statically declared array resides within the struct, and the entire 
struct is copied over as a unit.  You can think of the struct as a chunk 
of memory (0's and 1's) that is copied over to the parameter without anything 
being added to it or taken out. So, a function passed student1 CANNOT change 
any of the contents of the student1 variable (because the function is 
working with a COPY of student1, and thus the student.name array in the 
copy starts at a different memory location than the student.name array of 
the original struct).
This may seem odd given how arrays are passed to functions (an array 
parameter does not get a copy of every array bucket of its argument, 
instead it REFERS to the same array as the argument array).  This seemingly 
different behavior is actually consistent with the rule that a parameter gets 
THE VALUE of its argument. It is just that the value of an array argument 
(the base address of the array) is different than the value of an int, float,
struct, ..., argument.  For example, here are some expressions and their 
values:
<pre> 
Argument Expression      Expression's Value (Parameter gets this value)
--------------------     --------------------------------------------
student1                 {"Joseph Schmoe", 20, 2017, 3.56}
student1.gpa             3.56
cs31                     base address of the cs31 array     
student1.name            base address of the name field array
student1.name[2]         's'
</pre> 

<b>Only when the value passed to a function is an address of a memory 
location can the function modify the contents of the memory location
at that address</b>: a function passed student1 (a struct value) CANNOT 
change any of the contents of the student1 variable; but a function passed 
student1.name (the base address of an array) CAN change the contents of 
the buckets of the name field - because when student1.name is 
passed in, what is being passed in is the memory location of the array, 
NOT a copy of the entire array. 
<p>
<p>
<font color="red">Example:</font> <a href="stack.html">Here</a> is an 
example function call with a stack drawing showing how different types 
are passed.
<p>

<h4>lvalues</h4>
An lvalue is an expression that can appear on the left hand side
of an assignment statement.  In C, single variables or array elements are
lvalues.   The following example illustrates valid and invalid C assignment
statements based on lvalue status:
<pre>
struct studentT  student1;   
studentT  student2;          
int x;
char arr[10], ch;

x = 10;                         // valid C: x is an lvalue
ch = 'm';                       // valid C: ch is an lvalue
student1 = student2;            // valid C: student1 is an lvalue
arr[3] = ch;                    // valid C: arr[3] is an lvalue
x + 1 = 8;                      // invalid C: x+1 is not an lvalue
arr = "hello there";            // invalid C: arr is not an lvalue
arr = student1.name;            // invalid C: arr is not an lvalue
student1.name = student2.name;  // invalid C: name (an array of char) is not an lvalue
</pre>

<p>See <tt>struct.c</tt> for more examples. 
<br><b>Exercise:</b> implement and test two functions in this file: printStudent
and initStudent.

<br>
<br>
<div class="TagLine" id="ptrs">C pointer variables </div> 

A pointer variable <b>stores the address of a memory location</b>
that stores a value of the type to which it points ("a level of indirection").
Here is a picture of a pointer variable <tt>ptr</tt> pointing to a
memory storage location that stores value an int value 12:
<pre>
         -----           -----
     ptr | *-|---------&gt;| 12 |
         -----           -----
</pre>
Through a pointer variable (<tt>ptr</tt>) the value stored in the location
it points to (<tt>12</tt>) can be indirectly be accessed.
<p>
Pointer variables are used most often in C programs for:
<ol>
<li> "pass-by-reference" function parameters: to write functions that can
modify an argument's value.

<li> Dynamic Memory Allocation (for arrays in particular): to write
programs that allocate space (or re-allocate space) as the program
runs.  This is useful when sizes of data structures like arrays are 
not known at compile time, and to support growing the size of data
structures as the program runs.
</ol>
<h4>Rules for using pointer variables</h4>
The rules for using pointer variable are similar to regular variables, you
just need to think about two types: 
(1) the type of the pointer variable; and (2) the type stored 
in the memory address to which it points.

<ol>
<li> First, declare a pointer variable using <tt>type_name *var_name</tt>:
<pre>
int *ptr;   // stores the memory address of an int (ptr "points to" an int)
char *cptr; // stores the memory address of a char (cptr "points to" a char) 
</pre>
<b>Think about Type</b>
<br>
<tt>ptr</tt> and <tt>cptr</tt> are both pointers but their specific type
is different:
<ul>
<li><tt>ptr</tt>'s type is "pointer to int". 
It can point to a memory location that stores an int value.
<li><tt>cptr</tt>'s type is "pointer to char"
It can point to a memory location that stores an char value, and through cptr we can indirectly access that char value.
</ul>
<p>
<li> Next, initialize the pointer variable (make it point to something).  
Pointer variables <b>store addresses</b>.  Initialize a pointer
to the address of a storage 
location of the type to which it points.  One way to do this is
to use the ampersand operator on regular variable to get its address
value:
<pre>
int x;
char ch;
ptr = &amp;x;    // ptr get the address of x, pointer "points to" x
              ------------          ------
          ptr | addr of x|---------&gt;| ?? |  x
              ------------          ------
cptr = &amp;ch;  // ptr get the address of ch, pointer "points to" ch 
cptr = &amp;x;  // ERROR!  cptr can hold a char address only (it's NOT a pointer to an int)
                
</pre>
All pointer variable can be set to a special value <b>NULL</b>.  NULL is not
a valid address but it is useful for testing a pointer variable to see if
it points to a valid memory address before we access what it points to:
<pre>
ptr = NULL;             ------                    ------ 
cptr = NULL;       ptr | NULL |-----|       cptr | NULL |----|
                        ------                    ------ 
</pre>
</li>
<li> Use the pointer variable: 
<ul>
<li>make it point to a location (and you can change which location it points to)
<li><b>Use *var_name to dereference the pointer</b> to 
access the value in the location that it points to.  
</ul>
Some examples:
<pre>
int *ptr1, *ptr2, x, y;
x = 8;
ptr1 = NULL;
ptr2 = &amp;x;           ------------           ------
                ptr2 | addr of x|---------&gt;|  8  |  x
                     ------------           ------
*ptr2 = 10;    // dereference ptr2: "what ptr2 points to gets 10"
                     ------------           ----- 
                ptr2 | addr of x|---------&gt;| 10  |  x
                     ------------           ----- 

y = *ptr2 + 3;  // dereference ptr2: "y gets what ptr2 points to plus 3"
                   ----- 
                   ----- 

ptr1 = ptr2;   // ptr1 gets address value stored in ptr2
                     ------------            ----- 
                ptr2 | addr of x |---------&gt;| 10  |  x
                     ------------            ----- 
                                              /\ 
                     ------------              | 
                ptr1 | addr of x |--------------
                     ------------             

// TODO: finish tracing through this code and  show what is printed
*ptr1 = 100;
ptr1 = &amp;y;
*ptr1 = 80;
printf("x = %d y = %d\n", x, y);
printf("x = %d y = %d\n", *ptr2, *ptr1);
</pre>
</li>
</ol>
Be careful about type when using pointer variables (drawing pictures helps):
<pre>
ptr = 20;       // ERROR?  this assigns ptr to point to address 20
*ptr = 20;      // this assigns 20 the value pointed to by ptr
</pre>
What happens if you dereference an pointer variable that does not contain
a valid address:
<pre>
ptr = NULL;
*ptr = 6;    // CRASH!  your program crashes with a segfault (a memory fault)

ptr = 20;
*ptr = 6;    // CRASH!  segfault (20 is not a valid address)
</pre>
This is one reason to initialize pointer variables to NULL: you can test
for NULL and not dereference in your program:
<pre>
if(ptr != NULL) {
  *ptr = 6;
}
</pre>
<br>
<br>
<div class="TagLine" id="ref">Pointers and Functions "pass by reference"</div> 

Pointers allow a way to write functions that can modify their
arguments' values: the C way of implementing <b>Pass by Reference</b>.  
We have actually already seen this with array parameters: the 
function parameter gets the value of the base address of the array (it
points to the same array as its argument) and thus the function can modify
the values stored in the array buckets.
We can use this same idea in general to write a function that can modify
its argument's value.
The steps are:
<ol>
<li> declare the function parameter to be a pointer to the variable type
<pre>
   int change_value(<b>int *input></b>) {
</pre>
<li> pass in the address of the argument
<pre>
    int x;
    change_value(<b>&amp;x</b>);
</pre>
<li> in the function, dereference the parameter to change the argument's value
<pre>
    *input = 100;  // what input points to (x's location) gets 100
</pre>
</ol>
<b>Try out:</b>

<ol>
<li>Look at a program that does C style pass by reference: 
<pre>
vim <a href="passbyreference.c">passbyreference.c</a>
</pre>
Try running it and see if you understand what is happening and why.
<p>
Draw the call stack for the first call to this function:  
<ul>
	<li>where are variables a and b located on the stack?  
	<li> where are the parameter values located?  
	<li> what values does each parameter get?  
        <li> and what does this mean with respect to the value of 
             each argument after the call?
</ul>
</li>
<li> Implement a program with a <b>swap</b> function that 
swaps the values stored in its two arguments.  Make some calls
to it in main to test it out.
</li>
</ol>
<a href="pass_by_ref_answers.html">Here are the answers</a>
<p>

(note: technically, everything in C is passed by value;  
C-style pass-by-reference is just passing the value of an address 
(a pointer) to a function as opposed to passing the value of 
an int or float or ...)


<br>
<div class="TagLine" id="malloc">Dynamic Memory Allocation</div>

A common uses of pointer variables is 
to use them to point to memory that your program allocates at runtime.  
This is very useful for writing programs where the size of an array or
other data structure is not know until runtime, or that may grow or
shrink over the lifetime of a run of a program.
<p>
<h4>malloc and free</h4>

<b>malloc</b> and <b>free</b> are functions for allocating and
deallocating memory in the <b>Heap</b>.  The Heap is a portion of program
memory that is separate from the stack.  No variables are allocated in the
heap, but chunks of anonymous memory can be allocated and its address
can be assigned to a global or local pointer variable. 
<p>
Heap memory must be explicitly allocated and deallocated by your program.
<p>
<ul>
<li> To allocate Heap memory, call <tt>malloc</tt> passing in the total 
number of bytes of contiguous heap memory you want to allocate.  
<tt>malloc</tt> returns the base address of this heap memory to the 
caller or <tt>NULL</tt> on error.  
<pre>
int *p;
p = (int *)malloc(4);  // allocate 4 bytes of heap memory and assign addr to p
*p = 6;   // the heap memory p points to gets the value 6
</pre>
malloc's return type is a bit odd.  It is a <tt>void *</tt> which means it is 
a pointer to a non-specific type (or to any type).  Because of this, we re-cast
the return type to be a pointer to the specific type we are using 
<tt>(int *)</tt> in the example above.
<li> Sometimes malloc fails, so you should always test its return value
for NULL before dereferencing the pointer value:
<pre>
p = (int *)malloc(4);
if(p == NULL) {
   printf("Bad malloc error\n");
   exit(1);   // or return from this function or ...
}
*p = 6;
</pre>

<li>Instead of passing the exact number of bytes to malloc, 
use the <tt>sizeof</tt> function in an expression instead  
(<tt>sizeof([type name])</tt>):
<pre>
p = (int *)malloc(sizeof(int));
</pre>
<li> malloc is often used to allocate an array of some type on the heap,
by specifying the total number of bytes in the array using
an expression of (size of the type of each bucket and the number of buckets:
<pre>
int *arr;
char *c_arr;

// allocate an array of 20 ints on the heap:
arr = (int *)malloc(sizeof(int)*20);

// allocate an array of 10 chars on the heap:
c_arr = (char *)malloc(sizeof(char)*10);
</pre>
<li>Because the pointer variable stores the base address of the array 
allocated in the heap, you can use array syntax to access its buckets:
<pre>
arr[0] = 8;  // these two statements are identical: both put 8 in bucket 0
*arr = 8;
arr[3] = 10;  // puts 10 in bucket 3 of the array pointed to by arr  
</pre>
<a href="mallocstack.html">Here is a picture</a> of what this looks like 
in memory.  Note that the Stack and the Heap are separate parts of memory.
<p>
<li>When you are done using the memory you allocated with malloc, you need to
explicitly deallocate it by calling the <tt>free</tt> function
(it is also good to set the pointer's value to NULL after
calling free:
<pre>
free(p);
free(arr);
free(c_arr);
p = NULL;
arr = NULL;
c_arr = NULL;
</pre>
</ul>
See my <a href="http://www.cs.swarthmore.edu/~newhall/unixhelp/C_strings.html">Strings in C</a> page for some examples of dynamically allocated strings and the string library (when dynamically allocating space for strings it is
important to <b>allocate enough space to store all chars in the string 
including the terminating null char</b>)
<hr>
<h3>Pointers, the Heap, and Functions</h3>

Passing a pointer value to a function has the same semantics as
passing the address of a variable to a function:  the function
can modify the value pointed to.
<p>
As you write functions that take pointer values as parameters, it
if very important to <b>think about the type of argument you are
passing</b>.  This will help you figure out the syntax for 
how to pass the argument value and the correct matching function
parameter type.
<p>
Here is an example of passing a malloc'ed array to a function:
<pre>
int main() {
  int *arr1;
  arr1 = malloc(sizeof(int)*10);
  if(!arr1) {
     printf("malloc error\n");
     exit(1);  
  }
  init_array(<b>arr1</b>, 10);
  ...
}
void init_array(<b>int *arr</b>, int size) {
  int i;
  for(i=0; i&lt; size; i++) {
     arr[i] = i; 
  }
}
</pre>
<a href="mallocfunc.html">Here is a picture</a> of what this looks like 
in memory.  This should look very familiar to passing statically declared
arrays, just notice the difference in which part of memory the array
is located.

<h3>Try out:</h3>

Given the following program:
<ol>
<li> Trace through the execution and draw the stack at the 
location shown in function blah.
<li> what are main's arr bucket values at the point the stack is drawn?
<li> What is the output of this program when run?
</ol>
Note how the argument values are passed to functions foo and blah as you
step through this.

<pre>
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

void foo(int *b, int c, int *arr, int n) ;
void blah(int *r, int s);

int main() {
  int x, y, *arr;
  arr = (int *)malloc(sizeof(int)*5);
  if(arr == NULL) {
    exit(1);   // should print out nice error msg first
  }
  x = 10;
  y = 20;
  printf("x = %d y = %d\n", x, y);
  foo(&amp;x, y, arr, 5);
  printf("x = %d y = %d arr[0] = %d arr[3] = %d\n",
      x, y, arr[0],arr[3]);
  free(arr);
  return 0;
}

void foo(int *b, int c, int *arr, int n) {
  int i;
  c = 2;
  for(i=0; i&lt;n; i++) {
    arr[i] = i + c;
  }
  *arr = 13;
  blah(b, c);
}

void blah(int *r, int s) {  
  *r = 3; 
  s = 4;  
  // STACK DRAWN HERE 
}
</pre>
Here are the <a href="mallocstacktrace.html">Answers</a>

<br>
<br>
<div class="TagLine" id="ptr_struct">Pointers and Structs</div>

Given the following struct definition:
<pre>
struct student {
    char name[50];
    int  age;
    int  year;
    float  gpa;
};
</pre>
</ol>
In your program, you can declare variables 
whose type is <tt>struct student</tt> or <tt>struct student *</tt> 
(a pointer to a struct student).  To access individual fields in a struct,
use dot "." notation if the variable's type is "struct student"
and right arrow notation "-&gt;" if a variable's type is a
"struct student *".  Here are some examples:
<pre>
struct student s;
struct student *sptr;

// you need to think very carefully about the type of each field
// when you access it (name is an array of char, age is an int ...
strcpy(s.name, "Freya");
s.age = 18;
s.year = 2016;
s.gpa = 4.0;

// malloc up a struct student for sptr to point to:
sptr = malloc(sizeof(struct student));
if(!sptr) { 
 // error handling code ... 
}
sptr-&gt;age = 19;     // the age field of what sptr points to gets 20
sptr-&gt;year = 2015;
sptr-&gt;gpa = 3.2;
strcpy(sptr-&gt;name, "Lars"); 

(*sptr).age = 20;   // this also access the age field of what sptr points to
                    // (*sptr).age and sptr-&gt;age synonyms for the same memory location 
</pre>
Here is what the variables s and sptr may look like in memory (malloced
space is always in heap memory, and variables are either 
allocated on the stack (local variables and parameters) or
in global memory (global variables):
<pre>
ON THE STACK                               ON THE HEAP
=============                              ===========
   -----------
s  | "Freya" |
   |  18     |
   |  2016   |
   |  4.0    |
   -----------

     -----                                   ----------- 
sptr | *-|---------------------------------&gt; | "Lars"  |
     -----                                   |  20     |
                                             |  2015   |
                                             |  3.2    |
                                             ----------- 
</pre>
<p>
<li> You can also have field values that are pointers:

<pre>
struct personT {
  char *name;
  int  age;
};

int main() {
  struct personT me, *you;

  me.name = malloc(sizeof(char)*10);
  strcpy(me.name,"Tia");
  me.age = 50;

  you = malloc(sizeof(struct personT));
  you-&gt;name = malloc(sizeof(char)*10);
  strcpy(you-&gt;name, "Elmo");
  you-&gt;age = 40;
}
</pre>
<b>Answer these questions:</b>
<ol>
<li> Draw a picture of the contents of memory (the stack and the heap) 
showing the effects of executing the instructions in main above on
the variables <tt>you</tt> and <tt>me</tt>.
<p>
<li>What is the type and value of each of the following expressions 
(and are they all valid?):
<pre>
1.  me
2.  you
3.  me.name
4.  you.name
5.  me.name[2]
6.  you-&gt;name[2]
</pre>
</ol>
<a href="structanswers.html">Here are the answers.</a>

<p>
<li> You can also declare static or dynamic arrays of structs or arrays of
pointers to structs or ... (<font color="red">you need to think
	very carefully about type</font>).  Here are some examples:
<pre>
struct student students[36];   // an array of 36 student structs
struct student *students2;    // a pointer to a struct student
                              // (will be used to store the base address
                              //  of a dynamically allocated array of student 
                              // structs (each bucket holds a struct student)
struct student *students3[36];  // statically declared array of student struct*
                                // (each bucket holds a (struct student *))
</pre>
Examples of their use:
<pre>
students[i].age = 21;   // the ith bucket stores a student struct
                        // use dot notation to access its fields

// dynamically allocate array of student structs
// (the array buckets are allocated in heap memory)
students2 = malloc(sizeof(struct student)*10);   

students2[3].year = 2013;   // each bucket in this array is a student struct
                            // use dot notation to access its fields

// each bucket of students3 stores a pointer to a student struct
students3[0] = malloc(sizeof(struct student));  

students3[0]-&gt;age = 21;   // dereference the pointer to the struct in bucket 0
</pre>
</ol>
<hr>
<h4>Linked Lists in C</h4>
<p>
You can also define self-referential structs in C (structs with fields whose
type is a pointer to the struct type).  This is how you would define a 
node for a linked list for example:
<pre>
struct node {
  int data;
  struct node *next;
};
</pre>
Then you could use instances of this struct type to create a linked-list:
<pre>
struct node *head, *temp;

head = NULL;  // an empty linked list

head = malloc(sizeof(struct node));
if(!head) { // some error handling code ... }   // !head is == (head != NULL)
head-&gt;data = 10;
head-&gt;next = NULL;

// add 5 nodes to the head of the list:
for(i = 0; i &lt; 5 i++) {
   temp = malloc(sizeof(struct node)); 
   if(temp == NULL) {  // some error handling code ... } 
   temp-&gt;data = i; 
   temp-&gt;next = head; 
   head = temp;
}
</pre>
We likely will not write any linked list code in this class, but if you
are curious about this topic, you can
look at my <a href="http://web.cs.swarthmore.edu/~newhall/unixlinks.html#Clang">linked lists in C</a> reference for more information about linked lists in C.

</div> <!--content--> 
<div id="Footer">
<p>
<!--Common footer text/images-->
<br>
<small>
<!--File/php last-edited time stamping-->
Last updated: Friday, September 08, 2017 at 09:52:57 PM</small>
</div>
</div> <!--wrapper-->
</body>
</html>

