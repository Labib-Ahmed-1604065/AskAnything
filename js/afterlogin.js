let questionvoteup=document.getElementById("qvup");
let questionvotedown=document.getElementById("qvdown");

var quesvoteup=0;
var quesvotedown=0;

function qvup()
{
	quesvoteup+=1;
	questionvoteup.innerHTML=quesvoteup;
}

function qvdown()
{
	quesvotedown+=1;
	questionvotedown.innerHTML=quesvotedown;
}