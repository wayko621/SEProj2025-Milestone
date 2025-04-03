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


$.ajax({
    type: 'POST',
    url:  "../PHPFiles/createticket.php",
    data: {name: imgarray, problem: probarray, timedate: cdarray, requestor: arrreq, email: arremail, room: arrroom },
    beforeSend: function(){
                         $("#homecon").dialog({
                            closeText: ""
                        });
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages'></div>");  
                        $('#messages').html("")
                        .hide()  
                        .fadeIn(1000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');     
                    });  
                        
                      $('#messages').html("<img src='../files/images/Radar.gif' />")
                        .fadeOut(3000, function() {
                        $('#messages').html("");
                    });   
                    },
                    success: function(response)
                    {
                        $("#homecon").dialog({
                            closeText: ""
                        });
                       setTimeout(function(){
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x update-ticket');
                        $('#homecon').html("<div id='messages' style='font-size: 20px; background: rgba(255,255,255,0.6); border-radius: 8px; padding-left: 10px; backdrop-filter: blur(16px);'></div>");  
                        $('#messages').html(response)
                        .hide()  
                        .fadeIn(3000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                        $(location).prop('href', 'classroom.php');
                    });
                         
                    }, 3000);

                    },
                    error: function(response) 
                    { 
                        alert(response); 
                    }
            });
    });
});