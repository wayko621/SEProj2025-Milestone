$(document).ready(function(){
$(".button").click(function(){
var imgid
var prob
var currdate
var req

var imgarray
var probarray
var cdarray
var reqarray

var i

var arrimg
var arrprob
var arrcd
var arrreq
var arremail
var arrroom

var resultimg
var resultprob
var resultcd



//img array
arrimg = $('.probdiv img').map(function () {
return $(this).attr('id');
}).get();
imgid = arrimg;
imgarray = new Array();
for (i in imgid){
if (imgid[i])
imgarray.push(imgid[i]);
}
// end of img array


// textarea array
arrprob = $('.probdiv textarea').map(function () {
return $(this).val();
}).get();
prob = arrprob;
probarray = new Array();
for (i in prob){
if (prob[i])
probarray.push(prob[i]);
}
// end of textarea array


// date array
arrcd = $('.probdiv #currentdate').map(function () {
return $(this).val();
}).get();
currdate = arrcd;
cdarray = new Array();
for (i in currdate){
if (currdate[i])
cdarray.push(currdate[i]);
}
// end of date array

// requestor array
arremail = $('#email').val();
arrreq = $('#facname').val();
arrroom =  document.getElementById("room").value;
// end of requestor array
   
$.post("../phpfiles/createticket.php", {name: imgarray, problem: probarray, timedate: cdarray, requestor: arrreq, email: arremail, room: arrroom })
.done(function(data){
    alert(data);
});
});
});