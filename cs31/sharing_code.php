<html>
<body>
<h3>Some Ways to Share Code with your project partner</h3>

Here are three different ways to "transfer" code between you 
and your partner's accounts:
<ol>
<li> <b>email files back and forth</b>: running a browser on 
our system, email your file to your
partner as an attachment.  Your partner can run a browser from
his/her CS account and save the file, then move it into the correct
subdirectory using the mv command (the default may be to save the
file in your Desktop or Documents subdirectory, use cd and ls to 
see where your browser saved it, and do the mv from there):
<font size="6pt">
<pre>
mv workersDB.c ~/cs31/labs/01/.
</pre>
</font>
Or move it into a file with a different name to not wipe out your
version, and you can cut and paste changes between the two versions
in vim:
<font size="6pt">
<pre>
mv workersDB.c ~/cs31/labs/01/workersDB_new.c
</pre>
</font>
You can also use the find command to find where the heck the 
browser saved the file:
<font size="6pt">
<pre>
cd
find . -name workersDB.c
</pre>
</font>

<p>
<li>or <b>use scp (secure copy)</b> to copy a file to/from your account
from/to your partner's.  For example, assume that partner A has been
logged in and you are working on partner A's copy of you joint
solution.  To copy the file to partner B's account, partner A should
run scp:
<font size="6pt">
<pre>
# scp source  destination
scp workersDB.c partners_username@lab:./cs31/labs/01/workersDB_1.c
</pre>
</font>

scp will prompt partnerB to enter his/her password, and the file will 
be copied into their cs31/labs/01/ subdirectory.
Note that I'm using the relative path name to the file 
destination file: <tt>./cs31/labs/01/workersDB_1.c</tt>, I could also 
use the full path name: <tt>/home/partnerB/cs31/labs/01/workersDB_1.c</tt>
or with ~: <tt>~/cs31/labs/01/workersDB_1.c</tt>

<p>
As in the example above, I recommend naming the destination file
something other than workersDB.c so as not to overwrite
your partner's version of workersDB.c, potentially losing his/her changes.
Your partner can then decide whether or not to replace their
version with the version copied over via scp, and use the mv command 
to do so (or s/he can cut-and-paste content between the two files using vim):
<font size="6pt">
<pre>
# mv source destination
mv workersDB_1.c workersDB.c
</pre>
</font>
<p>
<li> or <b>cut and paste</b> on the same machine in vim:  have your 
partner ssh into a lab machine from a terminal on the machine you are 
logged into, open both files in vim and 
use the mouse to cut and paste all or some of the contents from one 
file to another. 
<p>
If you cut and paste code (either as above or between two of your
own files), the formatting can get really messed up because of vim's
auto-formatting C source code.  You can either avoid this by doing 
the following in command-mode before pasting to stop vim from auto-indenting:
<pre>
:set paste
</pre>
and  this turns paste-mode off
<pre>
:set nopaste
</pre>
or, you can re-format the pasted code in vim
by puting the cursor at the start of the line you want to select to start
reformating and scroll down (or shift-G to select to the end) and then
hit = (SHIFT-V, SHIFT-G, =) (visual select, go to last line, re-format)
<p>
<li> The best way to share code is to use revision control software, like
git.  git has support for creating a shared repository, grabbing each 
other's changes, auto merging them into your copy of your shared code, 
and keeping revision history of your shared code.
We may use git later in the semester, but for now I'd say use one of
the other methods above to share your changes with each other.

</ol>

</body>
</html>

