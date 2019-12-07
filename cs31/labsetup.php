<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="Asciidoctor 1.5.7.1">
<title>Using Git for CS31 Labs</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic%7CNoto+Serif:400,400italic,700,700italic%7CDroid+Sans+Mono:400,700">
<style>
/* Asciidoctor default stylesheet | MIT License | http://asciidoctor.org */
/* Uncomment @import statement below to use as custom stylesheet */
/*@import "https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic%7CNoto+Serif:400,400italic,700,700italic%7CDroid+Sans+Mono:400,700";*/
article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}
audio,canvas,video{display:inline-block}
audio:not([controls]){display:none;height:0}
script{display:none!important}
html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}
a{background:transparent}
a:focus{outline:thin dotted}
a:active,a:hover{outline:0}
h1{font-size:2em;margin:.67em 0}
abbr[title]{border-bottom:1px dotted}
b,strong{font-weight:bold}
dfn{font-style:italic}
hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}
mark{background:#ff0;color:#000}
code,kbd,pre,samp{font-family:monospace;font-size:1em}
pre{white-space:pre-wrap}
q{quotes:"\201C" "\201D" "\2018" "\2019"}
small{font-size:80%}
sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}
sup{top:-.5em}
sub{bottom:-.25em}
img{border:0}
svg:not(:root){overflow:hidden}
figure{margin:0}
fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}
legend{border:0;padding:0}
button,input,select,textarea{font-family:inherit;font-size:100%;margin:0}
button,input{line-height:normal}
button,select{text-transform:none}
button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}
button[disabled],html input[disabled]{cursor:default}
input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}
button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}
textarea{overflow:auto;vertical-align:top}
table{border-collapse:collapse;border-spacing:0}
*,*::before,*::after{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}
html,body{font-size:100%}
body{background:#fff;color:rgba(0,0,0,.8);padding:0;margin:0;font-family:"Noto Serif","DejaVu Serif",serif;font-weight:400;font-style:normal;line-height:1;position:relative;cursor:auto;tab-size:4;-moz-osx-font-smoothing:grayscale;-webkit-font-smoothing:antialiased}
a:hover{cursor:pointer}
img,object,embed{max-width:100%;height:auto}
object,embed{height:100%}
img{-ms-interpolation-mode:bicubic}
.left{float:left!important}
.right{float:right!important}
.text-left{text-align:left!important}
.text-right{text-align:right!important}
.text-center{text-align:center!important}
.text-justify{text-align:justify!important}
.hide{display:none}
img,object,svg{display:inline-block;vertical-align:middle}
textarea{height:auto;min-height:50px}
select{width:100%}
.center{margin-left:auto;margin-right:auto}
.stretch{width:100%}
.subheader,.admonitionblock td.content>.title,.audioblock>.title,.exampleblock>.title,.imageblock>.title,.listingblock>.title,.literalblock>.title,.stemblock>.title,.openblock>.title,.paragraph>.title,.quoteblock>.title,table.tableblock>.title,.verseblock>.title,.videoblock>.title,.dlist>.title,.olist>.title,.ulist>.title,.qlist>.title,.hdlist>.title{line-height:1.45;color:#7a2518;font-weight:400;margin-top:0;margin-bottom:.25em}
div,dl,dt,dd,ul,ol,li,h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6,pre,form,p,blockquote,th,td{margin:0;padding:0;direction:ltr}
a{color:#2156a5;text-decoration:underline;line-height:inherit}
a:hover,a:focus{color:#1d4b8f}
a img{border:none}
p{font-family:inherit;font-weight:400;font-size:1em;line-height:1.6;margin-bottom:1.25em;text-rendering:optimizeLegibility}
p aside{font-size:.875em;line-height:1.35;font-style:italic}
h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6{font-family:"Open Sans","DejaVu Sans",sans-serif;font-weight:300;font-style:normal;color:#ba3925;text-rendering:optimizeLegibility;margin-top:1em;margin-bottom:.5em;line-height:1.0125em}
h1 small,h2 small,h3 small,#toctitle small,.sidebarblock>.content>.title small,h4 small,h5 small,h6 small{font-size:60%;color:#e99b8f;line-height:0}
h1{font-size:2.125em}
h2{font-size:1.6875em}
h3,#toctitle,.sidebarblock>.content>.title{font-size:1.375em}
h4,h5{font-size:1.125em}
h6{font-size:1em}
hr{border:solid #ddddd8;border-width:1px 0 0;clear:both;margin:1.25em 0 1.1875em;height:0}
em,i{font-style:italic;line-height:inherit}
strong,b{font-weight:bold;line-height:inherit}
small{font-size:60%;line-height:inherit}
code{font-family:"Droid Sans Mono","DejaVu Sans Mono",monospace;font-weight:400;color:rgba(0,0,0,.9)}
ul,ol,dl{font-size:1em;line-height:1.6;margin-bottom:1.25em;list-style-position:outside;font-family:inherit}
ul,ol{margin-left:1.5em}
ul li ul,ul li ol{margin-left:1.25em;margin-bottom:0;font-size:1em}
ul.square li ul,ul.circle li ul,ul.disc li ul{list-style:inherit}
ul.square{list-style-type:square}
ul.circle{list-style-type:circle}
ul.disc{list-style-type:disc}
ol li ul,ol li ol{margin-left:1.25em;margin-bottom:0}
dl dt{margin-bottom:.3125em;font-weight:bold}
dl dd{margin-bottom:1.25em}
abbr,acronym{text-transform:uppercase;font-size:90%;color:rgba(0,0,0,.8);border-bottom:1px dotted #ddd;cursor:help}
abbr{text-transform:none}
blockquote{margin:0 0 1.25em;padding:.5625em 1.25em 0 1.1875em;border-left:1px solid #ddd}
blockquote cite{display:block;font-size:.9375em;color:rgba(0,0,0,.6)}
blockquote cite::before{content:"\2014 \0020"}
blockquote cite a,blockquote cite a:visited{color:rgba(0,0,0,.6)}
blockquote,blockquote p{line-height:1.6;color:rgba(0,0,0,.85)}
@media screen and (min-width:768px){h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6{line-height:1.2}
h1{font-size:2.75em}
h2{font-size:2.3125em}
h3,#toctitle,.sidebarblock>.content>.title{font-size:1.6875em}
h4{font-size:1.4375em}}
table{background:#fff;margin-bottom:1.25em;border:solid 1px #dedede}
table thead,table tfoot{background:#f7f8f7}
table thead tr th,table thead tr td,table tfoot tr th,table tfoot tr td{padding:.5em .625em .625em;font-size:inherit;color:rgba(0,0,0,.8);text-align:left}
table tr th,table tr td{padding:.5625em .625em;font-size:inherit;color:rgba(0,0,0,.8)}
table tr.even,table tr.alt,table tr:nth-of-type(even){background:#f8f8f7}
table thead tr th,table tfoot tr th,table tbody tr td,table tr td,table tfoot tr td{display:table-cell;line-height:1.6}
h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6{line-height:1.2;word-spacing:-.05em}
h1 strong,h2 strong,h3 strong,#toctitle strong,.sidebarblock>.content>.title strong,h4 strong,h5 strong,h6 strong{font-weight:400}
.clearfix::before,.clearfix::after,.float-group::before,.float-group::after{content:" ";display:table}
.clearfix::after,.float-group::after{clear:both}
*:not(pre)>code{font-size:.9375em;font-style:normal!important;letter-spacing:0;padding:.1em .5ex;word-spacing:-.15em;background-color:#f7f7f8;-webkit-border-radius:4px;border-radius:4px;line-height:1.45;text-rendering:optimizeSpeed;word-wrap:break-word}
*:not(pre)>code.nobreak{word-wrap:normal}
*:not(pre)>code.nowrap{white-space:nowrap}
pre,pre>code{line-height:1.45;color:rgba(0,0,0,.9);font-family:"Droid Sans Mono","DejaVu Sans Mono",monospace;font-weight:400;text-rendering:optimizeSpeed}
em em{font-style:normal}
strong strong{font-weight:400}
.keyseq{color:rgba(51,51,51,.8)}
kbd{font-family:"Droid Sans Mono","DejaVu Sans Mono",monospace;display:inline-block;color:rgba(0,0,0,.8);font-size:.65em;line-height:1.45;background-color:#f7f7f7;border:1px solid #ccc;-webkit-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.2),0 0 0 .1em white inset;box-shadow:0 1px 0 rgba(0,0,0,.2),0 0 0 .1em #fff inset;margin:0 .15em;padding:.2em .5em;vertical-align:middle;position:relative;top:-.1em;white-space:nowrap}
.keyseq kbd:first-child{margin-left:0}
.keyseq kbd:last-child{margin-right:0}
.menuseq,.menuref{color:#000}
.menuseq b:not(.caret),.menuref{font-weight:inherit}
.menuseq{word-spacing:-.02em}
.menuseq b.caret{font-size:1.25em;line-height:.8}
.menuseq i.caret{font-weight:bold;text-align:center;width:.45em}
b.button::before,b.button::after{position:relative;top:-1px;font-weight:400}
b.button::before{content:"[";padding:0 3px 0 2px}
b.button::after{content:"]";padding:0 2px 0 3px}
p a>code:hover{color:rgba(0,0,0,.9)}
#header,#content,#footnotes,#footer{width:100%;margin-left:auto;margin-right:auto;margin-top:0;margin-bottom:0;max-width:62.5em;*zoom:1;position:relative;padding-left:.9375em;padding-right:.9375em}
#header::before,#header::after,#content::before,#content::after,#footnotes::before,#footnotes::after,#footer::before,#footer::after{content:" ";display:table}
#header::after,#content::after,#footnotes::after,#footer::after{clear:both}
#content{margin-top:1.25em}
#content::before{content:none}
#header>h1:first-child{color:rgba(0,0,0,.85);margin-top:2.25rem;margin-bottom:0}
#header>h1:first-child+#toc{margin-top:8px;border-top:1px solid #ddddd8}
#header>h1:only-child,body.toc2 #header>h1:nth-last-child(2){border-bottom:1px solid #ddddd8;padding-bottom:8px}
#header .details{border-bottom:1px solid #ddddd8;line-height:1.45;padding-top:.25em;padding-bottom:.25em;padding-left:.25em;color:rgba(0,0,0,.6);display:-ms-flexbox;display:-webkit-flex;display:flex;-ms-flex-flow:row wrap;-webkit-flex-flow:row wrap;flex-flow:row wrap}
#header .details span:first-child{margin-left:-.125em}
#header .details span.email a{color:rgba(0,0,0,.85)}
#header .details br{display:none}
#header .details br+span::before{content:"\00a0\2013\00a0"}
#header .details br+span.author::before{content:"\00a0\22c5\00a0";color:rgba(0,0,0,.85)}
#header .details br+span#revremark::before{content:"\00a0|\00a0"}
#header #revnumber{text-transform:capitalize}
#header #revnumber::after{content:"\00a0"}
#content>h1:first-child:not([class]){color:rgba(0,0,0,.85);border-bottom:1px solid #ddddd8;padding-bottom:8px;margin-top:0;padding-top:1rem;margin-bottom:1.25rem}
#toc{border-bottom:1px solid #efefed;padding-bottom:.5em}
#toc>ul{margin-left:.125em}
#toc ul.sectlevel0>li>a{font-style:italic}
#toc ul.sectlevel0 ul.sectlevel1{margin:.5em 0}
#toc ul{font-family:"Open Sans","DejaVu Sans",sans-serif;list-style-type:none}
#toc li{line-height:1.3334;margin-top:.3334em}
#toc a{text-decoration:none}
#toc a:active{text-decoration:underline}
#toctitle{color:#7a2518;font-size:1.2em}
@media screen and (min-width:768px){#toctitle{font-size:1.375em}
body.toc2{padding-left:15em;padding-right:0}
#toc.toc2{margin-top:0!important;background-color:#f8f8f7;position:fixed;width:15em;left:0;top:0;border-right:1px solid #efefed;border-top-width:0!important;border-bottom-width:0!important;z-index:1000;padding:1.25em 1em;height:100%;overflow:auto}
#toc.toc2 #toctitle{margin-top:0;margin-bottom:.8rem;font-size:1.2em}
#toc.toc2>ul{font-size:.9em;margin-bottom:0}
#toc.toc2 ul ul{margin-left:0;padding-left:1em}
#toc.toc2 ul.sectlevel0 ul.sectlevel1{padding-left:0;margin-top:.5em;margin-bottom:.5em}
body.toc2.toc-right{padding-left:0;padding-right:15em}
body.toc2.toc-right #toc.toc2{border-right-width:0;border-left:1px solid #efefed;left:auto;right:0}}
@media screen and (min-width:1280px){body.toc2{padding-left:20em;padding-right:0}
#toc.toc2{width:20em}
#toc.toc2 #toctitle{font-size:1.375em}
#toc.toc2>ul{font-size:.95em}
#toc.toc2 ul ul{padding-left:1.25em}
body.toc2.toc-right{padding-left:0;padding-right:20em}}
#content #toc{border-style:solid;border-width:1px;border-color:#e0e0dc;margin-bottom:1.25em;padding:1.25em;background:#f8f8f7;-webkit-border-radius:4px;border-radius:4px}
#content #toc>:first-child{margin-top:0}
#content #toc>:last-child{margin-bottom:0}
#footer{max-width:100%;background-color:rgba(0,0,0,.8);padding:1.25em}
#footer-text{color:rgba(255,255,255,.8);line-height:1.44}
#content{margin-bottom:.625em}
.sect1{padding-bottom:.625em}
@media screen and (min-width:768px){#content{margin-bottom:1.25em}
.sect1{padding-bottom:1.25em}}
.sect1:last-child{padding-bottom:0}
.sect1+.sect1{border-top:1px solid #efefed}
#content h1>a.anchor,h2>a.anchor,h3>a.anchor,#toctitle>a.anchor,.sidebarblock>.content>.title>a.anchor,h4>a.anchor,h5>a.anchor,h6>a.anchor{position:absolute;z-index:1001;width:1.5ex;margin-left:-1.5ex;display:block;text-decoration:none!important;visibility:hidden;text-align:center;font-weight:400}
#content h1>a.anchor::before,h2>a.anchor::before,h3>a.anchor::before,#toctitle>a.anchor::before,.sidebarblock>.content>.title>a.anchor::before,h4>a.anchor::before,h5>a.anchor::before,h6>a.anchor::before{content:"\00A7";font-size:.85em;display:block;padding-top:.1em}
#content h1:hover>a.anchor,#content h1>a.anchor:hover,h2:hover>a.anchor,h2>a.anchor:hover,h3:hover>a.anchor,#toctitle:hover>a.anchor,.sidebarblock>.content>.title:hover>a.anchor,h3>a.anchor:hover,#toctitle>a.anchor:hover,.sidebarblock>.content>.title>a.anchor:hover,h4:hover>a.anchor,h4>a.anchor:hover,h5:hover>a.anchor,h5>a.anchor:hover,h6:hover>a.anchor,h6>a.anchor:hover{visibility:visible}
#content h1>a.link,h2>a.link,h3>a.link,#toctitle>a.link,.sidebarblock>.content>.title>a.link,h4>a.link,h5>a.link,h6>a.link{color:#ba3925;text-decoration:none}
#content h1>a.link:hover,h2>a.link:hover,h3>a.link:hover,#toctitle>a.link:hover,.sidebarblock>.content>.title>a.link:hover,h4>a.link:hover,h5>a.link:hover,h6>a.link:hover{color:#a53221}
.audioblock,.imageblock,.literalblock,.listingblock,.stemblock,.videoblock{margin-bottom:1.25em}
.admonitionblock td.content>.title,.audioblock>.title,.exampleblock>.title,.imageblock>.title,.listingblock>.title,.literalblock>.title,.stemblock>.title,.openblock>.title,.paragraph>.title,.quoteblock>.title,table.tableblock>.title,.verseblock>.title,.videoblock>.title,.dlist>.title,.olist>.title,.ulist>.title,.qlist>.title,.hdlist>.title{text-rendering:optimizeLegibility;text-align:left;font-family:"Noto Serif","DejaVu Serif",serif;font-size:1rem;font-style:italic}
table.tableblock.fit-content>caption.title{white-space:nowrap;width:0}
.paragraph.lead>p,#preamble>.sectionbody>[class="paragraph"]:first-of-type p{font-size:1.21875em;line-height:1.6;color:rgba(0,0,0,.85)}
table.tableblock #preamble>.sectionbody>[class="paragraph"]:first-of-type p{font-size:inherit}
.admonitionblock>table{border-collapse:separate;border:0;background:none;width:100%}
.admonitionblock>table td.icon{text-align:center;width:80px}
.admonitionblock>table td.icon img{max-width:none}
.admonitionblock>table td.icon .title{font-weight:bold;font-family:"Open Sans","DejaVu Sans",sans-serif;text-transform:uppercase}
.admonitionblock>table td.content{padding-left:1.125em;padding-right:1.25em;border-left:1px solid #ddddd8;color:rgba(0,0,0,.6)}
.admonitionblock>table td.content>:last-child>:last-child{margin-bottom:0}
.exampleblock>.content{border-style:solid;border-width:1px;border-color:#e6e6e6;margin-bottom:1.25em;padding:1.25em;background:#fff;-webkit-border-radius:4px;border-radius:4px}
.exampleblock>.content>:first-child{margin-top:0}
.exampleblock>.content>:last-child{margin-bottom:0}
.sidebarblock{border-style:solid;border-width:1px;border-color:#e0e0dc;margin-bottom:1.25em;padding:1.25em;background:#f8f8f7;-webkit-border-radius:4px;border-radius:4px}
.sidebarblock>:first-child{margin-top:0}
.sidebarblock>:last-child{margin-bottom:0}
.sidebarblock>.content>.title{color:#7a2518;margin-top:0;text-align:center}
.exampleblock>.content>:last-child>:last-child,.exampleblock>.content .olist>ol>li:last-child>:last-child,.exampleblock>.content .ulist>ul>li:last-child>:last-child,.exampleblock>.content .qlist>ol>li:last-child>:last-child,.sidebarblock>.content>:last-child>:last-child,.sidebarblock>.content .olist>ol>li:last-child>:last-child,.sidebarblock>.content .ulist>ul>li:last-child>:last-child,.sidebarblock>.content .qlist>ol>li:last-child>:last-child{margin-bottom:0}
.literalblock pre,.listingblock pre:not(.highlight),.listingblock pre[class="highlight"],.listingblock pre[class^="highlight "],.listingblock pre.CodeRay,.listingblock pre.prettyprint{background:#f7f7f8}
.sidebarblock .literalblock pre,.sidebarblock .listingblock pre:not(.highlight),.sidebarblock .listingblock pre[class="highlight"],.sidebarblock .listingblock pre[class^="highlight "],.sidebarblock .listingblock pre.CodeRay,.sidebarblock .listingblock pre.prettyprint{background:#f2f1f1}
.literalblock pre,.literalblock pre[class],.listingblock pre,.listingblock pre[class]{-webkit-border-radius:4px;border-radius:4px;word-wrap:break-word;padding:1em;font-size:.8125em}
.literalblock pre.nowrap,.literalblock pre[class].nowrap,.listingblock pre.nowrap,.listingblock pre[class].nowrap{overflow-x:auto;white-space:pre;word-wrap:normal}
@media screen and (min-width:768px){.literalblock pre,.literalblock pre[class],.listingblock pre,.listingblock pre[class]{font-size:.90625em}}
@media screen and (min-width:1280px){.literalblock pre,.literalblock pre[class],.listingblock pre,.listingblock pre[class]{font-size:1em}}
.literalblock.output pre{color:#f7f7f8;background-color:rgba(0,0,0,.9)}
.listingblock pre.highlightjs{padding:0}
.listingblock pre.highlightjs>code{padding:1em;-webkit-border-radius:4px;border-radius:4px}
.listingblock pre.prettyprint{border-width:0}
.listingblock>.content{position:relative}
.listingblock code[data-lang]::before{display:none;content:attr(data-lang);position:absolute;font-size:.75em;top:.425rem;right:.5rem;line-height:1;text-transform:uppercase;color:#999}
.listingblock:hover code[data-lang]::before{display:block}
.listingblock.terminal pre .command::before{content:attr(data-prompt);padding-right:.5em;color:#999}
.listingblock.terminal pre .command:not([data-prompt])::before{content:"$"}
table.pyhltable{border-collapse:separate;border:0;margin-bottom:0;background:none}
table.pyhltable td{vertical-align:top;padding-top:0;padding-bottom:0;line-height:1.45}
table.pyhltable td.code{padding-left:.75em;padding-right:0}
pre.pygments .lineno,table.pyhltable td:not(.code){color:#999;padding-left:0;padding-right:.5em;border-right:1px solid #ddddd8}
pre.pygments .lineno{display:inline-block;margin-right:.25em}
table.pyhltable .linenodiv{background:none!important;padding-right:0!important}
.quoteblock{margin:0 1em 1.25em 1.5em;display:table}
.quoteblock>.title{margin-left:-1.5em;margin-bottom:.75em}
.quoteblock blockquote,.quoteblock blockquote p{color:rgba(0,0,0,.85);font-size:1.15rem;line-height:1.75;word-spacing:.1em;letter-spacing:0;font-style:italic;text-align:justify}
.quoteblock blockquote{margin:0;padding:0;border:0}
.quoteblock blockquote::before{content:"\201c";float:left;font-size:2.75em;font-weight:bold;line-height:.6em;margin-left:-.6em;color:#7a2518;text-shadow:0 1px 2px rgba(0,0,0,.1)}
.quoteblock blockquote>.paragraph:last-child p{margin-bottom:0}
.quoteblock .attribution{margin-top:.5em;margin-right:.5ex;text-align:right}
.quoteblock .quoteblock{margin-left:0;margin-right:0;padding:.5em 0;border-left:3px solid rgba(0,0,0,.6)}
.quoteblock .quoteblock blockquote{padding:0 0 0 .75em}
.quoteblock .quoteblock blockquote::before{display:none}
.verseblock{margin:0 1em 1.25em}
.verseblock pre{font-family:"Open Sans","DejaVu Sans",sans;font-size:1.15rem;color:rgba(0,0,0,.85);font-weight:300;text-rendering:optimizeLegibility}
.verseblock pre strong{font-weight:400}
.verseblock .attribution{margin-top:1.25rem;margin-left:.5ex}
.quoteblock .attribution,.verseblock .attribution{font-size:.9375em;line-height:1.45;font-style:italic}
.quoteblock .attribution br,.verseblock .attribution br{display:none}
.quoteblock .attribution cite,.verseblock .attribution cite{display:block;letter-spacing:-.025em;color:rgba(0,0,0,.6)}
.quoteblock.abstract{margin:0 1em 1.25em;display:block}
.quoteblock.abstract>.title{margin:0 0 .375em;font-size:1.15em;text-align:center}
.quoteblock.abstract blockquote,.quoteblock.abstract blockquote p{word-spacing:0;line-height:1.6}
.quoteblock.abstract blockquote::before,.quoteblock.abstract p::before{display:none}
table.tableblock{max-width:100%;border-collapse:separate}
p.tableblock:last-child{margin-bottom:0}
td.tableblock>.content{margin-bottom:-1.25em}
table.tableblock,th.tableblock,td.tableblock{border:0 solid #dedede}
table.grid-all>thead>tr>.tableblock,table.grid-all>tbody>tr>.tableblock{border-width:0 1px 1px 0}
table.grid-all>tfoot>tr>.tableblock{border-width:1px 1px 0 0}
table.grid-cols>*>tr>.tableblock{border-width:0 1px 0 0}
table.grid-rows>thead>tr>.tableblock,table.grid-rows>tbody>tr>.tableblock{border-width:0 0 1px}
table.grid-rows>tfoot>tr>.tableblock{border-width:1px 0 0}
table.grid-all>*>tr>.tableblock:last-child,table.grid-cols>*>tr>.tableblock:last-child{border-right-width:0}
table.grid-all>tbody>tr:last-child>.tableblock,table.grid-all>thead:last-child>tr>.tableblock,table.grid-rows>tbody>tr:last-child>.tableblock,table.grid-rows>thead:last-child>tr>.tableblock{border-bottom-width:0}
table.frame-all{border-width:1px}
table.frame-sides{border-width:0 1px}
table.frame-topbot,table.frame-ends{border-width:1px 0}
table.stripes-all tr,table.stripes-odd tr:nth-of-type(odd){background:#f8f8f7}
table.stripes-none tr,table.stripes-odd tr:nth-of-type(even){background:none}
th.halign-left,td.halign-left{text-align:left}
th.halign-right,td.halign-right{text-align:right}
th.halign-center,td.halign-center{text-align:center}
th.valign-top,td.valign-top{vertical-align:top}
th.valign-bottom,td.valign-bottom{vertical-align:bottom}
th.valign-middle,td.valign-middle{vertical-align:middle}
table thead th,table tfoot th{font-weight:bold}
tbody tr th{display:table-cell;line-height:1.6;background:#f7f8f7}
tbody tr th,tbody tr th p,tfoot tr th,tfoot tr th p{color:rgba(0,0,0,.8);font-weight:bold}
p.tableblock>code:only-child{background:none;padding:0}
p.tableblock{font-size:1em}
td>div.verse{white-space:pre}
ol{margin-left:1.75em}
ul li ol{margin-left:1.5em}
dl dd{margin-left:1.125em}
dl dd:last-child,dl dd:last-child>:last-child{margin-bottom:0}
ol>li p,ul>li p,ul dd,ol dd,.olist .olist,.ulist .ulist,.ulist .olist,.olist .ulist{margin-bottom:.625em}
ul.checklist,ul.none,ol.none,ul.no-bullet,ol.no-bullet,ol.unnumbered,ul.unstyled,ol.unstyled{list-style-type:none}
ul.no-bullet,ol.no-bullet,ol.unnumbered{margin-left:.625em}
ul.unstyled,ol.unstyled{margin-left:0}
ul.checklist{margin-left:.625em}
ul.checklist li>p:first-child>.fa-square-o:first-child,ul.checklist li>p:first-child>.fa-check-square-o:first-child{width:1.25em;font-size:.8em;position:relative;bottom:.125em}
ul.checklist li>p:first-child>input[type="checkbox"]:first-child{margin-right:.25em}
ul.inline{display:-ms-flexbox;display:-webkit-box;display:flex;-ms-flex-flow:row wrap;-webkit-flex-flow:row wrap;flex-flow:row wrap;list-style:none;margin:0 0 .625em -1.25em}
ul.inline>li{margin-left:1.25em}
.unstyled dl dt{font-weight:400;font-style:normal}
ol.arabic{list-style-type:decimal}
ol.decimal{list-style-type:decimal-leading-zero}
ol.loweralpha{list-style-type:lower-alpha}
ol.upperalpha{list-style-type:upper-alpha}
ol.lowerroman{list-style-type:lower-roman}
ol.upperroman{list-style-type:upper-roman}
ol.lowergreek{list-style-type:lower-greek}
.hdlist>table,.colist>table{border:0;background:none}
.hdlist>table>tbody>tr,.colist>table>tbody>tr{background:none}
td.hdlist1,td.hdlist2{vertical-align:top;padding:0 .625em}
td.hdlist1{font-weight:bold;padding-bottom:1.25em}
.literalblock+.colist,.listingblock+.colist{margin-top:-.5em}
.colist td:not([class]):first-child{padding:.4em .75em 0;line-height:1;vertical-align:top}
.colist td:not([class]):first-child img{max-width:none}
.colist td:not([class]):last-child{padding:.25em 0}
.thumb,.th{line-height:0;display:inline-block;border:solid 4px #fff;-webkit-box-shadow:0 0 0 1px #ddd;box-shadow:0 0 0 1px #ddd}
.imageblock.left,.imageblock[style*="float: left"]{margin:.25em .625em 1.25em 0}
.imageblock.right,.imageblock[style*="float: right"]{margin:.25em 0 1.25em .625em}
.imageblock>.title{margin-bottom:0}
.imageblock.thumb,.imageblock.th{border-width:6px}
.imageblock.thumb>.title,.imageblock.th>.title{padding:0 .125em}
.image.left,.image.right{margin-top:.25em;margin-bottom:.25em;display:inline-block;line-height:0}
.image.left{margin-right:.625em}
.image.right{margin-left:.625em}
a.image{text-decoration:none;display:inline-block}
a.image object{pointer-events:none}
sup.footnote,sup.footnoteref{font-size:.875em;position:static;vertical-align:super}
sup.footnote a,sup.footnoteref a{text-decoration:none}
sup.footnote a:active,sup.footnoteref a:active{text-decoration:underline}
#footnotes{padding-top:.75em;padding-bottom:.75em;margin-bottom:.625em}
#footnotes hr{width:20%;min-width:6.25em;margin:-.25em 0 .75em;border-width:1px 0 0}
#footnotes .footnote{padding:0 .375em 0 .225em;line-height:1.3334;font-size:.875em;margin-left:1.2em;margin-bottom:.2em}
#footnotes .footnote a:first-of-type{font-weight:bold;text-decoration:none;margin-left:-1.05em}
#footnotes .footnote:last-of-type{margin-bottom:0}
#content #footnotes{margin-top:-.625em;margin-bottom:0;padding:.75em 0}
.gist .file-data>table{border:0;background:#fff;width:100%;margin-bottom:0}
.gist .file-data>table td.line-data{width:99%}
div.unbreakable{page-break-inside:avoid}
.big{font-size:larger}
.small{font-size:smaller}
.underline{text-decoration:underline}
.overline{text-decoration:overline}
.line-through{text-decoration:line-through}
.aqua{color:#00bfbf}
.aqua-background{background-color:#00fafa}
.black{color:#000}
.black-background{background-color:#000}
.blue{color:#0000bf}
.blue-background{background-color:#0000fa}
.fuchsia{color:#bf00bf}
.fuchsia-background{background-color:#fa00fa}
.gray{color:#606060}
.gray-background{background-color:#7d7d7d}
.green{color:#006000}
.green-background{background-color:#007d00}
.lime{color:#00bf00}
.lime-background{background-color:#00fa00}
.maroon{color:#600000}
.maroon-background{background-color:#7d0000}
.navy{color:#000060}
.navy-background{background-color:#00007d}
.olive{color:#606000}
.olive-background{background-color:#7d7d00}
.purple{color:#600060}
.purple-background{background-color:#7d007d}
.red{color:#bf0000}
.red-background{background-color:#fa0000}
.silver{color:#909090}
.silver-background{background-color:#bcbcbc}
.teal{color:#006060}
.teal-background{background-color:#007d7d}
.white{color:#bfbfbf}
.white-background{background-color:#fafafa}
.yellow{color:#bfbf00}
.yellow-background{background-color:#fafa00}
span.icon>.fa{cursor:default}
a span.icon>.fa{cursor:inherit}
.admonitionblock td.icon [class^="fa icon-"]{font-size:2.5em;text-shadow:1px 1px 2px rgba(0,0,0,.5);cursor:default}
.admonitionblock td.icon .icon-note::before{content:"\f05a";color:#19407c}
.admonitionblock td.icon .icon-tip::before{content:"\f0eb";text-shadow:1px 1px 2px rgba(155,155,0,.8);color:#111}
.admonitionblock td.icon .icon-warning::before{content:"\f071";color:#bf6900}
.admonitionblock td.icon .icon-caution::before{content:"\f06d";color:#bf3400}
.admonitionblock td.icon .icon-important::before{content:"\f06a";color:#bf0000}
.conum[data-value]{display:inline-block;color:#fff!important;background-color:rgba(0,0,0,.8);-webkit-border-radius:100px;border-radius:100px;text-align:center;font-size:.75em;width:1.67em;height:1.67em;line-height:1.67em;font-family:"Open Sans","DejaVu Sans",sans-serif;font-style:normal;font-weight:bold}
.conum[data-value] *{color:#fff!important}
.conum[data-value]+b{display:none}
.conum[data-value]::after{content:attr(data-value)}
pre .conum[data-value]{position:relative;top:-.125em}
b.conum *{color:inherit!important}
.conum:not([data-value]):empty{display:none}
dt,th.tableblock,td.content,div.footnote{text-rendering:optimizeLegibility}
h1,h2,p,td.content,span.alt{letter-spacing:-.01em}
p strong,td.content strong,div.footnote strong{letter-spacing:-.005em}
p,blockquote,dt,td.content,span.alt{font-size:1.0625rem}
p{margin-bottom:1.25rem}
.sidebarblock p,.sidebarblock dt,.sidebarblock td.content,p.tableblock{font-size:1em}
.exampleblock>.content{background-color:#fffef7;border-color:#e0e0dc;-webkit-box-shadow:0 1px 4px #e0e0dc;box-shadow:0 1px 4px #e0e0dc}
.print-only{display:none!important}
@page{margin:1.25cm .75cm}
@media print{*{-webkit-box-shadow:none!important;box-shadow:none!important;text-shadow:none!important}
html{font-size:80%}
a{color:inherit!important;text-decoration:underline!important}
a.bare,a[href^="#"],a[href^="mailto:"]{text-decoration:none!important}
a[href^="http:"]:not(.bare)::after,a[href^="https:"]:not(.bare)::after{content:"(" attr(href) ")";display:inline-block;font-size:.875em;padding-left:.25em}
abbr[title]::after{content:" (" attr(title) ")"}
pre,blockquote,tr,img,object,svg{page-break-inside:avoid}
thead{display:table-header-group}
svg{max-width:100%}
p,blockquote,dt,td.content{font-size:1em;orphans:3;widows:3}
h2,h3,#toctitle,.sidebarblock>.content>.title{page-break-after:avoid}
#toc,.sidebarblock,.exampleblock>.content{background:none!important}
#toc{border-bottom:1px solid #ddddd8!important;padding-bottom:0!important}
body.book #header{text-align:center}
body.book #header>h1:first-child{border:0!important;margin:2.5em 0 1em}
body.book #header .details{border:0!important;display:block;padding:0!important}
body.book #header .details span:first-child{margin-left:0!important}
body.book #header .details br{display:block}
body.book #header .details br+span::before{content:none!important}
body.book #toc{border:0!important;text-align:left!important;padding:0!important;margin:0!important}
body.book #toc,body.book #preamble,body.book h1.sect0,body.book .sect1>h2{page-break-before:always}
.listingblock code[data-lang]::before{display:block}
#footer{padding:0 .9375em}
.hide-on-print{display:none!important}
.print-only{display:block!important}
.hide-for-print{display:none!important}
.show-for-print{display:inherit!important}}
@media print,amzn-kf8{#header>h1:first-child{margin-top:1.25rem}
.sect1{padding:0!important}
.sect1+.sect1{border:0}
#footer{background:none}
#footer-text{color:rgba(0,0,0,.6);font-size:.9em}}
@media amzn-kf8{#header,#content,#footnotes,#footer{padding:0}}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.listingblock .pygments .hll { background-color: #ffffcc }
.listingblock .pygments, .listingblock .pygments code { background: #f8f8f8; }
.listingblock .pygments .tok-c { color: #408080; font-style: italic } /* Comment */
.listingblock .pygments .tok-err { border: 1px solid #FF0000 } /* Error */
.listingblock .pygments .tok-k { color: #008000; font-weight: bold } /* Keyword */
.listingblock .pygments .tok-o { color: #666666 } /* Operator */
.listingblock .pygments .tok-ch { color: #408080; font-style: italic } /* Comment.Hashbang */
.listingblock .pygments .tok-cm { color: #408080; font-style: italic } /* Comment.Multiline */
.listingblock .pygments .tok-cp { color: #BC7A00 } /* Comment.Preproc */
.listingblock .pygments .tok-cpf { color: #408080; font-style: italic } /* Comment.PreprocFile */
.listingblock .pygments .tok-c1 { color: #408080; font-style: italic } /* Comment.Single */
.listingblock .pygments .tok-cs { color: #408080; font-style: italic } /* Comment.Special */
.listingblock .pygments .tok-gd { color: #A00000 } /* Generic.Deleted */
.listingblock .pygments .tok-ge { font-style: italic } /* Generic.Emph */
.listingblock .pygments .tok-gr { color: #FF0000 } /* Generic.Error */
.listingblock .pygments .tok-gh { color: #000080; font-weight: bold } /* Generic.Heading */
.listingblock .pygments .tok-gi { color: #00A000 } /* Generic.Inserted */
.listingblock .pygments .tok-go { color: #888888 } /* Generic.Output */
.listingblock .pygments .tok-gp { color: #000080; font-weight: bold } /* Generic.Prompt */
.listingblock .pygments .tok-gs { font-weight: bold } /* Generic.Strong */
.listingblock .pygments .tok-gu { color: #800080; font-weight: bold } /* Generic.Subheading */
.listingblock .pygments .tok-gt { color: #0044DD } /* Generic.Traceback */
.listingblock .pygments .tok-kc { color: #008000; font-weight: bold } /* Keyword.Constant */
.listingblock .pygments .tok-kd { color: #008000; font-weight: bold } /* Keyword.Declaration */
.listingblock .pygments .tok-kn { color: #008000; font-weight: bold } /* Keyword.Namespace */
.listingblock .pygments .tok-kp { color: #008000 } /* Keyword.Pseudo */
.listingblock .pygments .tok-kr { color: #008000; font-weight: bold } /* Keyword.Reserved */
.listingblock .pygments .tok-kt { color: #B00040 } /* Keyword.Type */
.listingblock .pygments .tok-m { color: #666666 } /* Literal.Number */
.listingblock .pygments .tok-s { color: #BA2121 } /* Literal.String */
.listingblock .pygments .tok-na { color: #7D9029 } /* Name.Attribute */
.listingblock .pygments .tok-nb { color: #008000 } /* Name.Builtin */
.listingblock .pygments .tok-nc { color: #0000FF; font-weight: bold } /* Name.Class */
.listingblock .pygments .tok-no { color: #880000 } /* Name.Constant */
.listingblock .pygments .tok-nd { color: #AA22FF } /* Name.Decorator */
.listingblock .pygments .tok-ni { color: #999999; font-weight: bold } /* Name.Entity */
.listingblock .pygments .tok-ne { color: #D2413A; font-weight: bold } /* Name.Exception */
.listingblock .pygments .tok-nf { color: #0000FF } /* Name.Function */
.listingblock .pygments .tok-nl { color: #A0A000 } /* Name.Label */
.listingblock .pygments .tok-nn { color: #0000FF; font-weight: bold } /* Name.Namespace */
.listingblock .pygments .tok-nt { color: #008000; font-weight: bold } /* Name.Tag */
.listingblock .pygments .tok-nv { color: #19177C } /* Name.Variable */
.listingblock .pygments .tok-ow { color: #AA22FF; font-weight: bold } /* Operator.Word */
.listingblock .pygments .tok-w { color: #bbbbbb } /* Text.Whitespace */
.listingblock .pygments .tok-mb { color: #666666 } /* Literal.Number.Bin */
.listingblock .pygments .tok-mf { color: #666666 } /* Literal.Number.Float */
.listingblock .pygments .tok-mh { color: #666666 } /* Literal.Number.Hex */
.listingblock .pygments .tok-mi { color: #666666 } /* Literal.Number.Integer */
.listingblock .pygments .tok-mo { color: #666666 } /* Literal.Number.Oct */
.listingblock .pygments .tok-sa { color: #BA2121 } /* Literal.String.Affix */
.listingblock .pygments .tok-sb { color: #BA2121 } /* Literal.String.Backtick */
.listingblock .pygments .tok-sc { color: #BA2121 } /* Literal.String.Char */
.listingblock .pygments .tok-dl { color: #BA2121 } /* Literal.String.Delimiter */
.listingblock .pygments .tok-sd { color: #BA2121; font-style: italic } /* Literal.String.Doc */
.listingblock .pygments .tok-s2 { color: #BA2121 } /* Literal.String.Double */
.listingblock .pygments .tok-se { color: #BB6622; font-weight: bold } /* Literal.String.Escape */
.listingblock .pygments .tok-sh { color: #BA2121 } /* Literal.String.Heredoc */
.listingblock .pygments .tok-si { color: #BB6688; font-weight: bold } /* Literal.String.Interpol */
.listingblock .pygments .tok-sx { color: #008000 } /* Literal.String.Other */
.listingblock .pygments .tok-sr { color: #BB6688 } /* Literal.String.Regex */
.listingblock .pygments .tok-s1 { color: #BA2121 } /* Literal.String.Single */
.listingblock .pygments .tok-ss { color: #19177C } /* Literal.String.Symbol */
.listingblock .pygments .tok-bp { color: #008000 } /* Name.Builtin.Pseudo */
.listingblock .pygments .tok-fm { color: #0000FF } /* Name.Function.Magic */
.listingblock .pygments .tok-vc { color: #19177C } /* Name.Variable.Class */
.listingblock .pygments .tok-vg { color: #19177C } /* Name.Variable.Global */
.listingblock .pygments .tok-vi { color: #19177C } /* Name.Variable.Instance */
.listingblock .pygments .tok-vm { color: #19177C } /* Name.Variable.Magic */
.listingblock .pygments .tok-il { color: #666666 } /* Literal.Number.Integer.Long */
</style>
</head>
<body class="article toc2 toc-left">
<div id="header">
<h1>Using Git for CS31 Labs</h1>
<div id="toc" class="toc2">
<div id="toctitle">Table of Contents</div>
<ul class="sectlevel1">
<li><a href="#createsteps">1. Setting up directory structure for CS31 lab assignments</a></li>
<li><a href="#_getting_lab_starting_point_code">2. Getting Lab Starting Point Code</a></li>
<li><a href="#_sharing_code_with_your_lab_partner">3. Sharing Code with your Lab Partner</a>
<ul class="sectlevel2">
<li><a href="#_add_and_commit_and_push_as_you_work">3.1. add and commit (and push) as you work</a></li>
<li><a href="#_before_doing_git_add_commit_push">3.2. Before doing git add, commit, push</a></li>
<li><a href="#_some_troubleshooting">3.3. Some Troubleshooting</a></li>
<li><a href="#_what_to_do_if_git_push_fails_and_your_lab_is_due">3.4. What to do if <code>git push</code> fails and your lab is due?</a></li>
</ul>
</li>
<li><a href="#_handy_references">4. Handy References</a></li>
</ul>
</div>
</div>
<div id="content">
<div id="preamble">
<div class="sectionbody">
<div class="paragraph">
<p>These are steps to take for getting CS31 starting point lab repos for
each lab assignment, and some details about sharing code with your partner,
and submitting your lab work via git.  Some of these steps only need
to be done the first time you check out a lab repo, and others are
general per-lab steps.</p>
</div>
</div>
</div>
<div class="sect1">
<h2 id="createsteps">1. Setting up directory structure for CS31 lab assignments</h2>
<div class="sectionbody">
<div class="paragraph">
<p>This step only needs to be done one time.</p>
</div>
<div class="paragraph">
<p>Create a cs31 subdirectory in your home directory, and a labs
subdirectory under that. All of your lab repos should be cloned in your
<code>cs31/labs</code> subdirectory, and you will do your lab work from within
this directory.</p>
</div>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span><span class="tok-nb">cd</span>
mkdir cs31
ls
<span class="tok-nb">cd</span> cs31
<span class="tok-nb">pwd</span>
mkdir labs
<span class="tok-nb">cd</span> labs
<span class="tok-nb">pwd</span>       <span class="tok-c1"># should list /home/you/cs31/labs</span></code></pre>
</div>
</div>
</div>
</div>
<div class="sect1">
<h2 id="_getting_lab_starting_point_code">2. Getting Lab Starting Point Code</h2>
<div class="sectionbody">
<div class="paragraph">
<p>You will do this once for each lab assignment.  We use Lab1 as the example
lab here.</p>
</div>
<div class="olist arabic">
<ol class="arabic">
<li>
<p>cd into your <code>cs31/labs</code> subdirectory (follow the
steps in <a href="#createsteps">Section 1</a> to create it):</p>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span><span class="tok-nb">cd</span>            <span class="tok-c1"># from your home directory</span>
<span class="tok-nb">cd</span> cs31       <span class="tok-c1"># move into your cs31 subdirectory</span>
<span class="tok-nb">cd</span> labs       <span class="tok-c1"># move into your labs subdirectory</span>
<span class="tok-nb">pwd</span>           <span class="tok-c1"># should list /home/you/cs31/labs/</span></code></pre>
</div>
</div>
</li>
<li>
<p>Next, clone your Lab1 repo from <a href="https://github.swarthmore.edu/cs31f19">CS31 github org</a> into your labs
subdirectory. Follow the directions off the
<a href="https://www.cs.swarthmore.edu/git/">git help page</a> and copy the ssh-URL
from your repo to clone (not the http one):</p>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span>git clone <span class="tok-o">[</span>your-ssh-URL<span class="tok-o">]</span></code></pre>
</div>
</div>
<div class="paragraph">
<p>If you have not already completed the one-time set-up stesps from Lab0,
follow those steps first for setting up <a href="https://www.cs.swarthmore.edu/git/git-setup.php">ssh-keys for git</a>, then try running the <code>git clone</code> command
from above in your <code>cs31/labs</code> subdirectory.</p>
</div>
<div class="paragraph">
<p>At this point you can cd into your local Lab1 repo and start writing,
compiling, and testing your lab 1 solution code:</p>
</div>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span><span class="tok-nb">cd</span> Lab1-you     <span class="tok-c1"># or using absolute path name: cd ~you/cs31/labs/Lab1-you</span>
ls              <span class="tok-c1"># list the starting point files in your Lab1-you directory</span>
  Makefile README.md QUESTIONNAIRE.md lab1.c part1.txt</code></pre>
</div>
</div>
</li>
</ol>
</div>
<div class="paragraph">
<p>If you accidentally clone your Lab1 repo into the wrong part of your
file system, you can move it using the <code>mv</code> command.  For example, if
I cloned into my home directory, I can cd into my home directory and
move it into my <code>cs31/labs</code> subdirectory using this command:</p>
</div>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span><span class="tok-nb">cd</span>
ls
  Lab1-me cs31/     <span class="tok-c1">#  oops, Lab1-me is in my home directory</span>

mv Lab1-me cs31/labs/.

<span class="tok-nb">cd</span> cs31/labs
ls                 <span class="tok-c1"># yay! its now in my cs31/labs/ directory</span>
  Lab1-me</code></pre>
</div>
</div>
</div>
</div>
<div class="sect1">
<h2 id="_sharing_code_with_your_lab_partner">3. Sharing Code with your Lab Partner</h2>
<div class="sectionbody">
<div class="paragraph">
<p>On partnered labs, you and your lab partner will each clone
a copy of your shared repo into your private <code>cs31/labs</code> subdirectories.
You sill use git add, commit, push and pull commands to share changes
to your code with your partner.  It is also helpful to periodically
run these git commands to save partial changes as you work on a lab&#8201;&#8212;&#8201;git is revision control software that saves all commited changes so
that you can recover past changes or code that is accidentially
deleted from a committed change.</p>
</div>
<div class="paragraph">
<p>When you first share a lab repo with your partner, it is useful
to try out some of these commands to ensure that you and your
partner have set things up correctly to share your git repo.</p>
</div>
<div class="paragraph">
<p>For example, try this out after cloning:</p>
</div>
<div class="olist arabic">
<ol class="arabic">
<li>
<p>One of you add some minor change to a program file, like adding your
name to the top comment</p>
</li>
<li>
<p>Compile and run to make sure your change did not break your program.</p>
</li>
<li>
<p>add, commit, and push your change to the repo:
+</p>
</li>
</ol>
</div>
<div class="listingblock">
<div class="content">
<pre>$ git status              # list modified files
$ git add main.c          # if main.c is the file you modified
$ git status              # should show main.c added to next commit
$ git commit -m "test"    # -m "..." is the message logged with the commit
$ git status              # should show no outstanding changes to commit
$ git push                # push changes to repo master</pre>
</div>
</div>
<div class="olist arabic">
<ol class="arabic">
<li>
<p>The other partner should then run <code>git pull</code> and see the changes pushed
by the first partner.</p>
</li>
<li>
<p>The other partner should follow the steps above to modify the file
and run <code>git add, git commit, git push</code>.  And the first partner should
do a <code>git pull</code> to pull those changes into their local copy of the repo.</p>
</li>
</ol>
</div>
<div class="sect2">
<h3 id="_add_and_commit_and_push_as_you_work">3.1. add and commit (and push) as you work</h3>
<div class="paragraph">
<p>Git is revision control software, which means that it keeps track of
different version of your repo contents&#8201;&#8212;&#8201;all versions that you <code>git add</code>
and <code>git commit</code> (and <code>git push</code> to share and update the master repo).</p>
</div>
<div class="paragraph">
<p>It is good practice as you and your partner work on your lab to add,
commit, and push often.  This will both allow you to have the latest
version of your joint solution, and also allow you to recover a version
of your code from git if you accidentally break something that was once
working or delete a file.  <code>git checkout</code> can be used to recover a
deleted file:</p>
</div>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span>$ rm mysoln. c   <span class="tok-c1"># oops</span>
$ git checkout mysoln.c   <span class="tok-c1"># grabs the last committed version of mysoln.c</span></code></pre>
</div>
</div>
<div class="paragraph">
<p>There are other ways to recover deleted files on our system, so don&#8217;t go
<code>git commit</code> nuts here, but as you get some partial functionality implemented,
and at the end of a session working together on your joint solution, add,
commit and push your changes to your repo.</p>
</div>
</div>
<div class="sect2">
<h3 id="_before_doing_git_add_commit_push">3.2. Before doing git add, commit, push</h3>
<div class="paragraph">
<p>It is good practice to do a <code>make clean</code> before doing a git add and
commit: you do not want to add to the repo any files that are built by
gcc (e.g., executable files). Included in your lab git repos is a <code>.gitignore</code>
file telling git to ignore these files, so you likely won&#8217;t add these
types of files by accident. However, if you have other gcc generated
binaries in your repo, please be careful about this.</p>
</div>
<div class="paragraph">
<p>If you accidentally add a binary executable to your repo you can remove
it using the <code>git rm</code> command and then <code>git commit</code> and <code>git push</code> this
change:</p>
</div>
<div class="listingblock">
<div class="content">
<pre class="pygments highlight"><code data-lang="bash"><span></span>$ git rm a.out
$ ls             <span class="tok-c1"># a.out should no longer show up</span>
$ git commit -m <span class="tok-s2">&quot;removed a.out from repo&quot;</span>
$ git push</code></pre>
</div>
</div>
<div class="paragraph">
<p>You should also make sure that code you are trying to push is up to date with
the latest changes pushed by your partner.  Do a <code>git pull</code>, and if changes
are merged into your code, you should re-test your code and make sure it
still works as expected, and if not fix.</p>
</div>
<div class="paragraph">
<p>After a <code>git push</code> look on the github repo to verify that your changes were
successfully pushed.  In addtion, the partner who didn&#8217;t push can
try a <code>git pull</code> to verify the the push was successful.</p>
</div>
</div>
<div class="sect2">
<h3 id="_some_troubleshooting">3.3. Some Troubleshooting</h3>
<div class="paragraph">
<p>If git push fails, then either there are local changes you haven&#8217;t committed,
or you have not pulled changes pushed by your partner into your local repo.
Run <code>git status</code> to determine if you have local changes, and if so,
add and commit those too.  Otherwise, do a <code>git pull</code>, and then make
sure your code works with the changes you pulled into your repo before
adding, committing and pushing.</p>
</div>
<div class="paragraph">
<p>Sometimes a <code>git pull</code> causes merge conflicts to files that you need to
fix by hand.</p>
</div>
<div class="paragraph">
<p>See the "Troubleshooting" and "resolving merge conflicts" information off
the <a href="https://www.cs.swarthmore.edu/help/git/">Git resources</a> page for how
to resolve merging and other git problems.</p>
</div>
</div>
<div class="sect2">
<h3 id="_what_to_do_if_git_push_fails_and_your_lab_is_due">3.4. What to do if <code>git push</code> fails and your lab is due?</h3>
<div class="paragraph">
<p>If after trying to fix problems with git pushing, you are still unable
to push your lab solution to the master repo, and the lab due data is
approching, <strong>don&#8217;t panic</strong>.  If you are submitting early, attend
the ninja session or ask an instructor for help.  If your are trying to
submit right before the due date, then just email your instructors letting
them know your difficulty with <code>git push</code>, and <strong>Do not modify any lab
files after the due date</strong> (this means don&#8217;t open up soln.c in vim and
continue to edit and save changes to the file after the due date).  Your
instructor will use the modification date of the files to determine when
you submitted your solution.</p>
</div>
</div>
</div>
</div>
<div class="sect1">
<h2 id="_handy_references">4. Handy References</h2>
<div class="sectionbody">
<div class="ulist">
<ul>
<li>
<p><a href="https://github.swarthmore.edu">Swarthmore GitHub Enterprise</a></p>
</li>
<li>
<p><a href="https://www.cs.swarthmore.edu/help/git/">Git resources</a></p>
</li>
<li>
<p><a href="https://www.cs.swarthmore.edu/~newhall/unixhelp/howto_unixCommands.html">Some Useful Unix Commands</a></p>
</li>
</ul>
</div>
</div>
</div>
</div>
<div id="footer">
<div id="footer-text">
Last updated 2019-09-06 12:04:43 EDT
</div>
</div>
</body>
</html>