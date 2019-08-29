let upvote=document.getElementById("upvote");
let upnum=document.getElementById("upNum");
let downvote=document.getElementById("downvote");
let downnum=document.getElementById("downNum");

function upVote()
{
    if(upvote.innerHTML=="Upvote")
    {
        upvote.innerHTML="Upvoted";
        upvote.style.backgroundColor="grey";
        upnum.innerHTML=parseInt(upnum.innerHTML)+1;
    }else  if(upvote.innerHTML=="Upvoted")
    {
        upvote.innerHTML="Upvote";
        upvote.style.backgroundColor="green";
        upnum.innerHTML=parseInt(upnum.innerHTML)-1;
    }

    if(downvote.innerHTML==="Downvoted")
    {
        downvote.innerHTML="Downvote";
        downvote.style.backgroundColor="red";
        downnum.innerHTML=parseInt(downnum.innerHTML)-1;
    }

   
}

function downVote()
{
    if(downvote.innerHTML=="Downvote")
    {
        downvote.innerHTML="Downvoted";
        downvote.style.backgroundColor="grey";
        downnum.innerHTML=parseInt(downnum.innerHTML)+1;
    }else if(downvote.innerHTML=="Downvoted")
    {
        downvote.innerHTML="Downvote";
        downvote.style.backgroundColor="red";
        downnum.innerHTML=parseInt(downnum.innerHTML)-1;
    }

    if(upvote.innerHTML==="Upvoted")
    {
        upvote.innerHTML="Upvote";
        upvote.style.backgroundColor="green";
        upnum.innerHTML=parseInt(upnum.innerHTML)-1;
    }

   
}