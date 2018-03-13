a=1;
z=1;
y=1000;
function download(){
load=document.getElementById('loading');
angka=document.getElementById('angka');
persen=document.getElementById('persen');
number=parseInt(angka.innerHTML);

load.style.width=y;
x=angka.innerHTML=number+a;

y=setTimeout("download()",10);

if(x>=1000){
clearTimeout(y);
angka.innerHTML="Download Completed";
persen.innerHTML="";
}
}