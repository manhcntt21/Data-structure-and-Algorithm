// A very simple example C program that contains only arithmetic 
// expressions.  
// compile to assembly:
// gcc-4.4 -m32 -S simpleops.c   
// or just type make
// (newhall, 2013)
//
void main() {

   int x, y;

   x = 1;
   x = x + 2;
   x = x - 14;
   y = x*100;
   x = x + y * 6;
}
