
let popUp=document.getElementById("popUp");
let popUp1=document.getElementById("popUp1");
function edit()
{
    if(popUp.style.display!='block')
    {
        popUp.style.display='block';
    }

    if(popUp1.style.display!='none')
    {
        popUp1.style.display='none';
    }
}

function change()
{
    if(popUp1.style.display!='block')
    {
        popUp1.style.display='block';
    }

    if(popUp.style.display!='none')
    {
        popUp.style.display='none';
    }
}

function cancel()
{
    if(popUp1.style.display!='none')
    {
        popUp1.style.display='none';
    }

    if(popUp.style.display!='none')
    {
        popUp.style.display='none';
    }
}