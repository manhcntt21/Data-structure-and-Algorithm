<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>gdb assembly debuggin</title>

<style type="text/css">
@import url("style/stylesheet_hw.css");
</style>
</head>

<body> 
<div id="Wrapper"> 
  <div id="HeadImgMed"> 
    <div id="HeaderSmall">
            <h1>Debugging IA32 Assembly Code 
<br>with gdb (and ddd)</h1>
	  </div>
  </div> <!--Header image box-->
        <div class="TagLine">
        IA32 assembly, gdb disassemble
        </div>
     
  <div id="Content">

<h2>gdb disassemble and instruction stepping </h2> 

With gdb you can execute individual IA32 instructions, examine register 
values, and disassemble functions.   
<p>
This example runs through some gdb instruction level debugging using
the very simple C program example:
<pre>
// gcc -m32 -S simpleops.c   
void main() {

   int x, y;

   x = 1;
   x = x + 2;
   x = x - 14;
   y = x*100;
   x = x + y * 6;
}
</pre>
Compile this using:
 <pre>
  gcc -m32 -o simpleops simpleops.c
</pre>
With this added flag, the generated IA32 code will be a little easier to read:
 <pre>
 gcc -m32 -fno-asynchronous-unwind-tables -o simpleops simpleops.c
</pre>
<p>
Start gdb on the executable <tt>simpleops</tt>.  Add a breakpoint in main, 
and then start runing the program with <tt>(gdb) run</tt>:

<pre>
gdb simipleops
(gdb) break main
(gdb) run
</pre>
In gdb you can disassemble code using the disass command:
<pre>
(gdb) <b>disass</b> main
</pre>
You can set a break point at a specific instruction:
<pre>
(gdb) <b>break *0x080483c1</b>   # set breakpoint at specified address 
(gdb) cont
(gdb) disass 
</pre>
And you can step or next at the instruction level using ni or si
(si steps into function calls, ni skips over them):
<pre>
(gdb) <b>ni</b>	  # execute the next instruction then gdb gets control again 
(gdb) ni
(gdb) ni
(gdb) ni
(gdb) ni
(gdb) disass
</pre>

You can print out the values of individual registers like this:
<pre>
(gdb) <b>print $eax</b>
</pre>
You can also view all register values:
<pre>
(gdb) <b>info registers</b>
</pre>
You can also use the display command to automatically display values each 
time a breakpoint is reached:
<pre>
(gdb) <b>display $eax</b>
(gdb) <b>display $edx</b>
</pre>

<h3>ddd</h3>

ddd is a gui interface on top of a debugger (gdb in this case).  It has 
a nicer interface for viewing assembly, registers, and stepping through 
IA32 instruction execution than command line gdb:
<pre>
ddd simpleops
</pre>
The gdb prompt is in the bottom window.  There are also menu options and
buttons for gdb commands, but I find using the gdb prompt at the bottom
easier to use.  
<p>
You can view the assembly code by selecting the 
<b>View-&gt;Machine Code Window</b> menu option.  You will want to resize
this part to make it larger.
<p>
You can view the register values as the program runs 
(choose <b>Status-&gt;Registers</b> to open the register window).

<br>
<br>
<h3> Quick summary of some useful gdb commands for debugging at the
assembly code level (showing maded-up examples):</h3>
<pre>
  ddd a.out
  (gdb) break main
  (gdb) run  6              # run with the command line argument 6
  (gdb) disass main         # disassemble the main function
  (gdb) break sum           # set a break point at the beginning of a function
  (gdb) cont                # continue execution of the program
  (gdb) break *0x0804851a   # set a break point at memory address 0x0804851a
  (gdb) ni                  # execute the next instruction
  (gdb) si                  # step into a function call (step instruction)
  (gdb) info registers      # list the register contents
  (gdb) p $eax              # print the value stored in register %eax
  (gdb) p  *(int *)($ebp+8) # print out value of an int at addr (%ebp+8)
  (gdb) x/d $ebp+8          # examine the contents of memory at the given
                            # address (/d: prints the value as an int)
                            # display type in x is sticky: subsequent x commands
                            # will display values in decimal until another type is
                            # specified (ex. x/a $ebp+8  # as an address in hex)
  (gdb) x/s 0x0800004       # examine contents of memory at address as a string
  (gdb) x/wd 0xff5634       # after x/s, the unit size is 1 byte, so if want
                            # to examine as an int specify both the width w and d 
</pre>
<br>
<h3> More resources:</h3>
<p>
<ul>
<li> 
See my <a href="https://www.cs.swarthmore.edu/~newhall/unixhelp/howto_gdb.php">GDB Guide</a> for more information about using gdb and ddd.
<br>In particular, the <a href="https://www.cs.swarthmore.edu/~newhall/unixhelp/howto_gdb.php#assembly">using gdb to debug assembly code and examine memory and 
register values</a> and <a href="https://www.cs.swarthmore.edu/~newhall/unixhelp/howto_gdb.php#commands">Common commands</a> the sections of this guide are helpful for IA32 debugging.
</li>
<p>
<li>
Also see Chapter 3 of the textbook: <a href="https://diveintosystems.cs.swarthmore.edu">Dive into Systems</a>: (Chapter 3.5: debugging Assembly code with GDB)
</li>
</ul>


</div> <!--content--> 
<div id="Footer">
<p>
<!--Common footer text/images-->
<br>
<small>
<!--File/php last-edited time stamping-->
Last updated: Tuesday, September 24, 2019 at 04:20:03 PM</small>
</div>
</div> <!--wrapper-->
</body>
</html>
