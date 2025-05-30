<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN']))
    {
        header("location:/");    
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>
    Classroom Repair Sheet
    </title>
    <script type='text/javascript' src='https://code.jquery.com/jquery-1.7.min.js'></script>
    <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.css">
    
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../files/css/sidebar-main.css">
    <link rel="stylesheet" type="text/css" href="../files/css/sidebar2.css">
    <link rel="stylesheet" type="text/css" href="../files/css/newDraggable.css">
    </head>
    <body>
    <div style="padding-left: 10px;">
        <input type="hidden" name="facname" class="facname" id="facname" value=<?php echo htmlspecialchars($_SESSION['facUN']); ?>></input>  
        <input type="hidden" name="email" class="email" id="email" value=<?php echo htmlspecialchars($_SESSION['facEmail']); ?>>
        </input>
       
    </div>
    <div class="wrapper">
         <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['facUN']); ?></li>
                        <li class="account-li logout btn btn-danger"><p style="font-size: 18px; margin-top: 10px">Log Out<p></li>
                    </ul>
                    <a class="" href="facSplash.php"><li class="">My Page</li></a>
                    <a class="" href="faculty.php"><li class="">My Tickets and Bookings</li></a>
                    <a class="camera" href="../connectCamera.html"><li class="glyphicon glyphicon-camera camerali">
                    <br>
                    <span>Access Camera</span></li></a>
                    <a class="reserve" href="scheduleClassroom.php"><li class="reserveli"><img src="../files/images/reserve-class.svg" class="reserveicon"/><span>Reserve Classroom</span></li></a>
                </ul>
            </div>
      <div class="room210">
          <h4 style="margin-left: 955px; margin-bottom: 0">Classroom</h4>
          <select class="form-select form-select-lg mb-3 room" id="room" style="margin-left: 958px;">
            <option selected value="210">210</option>
            <option value="211">211</option>
            <option value="212">212</option>
            <option value="213">213</option>
          </select>
    </div>
    <ul class="items" id="group1ul">
    <li><img src="../files/images/projectorNew.png" id="projector" class="smallimg group1" alt="projector"  name="room210machines"/></li>
    <li><img src="../files/images/scanner.png" id="210Scanner" class="smallimg group1" alt="210Scanner"  name="room210machines"/></li>
    </ul>
    <ul class="items" id="group2ul">
    <li><img src="../files/images/dell5820.png" id="PC01" class="smallimg group2" alt="PC01"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC02" class="smallimg group2" alt="PC02"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC03" class="smallimg group2" alt="PC03"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC04" class="smallimg group2" alt="PC04"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC05" class="smallimg group2" alt="PC05"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC06" class="smallimg group2" alt="PC06"  name="room210machines"/></li>
    </ul>
    <ul class="items" id="computerNames">
    <li id="pcname">PC01</li>
    <li id="pcname">PC02</li>
    <li id="pcname">PC03</li>
    <li id="pcname">PC04</li>
    <li id="pcname">PC05</li>
    <li id="pcname">PC06</li>
    </ul>
    <ul class="items" id="group3ul">
    <li><img src="../files/images/dell5820.png" id="PC07" class="smallimg group2" alt="PC07"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC08" class="smallimg group2" alt="PC08"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC09" class="smallimg group2" alt="PC09"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC10" class="smallimg group2" alt="PC10"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC11" class="smallimg group3" alt="PC11"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC12" class="smallimg group3" alt="PC12"  name="room210machines"/></li>
    </ul>
    <ul class="items" id="computerNames">
    <li id="pcname">PC07</li>
    <li id="pcname">PC08</li>
    <li id="pcname">PC09</li>
    <li id="pcname">PC10</li>
    <li id="pcname">PC11</li>
    <li id="pcname">PC12</li>
    </ul>
    <ul class="items" id="group4ul">
    <li><img src="../files/images/dell5820.png" id="PC13" class="smallimg group3" alt="PC13"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC14" class="smallimg group3" alt="PC14"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC15" class="smallimg group3" alt="PC15"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC16" class="smallimg group3" alt="PC16"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC17" class="smallimg group3" alt="PC17"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC18" class="smallimg group3" alt="PC18"  name="room210machines"/></li>
    </ul>
    <ul class="items" id="computerNames">
    <li id="pcname">PC13</li>
    <li id="pcname">PC14</li>
    <li id="pcname">PC15</li>
    <li id="pcname">PC16</li>
    <li id="pcname">PC17</li>
    <li id="pcname">PC18</li>
    </ul>
    <ul class="items" id="group5ul">
    <li><img src="../files/images/dell5820.png" id="PC19" class="smallimg group3" alt="PC19"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC20" class="smallimg group3" alt="PC20"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC21" class="smallimg group4" alt="PC21"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC22" class="smallimg group4" alt="PC22"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC23" class="smallimg group4" alt="PC23"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC24" class="smallimg group4" alt="PC24"  name="room210machines"/></li>
    </ul>
    <ul class="items" id="computerNames">
    <li id="pcname">PC19</li>
    <li id="pcname">PC20</li>
    <li id="pcname">PC21</li>
    <li id="pcname">PC22</li>
    <li id="pcname">PC23</li>
    <li id="pcname">PC24</li>
    </ul>
    <ul class="items" id="group6ul">
    <li><img src="../files/images/dell5820.png" id="PC25" class="smallimg group4" alt="PC25"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC26" class="smallimg group4" alt="PC26"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC27" class="smallimg group4" alt="PC27"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC28" class="smallimg group4" alt="PC28"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC29" class="smallimg group4" alt="PC29"  name="room210machines"/></li>
    <li><img src="../files/images/dell5820.png" id="PC30" class="smallimg group4" alt="PC30"  name="room210machines"/></li>
    </ul>
    <ul class="items" id="computerNames">
    <li id="pcname">PC25</li>
    <li id="pcname">PC26</li>
    <li id="pcname">PC27</li>
    <li id="pcname">PC28</li>
    <li id="pcname">PC29</li>
    <li id="pcname">PC30</li>
    </ul>
    <div class="problemarea">
    <div class="problem">
    <p class="sendsec">Drag problem machine in here:</p>
    <div class="numbers sendsec"></div>
    <div class="sendsec">
    <button value="Send To Helpdesk" class="button btn btn-primary">Send To Helpdesk</button> 
    </div>
    </div>
    <div id="homecon">
    </div>
    </div>
    </div>
    <foot>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../files/js/newDraggable.js"></script>
        <script type="text/javascript" src="../files/js/newPostDrag.js"></script>
      <script>
      $(document).ready(function()
       {
        $('.logout').on('click',function()
        {
       $(location).prop('href', 'sessionDestroy.php');
        });
        });
        </script>
         <script>
                setInterval(function(){ auto_logout() }, 1200000);
                function auto_logout()
                {
                    //this function will redirect the user to the session expired page and redirect back to main page
                    if(confirm("Your session has expired"))
                    {
                        window.location="sessionExpired.php";
                    }
                }
        </script> 
           <script>
            $('.account').on("click", function(){
              
                $(".account-ul").addClass('view'); 
                $(".allLinks-ul").removeClass('allLinks-view');  
            });
        </script>
         <script>
            $('.viewButton').on("click", function(){
                $(".account-ul").removeClass('view');
                $(".allLinks-ul").removeClass('allLinks-view');
            });
        </script>
         <script>
            $('.allLinks').on("click", function(){
                  $(".account-ul").removeClass('view');
                $(".allLinks-ul").addClass('allLinks-view');
            });
        </script>
    </foot>
    </body>
</html>
