<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link rel="icon" href="style/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="style/images/favicon.ico" type="image/x-icon">
<title>CS31: Introduction to C Programming</title>

<style type="text/css">
@import url("style/stylesheet_hw.css");
</style>
</head>


<body> 
<div id="Wrapper"> 
  <div id="HeadImgMed"> 
    <div id="HeaderSmall">
<h1>Introduction to C Programming for CS31 Students</h1>
<h2>Part 1: variables, functions, arrays, strings</h2>
<hr>
<h3>Contents:</h3>
<ol>
 <li><a href="#start">Getting Started</a> simple program, compiling</li> 
 <li><a href="#vars">Variables</a> </li> 
 <li><a href="#io">Input/Output</a> </li> 
 <li><a href="#branch">Branching</a> </li> 
 <li><a href="#loops">Loops</a>  </li>
 <li><a href="#func">Functions</a> </li> 
 <li><a href="#arrays">Arrays</a> </li>
 <li><a href="#strings">Strings</a>  </li>
 <li><a href="#structs">Intro to Structs</a>  </li>
</ol>

<a href="C-structs_pointers.php">Part 2</a> contains information about structs and pointers (it will be covered later in the semester)
<br><a href="http://www.cs.swarthmore.edu/~newhall/unixlinks.html#Clang">Links to more C programming Resources</a>

</div>

 <div class="TagLine" id="start"> 
Overview and Resources
 </div>
  </div> <!--Header image box-->
     
  <div id="Content">
<p>This page includes a brief overview to C programming for students who
have taken CS21 or an equivalent introductory CS course.
We will start with some of the C basics, which is much of the C programming
language, and then will add more C programming features as the semester
progresses.
As you are implementing C programs for lab assignments, 
make use of:
<ol>
<li> The information on this page
<li><a href="http://www.cs.swarthmore.edu/~newhall/unixlinks.html#Clang">My C programming Documentation and C Programming Resources</a>. This contains
all kinds of C programming documentation including:
<ul>
<li> How to compile and run C programs on our system
<li> The C Code Style Guide (read this and follow it)
<li> Documentation about different C types and C data structures (char, 
strings, file I/O, pointers, arrays, linked lists, ...).  
<li> Links to C programming tutorials and C language documentation. 
<li> How to use C debugging tools: gdb and valgrind
</ul>
<li> <b>Example C code that I give you in class and weekly lab</b>.
</ol>
Code examples on this page can be copied over from my
<tt>public/cs31/C_examples</tt> directory:
<pre>
   # if you don't have a cs31 subdirectory, create one first:
   <b>mkdir cs31</b>
   # copy over my C example files into your cs31 subdirecory:
   <b>cd cs31</b>
   <b>cp -r /home/newhall/public/cs31/C_examples  .</b>
   # cd into your copy, run make to compile
   <b>cd C_examples</b>
   <b>ls</b>
   <b>make</b>
</pre>
<br>
<div class="TagLine" id="start">
Getting Started Programming in C
</div>
Below is the hello world program in C with a lot of comments.  I would
put it in a file named <tt>hello.c</tt>
(.c is the suffix convention used for C source code files). 
<pre >
/* 
  The Hello World Program in C
  (this is also an example of a multi-line comment)
*/
#include &lt;stdio.h&gt;   // include the C standard I/O library

// Any executable program must have exactly one function called main
int main() {
  printf("Hello World\n");
  return 0;
}
</pre>

Note the following features of the basic program:

<ul>
<li> C statements end with a semicolon <tt>;</tt>.
<li> blocks (e.g. function, loop, and branch bodies) start with a <tt>{</tt> and end with a <tt>}</tt>.   
<li> Single line comments begin with <tt>//</tt>
<li> Multi-line comments begin with <tt>/*</tt> and end with <tt>*/</tt>
<li> C library functionality can be included (imported) using <tt>#include</tt>
<br> All <tt>#include</tt> statements appear at the top of the program, outside 
of function bodies.  
<li> All functions must have a return type. If nothing is returned, the 
return type is <tt>void</tt>.  main's return type is always <tt>int</tt>.
<li> All C statements must be within a function body (<tt>main</tt> in this example).
</ul>

<p> To run a program, we must first save the code using vim or another
<a href="http://www.cs.swarthmore.edu/help/UUIM/editors.html">editor</a> on
our system, then compile the source to an executable form and run the
executable form of our program. The syntax for compiling is

<pre >
 $ gcc -o &lt;output_executable_file&gt; &lt;input_source_file&gt; 
</pre>

for example, gcc compiles hello.c into an executable file named hello:
<pre >
 $ gcc -o hello hello.c
</pre>

We run the executable program using <tt>./hello</tt>:
<pre>
 $ ./hello
</pre>
If we change the source 
(<tt>hello.c</tt> file), we must recompile with <tT>gcc</tT> before 
running <tT>./hello</tt>. If there are any errors, the <tt>./hello</tt> 
file will not be created/recreated (but beware, an older version of
the file from a previous successful compile may still exist).   If you
do not include the <tt>-o outputfile</tt>, gcc creates the executable in
a file named <tt>a.out</tt>.

<br>
<br>
<div class="TagLine" id="vars"> Variables </div>

Variables are named containers for holding data.  In C all variables must be 
declared before use.  To declare a variable, use the following syntax:
<pre>
type_name variable_name;
</pre>
A variable can only have a single <tt>type</tt>.
Valid basic types include <tt>int, float, double, char</tT>.  Examples 
for declaring variables are shown below.   In C, variables must be 
declared at the beginning of their scope (top of a <tt>{ }</tt> block)
before any C statements in that scope (this is not true in C++,
so if you are coming from CS35, be sure to follow C variable 
declaration convention).

<pre>
{
 /* DECLARE ALL VARIABLES OF THIS SCOPE AT THE TOP OF THE BLOCK { */
 int x;         // declaring x to be an int type variable
 int i,j,k;     // can declare multiple variables of the same type on one line
 char letter;   // a char stores a single ASCII value 
                // a char in C is a different type that a string in C
 float winpct;  // winpct is declared to be a float type 
 double pi;     // the double type is more precise than float

 /* AFTER DECLARING ALL VARIABLES YOU CAN USE THEM IN C STATEMENTS */
 x = 7;         // x stores 7, initialize all variables before using them
 k = x + 2;     // use x's value in an expression

 letter = 'A';      // a single quote is used for single character value
 letter = letter+1; // letter stores 'B' (its ascii value is one more than 'A's)

 double pi = 3.1415926; // the double type is more precise than float

 winpct = 11/2;  // winpct gets 5.5, winpct is a float type
 j = 11/2;       // j gets 5: int division truncates anything after the decimal
 x = k%2;        // % is C's mod operator, so x gets 9 mod 2 (1)
}
</pre>
Note the semicolons galore. C expects one after every statement. You'll 
forget them. <tt>gcc</tt> almost never says "You missed a 
semicolon" even though that might be the only thing wrong with your program.  
As you program more in C, you will learn to translate <tt>gcc</tt> 
errors to the error in your program.
<p>
On most variable types, you may use the following operators. Some may 
not apply depending on the operand type. 

<ul>
<li> multiply, divide, mod <tt>*, /, %</tt>
<li> add, subtract <tt>+, -</tt>
<li> assignment <tt>=</tt>
<li> update and assignment <tt>+=, -=, *=, /=, %=</tt>
<br>(e.g. <tT>x+=3</tt> is shorthand for <tt>x=x+3</tt>). 
<li> increment, decrement <tt>++, --</tt>
<br>(e.g. <tt>x++</tt> is shorthand for <tt>x=x+1</tT>).
<p>++x and x++ are both valid, but are evaluated slightly differently:
<pre>
  ++x: increment x first, then use it value
  x++: use x's value first, then increment it
</pre>
In many cases it doesn't matter which you use because the value of 
the incremented or decremented variable is not being used in the 
statement.
For example, these two statements have an equivalent effect:
<pre>
  x++;    
  ++x;  
</pre>
But in some cases it does (when the value of the incremented or decremented
variable IS being used in the statement):
<pre>
  x = 6;
  y = ++x;  // x gets 7, y gets 7
  x = 6;
  y = x++;  // y gets 6, x gets 7
</pre>
</ul> 
  
<br>
<br>
<div class="TagLine" id="io"> Input/Output (printf and scanf)</div>

C uses the <tt>printf</tt> function for printing to standard out (the terminal),
and <tt>scanf</tt> is one function for reading in values (usually from the
keyboard).   <tt>scanf</tt> is similar to printf, and it is the first way 
we will do program input.  However, it is not very resilient to users
entering bad values, so later we will learn better ways to read in values.
<p>
printf and scanf are part of the stdio.h library that needs to be #included 
at the top of the .c file using them.
<p>
printf is very similar to formatted print statements in Python, where you
provide a format string to print and then values to fill the placeholders
in the format string.  Here are some printf examples:
<pre>
  int x = 5, y = 10;
  float pi = 3.14;

  // print the values of x and y followed by a newline character:
  printf("x is %d and y is %d\n", x, y);  

  // print a float value (%g) a string value (%s) and an int value (%d)
  // separated by tab characters (\t) followed by a new line character (\n):
  printf("%g \t %s \t %d\n", pi, "hello", y); 
</pre>
Different types in C are different numbers of bytes, and there are signed and 
unsigned versions of the "integer" types.
<pre>
 1 byte:          char        unsigned char
 2 bytes:         short       unsigned short
 4 bytes:         int         unsigned int           float
 4 or 8 bytes*:   long        unsigned long 
 8 bytes:         long long   unsigned long long     double

 *number of bytes for long depends on the architecture
</pre>
<p>
printf formatting placeholders:
<pre>
Placeholders for specifying different types
--------------------------------------------
 %f,%g:  placeholders for a float or double value
 %d:     placeholder for a decimal value (for printing char, short, int values)
 %u:     placeholder for an unsigned decimal
 %c:     placeholder for a single character
 %s:     placeholder for a string value
 %p:     placeholder to print an address value

 To print out long type values need to use l prefix:
   %lu: print an unsigned long value
   %lld: print a long long  value

Placeholders for specifying the numeric representation
-------------------------------------------------------
 %x:     print value in hexidecimal (base 16)
 %o:     print value in octal (base 8)
 %d:     print value in signed decimal  (base 10)
 %u:     print value in unsigned decimal (unsigned base 10)
 %e:     print float or double in scientific notation
 (there is no formatting option to display the value in binary)

The following are special formatting characters:
-----------------------------------------------
\t: print a tab character
\n: print a newline character

You can also specify field width for the values:
------------------------------------------------
%5.3f: print float value in space 5 chars wide, with 3 places beyond decimal
%20s:  print the string value in a field of 20 chars wide, right justified 
%-20s: print the string value in a field of 20 chars wide, left justified 
%8d:   print the int value in a field of 8 chars wide, right justified 
%-8d:  print the int value in a field of 8 chars wide, left justified 

</pre>

Here is an example full program using a lot of formatting:
<pre >
#include &lt;stdio.h&gt; // library needed for printf

int main() {
  float x=4.50001;
  float y=5.199999;
  char ch = 'a';
  printf("%.1f %.1f\n", x, y); // prints out x and y with single precision 
  // nice tabular output
  printf("%6.1f \t %6.1f \t %c\n", x, y, ch);  
  printf("%6.1f \t %6.1f \t %c\n", x+1, y+1, ch+1);  
  printf("%6.1f \t %6.1f \t %c\n", x*20, y*20, ch+2);  
  return 0;
}
</pre>

<h3>scanf</h3>
<tt>scanf</tt> is one way in which your program can read in input values
entered by a user.  It is very picky about the exact format in which the user 
enters data, which makes it not very robust to badly formed user input.
For now we will use it, later we will use a more robust way of reading input
values from the user.  For now, just remember that if your program gets into an
infinite loop due to badly formed user input you can always type <b>CNTRL-C to 
kill it</b>.
<p>
A scanf call looks a lot like a printf call, it has a format string followed
by variable <b>locations</b> into which the values read in should be stored.
To specify the location of a variable, you need to use the <tt>&amp;</tt>
operator, which evaluates to "the memory location (or address) of the
associated variable".  Here are some examples: 
<pre>
  int x;
  float pi;

  // read in an int value followed by a float value ("%d%g")
  // store the int value at the memory location of x (&amp;x)
  // store the float value at the memory location of pi (&amp;pi)
  scanf("%d%g", &amp;x, &amp;pi);
</pre>
The scanf will skip over leading and trailing whitespace characters (e.g.
' ', '\t', '\n') as it finds the start and end of each numeric literal.  Thus,
a user could enter the value 8 and 3.4 in any of the three ways listed below
and the call to scanf above would assign 8 to x and 3.4 to pi:
<pre>
8 3.4
         8             3.4
8
3.4
</pre>
The format string for scanf is a bit different than for printf in that you
often do not need to specify white space chars in the format string for
reading in consecutive numeric values:  
<pre>
// reads in an int and a float separated by at least one white space character
  scanf("%d%g",&amp;x, &amp;pi);  
</pre>
scanf can seem to behave very strangely for format string with different
type placeholders, so if you get some odd behavior play around with the
format string a bit and try different types.  My documentation about file
I/O has some example scanf format strings. 

<br>
<br>
<div class="TagLine" id="branch"> Branching with if/else </div>

The syntax for branching in C is very similar to in Python.  The main
difference is that where Python uses indenting to indicate "body" statements,
C used curly braces (but you should also use good indenting to in your
C code).
Here is the basic if-else syntax (the else part is optional):
<pre>
//a one way branch
if ( &lt;Boolean expression&gt; ){
  &lt;true body&gt;
}

// a two way branch
if ( &lt;Boolean expression&gt; ){
  &lt;true body&gt;
}
else{
  &lt;false body&gt;
}

// a multibranch:
if ( &lt;Boolean expression 1&gt; ){
  &lt;true body&gt;
}
else if( &lt;Boolean expression  2&gt;){
  //first expression is false, second is true
  &lt;true 2 body&gt;
}
// can have more else if's here 
// ...
else{
  // if all previous experessions are false
  &lt;false body&gt;
}
</pre>

<h3>Boolean Values in C</h3>
C does not have a Boolean type with true or false values, instead int values
are used to represent true or false in conditional statements:
<ul>
<li> <b>0</b>: evaluates to false when used in a boolean expression 
<li> <b>non-zero</b> (any positive or negative int value): evaluates to true when 
used in a boolean expression 
</ul>  
<p>
The set of operators you can use in constructing boolean expressions
are the following (listed in precedence order):
<ul>
<li> Relational Operators: operands of same type, evaluate to 0:false or
 non-zero:true
<ul>
<li> equality <tt>==</tt>, inequality (not equal) <tt>!=</tt>, and comparison 
<tt>&lt;, &lt;=, &gt;, &gt;=</tt> </li>
</ul>
<li> Logical Operators: "boolean" operands evaluate to 0:false or non-zero:true
<ul>
<li> logical negation <tt>!</tt> </li>
<li> logical and <tt>&amp;&amp;</tt> (stops at first false expression) </li>
<li> logical or <tt>||</tt> (stops at first true expression) </li>
</ul>
</ul>
Here is an example conditional statement in C (it is always good to use
parens around complex boolean expressions to make them easy to read):
<pre>
if (y == 10)) {
  printf("y is 10");
} else if((x &gt; 10) &amp;&amp; (y &gt; x)) {
  printf("y is bigger than x and 10\n");
  x = 13;
} else if ((x == 10) || (y &gt; x+20)) {
  printf("y might be bigger than x\n");
  x = y*x;
} else {
  printf("I have no idea what the relationship between x and y is\n");
}
</pre>

<div class="TagLine" id="loops"> Loops </div>

<h2>for loops</h2>
For loops are different in C than they are in Python. In python for loops
are iterations over sequences, in C for loops are more general looping
constructs.  The C for loop syntax is:  
<pre>
for( &lt;initialization&gt;; &lt;boolean expression&gt;; &lt;step&gt; ){
 &lt;body&gt;
}
</pre>
The rules for evaluation are:
<ol>
<li> Evaluate <tt>initialization</tt> one time when first evaluate the 
for loop.
<li> Evaluate the <tt>boolean expression</tt>, if it is false (0), then
drop out of the for loop (you are done repeating the loop body statements).
<li> Evaluate the statements inside the loop <tt>body</tt>
<li> Evaluate the <tt>step</tt> expression
<li> goto step (2).
</ol>
<p>
Here is a simple example for loop to print out the values 0 through 9:
<pre>
for (int i=0; i&lt;10; i++){
   printf("%d\n", i);
}
</pre>
See <tt>forLoop1.c</tt> and <tt>forLoop2.c</tt> for more examples.

<h2>while loops</h2>
While loop syntax in C is similar to in Python, and is
evaluated similarly:
<pre>
while ( &lt;Boolean expression&gt; ){
  &lt;true body&gt;
}
</pre>

The <tt>while</tt> loop checks the Boolean expression first and executes 
the body if true. A similar <tt>do-while</tt> loop executes the body first, 
then checks a condition and runs the loop again if the condition is true:

<pre>
do{
  &lt;body&gt;
} while ( &lt;Boolean expression&gt; );
</pre>
In C, for loops and while loops are equivalent in power (this is not true
in Python), thus C would only need to provide one of these looping 
constructs.  However, for loops tend to
be a more natural language construct for definite loops (like iterating over
values in a list), and while loops tend to be more natural language 
construct for indefinite loops (like repeating until the user enters 
an even number).  Therefore, C provides both.
<p>
See <tt>whileLoop1.c</tt> and <tt>whileLoop2.c</tt> for examples.

<br>
<br>
<div class="TagLine" id="func">
Functions
</div>

Use functions to break code into manageable pieces and reduce code 
duplication. Functions may take <b>parameters</b> as input and 
<b>return</b> a single value of a specific type.  A function 
<b>declaration</b> specifies the function's 
name, return type, and the 
parameter list (the number and type of all parameters). 
A function <b>definition</b> includes the code to be executed when 
the function is called.  All functions in C must be declared before 
they are called.  This is typically done using a function prototype,
but it can also be acomplished by having the function definition 
appear before it is called in a file.  
<pre>
function definition format:
---------------------------
&lt;return type&gt; &lt;function name&gt; (&lt;parameter list&gt;)
{
  &lt;function body&gt;
}

parameter list format:
---------------------
&lt;type&gt; &lt;parm1 name&gt;, &lt;type&gt; &lt;parm2 name&gt;, ...,  &lt;type&gt; &lt;last parm name&gt; 
</pre>
<p>A function that does not return a value has a <tt>void</tt> return type.
</p>

<p>Arguments are passed to C functions by <b>value</b>. Thus a copy of 
the variables value is made before the body of the function executes. 
Any modifications to the parameters in the function are not visible to 
the callee.
</p>

<p> Here is an example function definition followed by a call to it:
</p>
<pre>
int max(int x, int y) {
  int bigger;
  bigger = x;
  if(y &gt; x) {
    bigger = y;
  }
  return bigger; 
}
int main() {
   int a, b;
   printf("Enter two integer values: ");
   scanf("%d%d", &amp;a, &amp;b);
   printf("The larger value is %d\n", max(a,b));
}
</pre>
<p>See <tt>function1.c</tt> for this and another example. 


<p><b>Exercise:</b> Implement and test a power function (for
positive integer exponents only).
<br>
<br>
<div class="TagLine" id="arrays"> Arrays </div>

Arrays are like C's version of lists.  Python provides a high-level list
interface to the programmer that hides much of the low-level implementation 
details.   In C, however, the programmer has to implement this low-level
list functionality; arrays are just the low-level data storage
without higher-level functionality like size, insert, append, etc.
<p>
Arrays can store multiple items of the <b>same</b> type. For now, we will 
use only statically declared arrays, meaning we must know the total 
capacity (number of buckets) of the array at compile time, and we declare 
the array to be of that capacity. We cannot shrink or grow the array at run 
time (at least not yet). 

<p>To declare an array, specify its type, name and total capacity 
(number of buckets):
<pre>
int  arr[10];  // an array of 10 ints
char str[20]; // an array of 20 char...could be a C-style string
</pre>
Individual array elements may be accessed by indexing:
<pre>
int i, num;

num = 5;
for(i=0; i < num; i++) {  // initialize the first 5 buckets of arr
   arr[i] = i;
} 
arr[5] = 100;
num++;
</pre>
Notice that we declared the array to have 10 buckets, but we are only using
6 of them (our current list is of size 6 not 10).  It is often the case
when using statically declared arrays that there is unused capacity.
Thus, we need to have a program variable that keeps track of the actual 
size of the list (num in this example).

<h3>Arrays and Functions</h3>

<p>To declare an array function parameter we must use the 
syntax <tT>int a[]</tT> (or <tt>int *a</tt>, but we will use this
syntax later).   Note we do not specify 
the capacity of the array parameter in the parameter list (the function can 
accept an int array of any capacity).  Arrays also do not know their size, 
so if we want the function to know how many buckets are in use, we should 
also pass the size value as a parameter.  For example:
<pre> 
void printArray(int a[], int size) { 
  int i;
  for(i=0; i < size; i++) {
      printf("%d\n", a[i]);
  }
}
</pre>
To call a function with an array parameter, pass only the 
name of the array as the argument, omitting the brackets. For example: 
<pre>
printArray(arr, num);
</pre>
The name of the array variable is equivalent to the base address of
the array (the memory location of its 0th bucket).  This means
that the argument's array buckets are NOT passed by value to the 
function (i.e. the function's parameter DOES NOT get a copy of 
every array bucket of its argument).  Instead, the parameter gets the 
value of the memory location of the first bucket in the argument array
(the base address of the array).  The implications of this are that when 
array buckets are modified inside the called function 
(e.g. <tt>a[2] = 8</tt>), they also modify the contents
of the corresponding bucket in the argument (i.e. arr[2] is now 8).  This
is becuase <b>the parameter REFERS TO the same array storage locations as 
its argument</b>.  
<p>

<b>Question:</b>What happens if you go beyond the bounds of an array in C?
<pre>
int array[10];
array[10] = 100;  // 10 is not a valid index into the array of 10 int buckets
</pre>
<b>Answer:</b> Unexpected program behavior.  It could lead to your
program crashing, it could change another variable's value, or it could 
have no effect on your program's behavior; it is
a program bug that may or may not show up as buggy program behavior.
It is up to the C programmer to ensure that index values are valid 
and to avoid accessing array buckets beyond the bounds of an array.

<p>The files <tt>array1.c</tt> and <tt>array2.c</tt> have some example 
uses of arrays.  </p>

<p><b>Exercise:</b> complete and test the function <tt>minimum</tt> 
in <tt>array2.c</tt>. </p>
<p>
<font color="red">Example:</font> <a href="stackarray.html">Here</a> is an 
example function call and a stack drawing showing an example of an array
parameter.  </p>

<br>
<br>
<div class="TagLine" id="strings"> Strings </div>

Strings in C are just arrays of characters terminated by a special 
null character value '\0'.  Not every array of char is used as a C string,
but every string is an array of char. 
C has a string library that contains functions
for manipulating C strings.  One thing to keep in mind as you use the
string library is that you are responsible for allocating the space for
the underlying char array, and that the terminating '\0' character needs
to be included in that space.  For example, to store the string "hi", 
you need an array of at least 3 chars (one to store 'h', one to store 'i',
and one to store '\0').  The string library functions will
determine the end of a string by searching for the '\0' character, they 
also will add that character to the end of any string they initialize for
you (e.g. strcpy will null terminate the destination string).
Here is a very simple example:
<pre>
#include &lt;string.h&gt;

int main() {
  char str1[10];
  char str2[10];
  str1[0] = 'h';
  str1[1] = 'i'; 
  str1[2] = '\0'; 
  printf("%s %d\n", str1, strlen(str1));  // prints hi 2 to stdout
  strcpy(str2, str1);    // strcpy copies the contents of str1 to str2  
  printf("%s\n", str2);  // prints hi to stdout
}
</pre>
See my <a href="http://www.cs.swarthmore.edu/~newhall/unixhelp/C_strings.html">Strings in C</a> documentation for more string and string library examples. 
In particular look at the string library functions <tt>strlen</tt>,
<tt>strcpy</tt> and <tt>strcmp</tt>.
(note: some of the example code here use dynamically allocated strings, 
which we have not yet learned).
<br>
<br>

<div class="TagLine" id="structs"> Structs Part 1</div>

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
<p>See <tt>struct.c</tt> for more examples. 
<br><b>Exercise:</b> implement and test two functions in this file: printStudent
and initStudent.

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


</div> <!--content-->
  <div id="Footer">
<p>
<!--Common footer text/images-->
<br>
<small>
<!--File/php last-edited time stamping-->
Last updated: Wednesday, January 31, 2018 at 11:40:32 PM</small>
</div>
 <!--Usually in central/common location-->
</div> <!--wrapper-->
</body>
</html>
