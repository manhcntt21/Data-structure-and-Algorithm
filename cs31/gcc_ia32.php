<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>gcc and IA32</title>

<style type="text/css">
@import url("style/stylesheet_hw.css");
</style>
</head>

<body> 
<div id="Wrapper"> 
  <div id="HeadImgMed"> 
    <div id="HeaderSmall">
	    <h1>Compiling to IA32 Assembly</h1>
	  </div>
  </div> <!--Header image box-->
        <div class="TagLine">
        IA32 assembly, gcc, objdump
        </div>
     
  <div id="Content">

<h2>gcc to generate IA32 assembly </h2> 


Using this very simple C program as an example:
<pre>
void main() {
   int x, y;
   x = 1;
   x = x + 2;
   x = x - 14;
   y = x*100;
   x = x + y * 6;
}
</pre>
You can compile to IA32 assembly, to a .o file, and to an executable file
and compare the assembly code in each one:
<p>
To compile to the 32-bit version of x86 instructions, use the <tt>-m32</tt> 
flag (and version 4.4 generates easier to read IA32 code):
<pre>
gcc -m32 -S simpleops.c   # just runs the assembler to create a .s text file
gcc -m32 -c simpleops.s   # compiles to a relocatable object binary file (.o) 
gcc -m32 -o simpleops simpleops.o  # creates a 32-bit executable file
</pre>

To see the machine code and assembly code mappings in the .o file:
<pre>
objdump -d simpleops.o
</pre>
You can compare this to the assembly file:
<pre>
cat simpleops.s
</pre>
will give you something like this (I've annotated some of the 
assembly code with its corresponding code from the C program):
<pre>
        .file   "simpleops.c"
        .text
.globl main
        .type   main, @function
main:
        pushl   %ebp
        movl    %esp, %ebp
        subl    $16, %esp
        movl    $1, -4(%ebp)      # x = 1
        addl    $2, -4(%ebp)      # x = x + 2
        subl    $14, -4(%ebp)     # x = x - 14
        movl    -4(%ebp), %eax    # load x into R[%eax]
        imull   $100, %eax, %eax  # into R[%eax] store result of x*100
        movl    %eax, -8(%ebp)    # y = x*100
        movl    -8(%ebp), %edx
        movl    %edx, %eax
        addl    %eax, %eax
        addl    %edx, %eax
        addl    %eax, %eax
        addl    %eax, -4(%ebp)
        leave
        ret
        .size   main, .-main
        .ident  "GCC: (Ubuntu/Linaro 4.4.7-8ubuntu1) 4.4.7"
        .section        .note.GNU-stack,"",@progbits

</pre>

See my <a href="http://www.cs.swarthmore.edu/~newhall/unixhelp/compilecycle.html">Tools for examining different parts of compiling C</a> page for more information on objump and other tools for examinging binary code, and also some gcc compilation flags for production .o and .s files.


</div> <!--content--> 
<div id="Footer">
<p>
<!--Common footer text/images-->
<br>
<small>
<!--File/php last-edited time stamping-->
Last updated: Monday, October 09, 2017 at 09:21:14 PM</small>
</div>
</div> <!--wrapper-->
</body>
</html>
