<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>IA32 addr modes</title>

<style type="text/css">
@import url("style/stylesheet_hw.css");
</style>
</head>

<body> 
<div id="Wrapper"> 
  <div id="HeadImgMed"> 
    <div id="HeaderSmall">
	    <h1>IA32 Addressing Modes and leal</h1>
	  </div>
  </div> <!--Header image box-->
<div class="TagLine">Complete Memory Addressing and leal</div> 
     
  <div id="Content">


<h2> IA32 General Memory Addressing </h2>

The complete memory addressing form is:
<br>&nbsp;&nbsp;<tt>D(Rb,Ri,S) &nbsp;  #   Mem[Reg[Rb]+S*Reg[Ri]+ D]</tt>
<pre>
 D,Rb,Ri,S are used together to compute a memory address
      Rb:     Base register             
      Ri:     Index register
      S:      Scale: often 1, 2, 4, or 8     Q: why 1, 2, 4 or 8?
      D:      Constant "displacement" 
     D(Rb,Ri,S)  # Mem[Reg[Rb]+S*Reg[Ri]+ D]   
</pre>
For example, an instruction could specify a memory operand as:
<pre>
addl 8(%ecx, %eax, 4), %edx  # R[%edx] &lt;-- M[R[%ecx] + 4*R[%eax] + 8]
</pre>
There are a lot of Special Cases of this general form 
(not all 4 values need to be present):          
<pre>
 D(Rb,Ri,S)  # Mem[Reg[Rb]+S*Reg[Ri]+ D]   The General Form
  (Rb,Ri,S)  # Mem[Reg[Rb]+S*Reg[Ri]]
   (Rb,Ri)   # Mem[Reg[Rb]+Reg[Ri]]
  D(Rb,Ri)   # Mem[Reg[Rb]+Reg[Ri]+D]
   (,Ri,S)   # Mem[S*Reg[Ri]]
  D(,Ri,S)   # Mem[S*Reg[Ri] + D]
  (Rb)       # Mem[Reg[Rb]]        we have already seen this form: (%eax)
  D(Rb)      # Mem[Reg[Rb]+D]      we have already seen this form: -8(%ebp)
  D          # Mem[D]              we have already seen this form: $10
</pre>
Let's try out some examples of computing address (fill in the table):
<pre>
Assume:
  %edx stores 0xf000
  %ecx stores 0x0100

Address Expression        Address Computation          Address
--------------------------------------------------------------
   0x8(%edx)
   (%edx, %ecx)
   (%edx, %ecx, 4)
   0x80(,%edx, 2)
</pre>
(<a href="addranswers.html">answers</a>)

<hr>
<h2>Introduction to the leal instruction</h2>

Load effective address:    <tt>leal S,D  # D&lt;--&amp;S</tt>,
where D must be a register, and S is a Memory operand. 
<p>
leal looks like a mov instr, but <b>does not access Memory</b>.
Instead, it takes advantage of the addressing circuitry and
uses it to do arithmetic (as opposed to generating multiple
arithmetic instructions to do arithmetic).
<pre>
(ex) if edx holds the value of x:
 leal (%eax),%ecx  # R[%ecx]&lt;--&amp;(M[R[%eax]])       
 # this moves the value stored in %eax to %ecx
</pre>
The key is that <b>the address of (M[ at address x ])  is x</b>,
so this is moving the value stored in %eax to %ecx; 
there is no memory access in this instruction's execution.
<p>
Examples:
<pre>
Assume:   %eax: x    %edx: y

leal (%eax), %ecx               # R[%ecx] &lt;-- x
leal 6(%eax), %ecx              # R[%ecx] &lt;-- x+6
leal 7(%edx, %edx, 4), %ecx     # R[%ecx] &lt;-- 5y + 7 (y + 4y+ 7)
leal 10(%eax, %edx, 5), %ecx    # R[%ecx] &lt;-- x + 5y + 10: 
</pre>
leal appears often in compiler generated code.  You can think
of leal as nice shorthand for computing expressions that follow the 
address computation pattern. 
<p>
One thing to keep in mind is that leal is not a regular arithmetic instruction.
This means that unlike the regular arithmetic instructions
leal does NOT set condition codes.  If a computation part of a condional 
expression whose result a conditional jump instruction will use, leal 
cannot be used (add or mult instructions need to be used in this case).


<br>
<br>

</div> <!--content--> 
<div id="Footer">
<p>
<!--Common footer text/images-->
<br>
<small>
<!--File/php last-edited time stamping-->
Last updated: Saturday, October 03, 2015 at 12:23:10 PM</small>
</div>
</div> <!--wrapper-->
</body>
</html>
