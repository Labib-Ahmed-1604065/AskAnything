$(document).ready(function(){

$('.vote').click(function(){
var upNum=$('#upNum').html();

var downNum=$('#downNum').html();

$.post('upvote.php',{upvote: upNum, downvote: downNum});
});
});