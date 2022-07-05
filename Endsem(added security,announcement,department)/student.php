<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>IRRS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/gif/png" href="logo.gif">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style>
body {font-family: "Roboto", sans-serif}
.w3-bar-block .w3-bar-item{padding:16px;font-weight:bold}
.button{
  background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
a{
text-decoration:none;
}
#bt{
    border-radius:10px;
	border-color:grey;
    padding: 6.2px;
	line-height: 13px;
	-webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
 }
  #bt:hover{
     background-color: #ADD8E6;
    color: white;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

 }
 #bt1{
    border-radius:10px;
	border-color:grey;
    padding: 6.2px;
	line-height: 13px;
	-webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
 }
  #bt1:hover{
     background-color: red;
    color: white;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

 }
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 81%;
	margin-left:251px;
	padding:8px;
}

#customers td, #customers th {
    border: 1px solid #ddd;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
color: white;}

#customer {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 81%;
	margin-left:251px;
	padding:8px;
}

#customer td, #customers th {
    border: 1px solid #ddd;
}

#customer tr:nth-child(even){background-color: #f2f2f2;}

#customer tr:hover {background-color: #ddd;}

#customer th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: light-grey;
color: white;}

#customer2 {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
	margin-left:475px;
	margin-top:-40px;
	margin-bottom:30px;
	border:2px solid;
	border-radius:50%;
	padding:20px;
}

#customer2 td, #customers th {
    border: 1px solid #ddd;
}

#customer2 tr:nth-child(even){background-color: #f2f2f2;}


#customer2 th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
color: white;}

</style>
</head>
<body>

  <?php
     $servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
      $regid = $_SESSION['username'];
      $query  = " SELECT * from users where regid = $regid ";
      $r=mysqli_query($con, $query);
      $res=mysqli_fetch_assoc($r);
	  $_SESSION['voterdept']=$res['dept'];
	  $_SESSION['voter']=$res['regid'];
	  $voter=$res['regid'];
 ?>
<p style="font-size: 25px;"></p>
<nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;margin-top:5px;" id="mySidebar">
  <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
  <p class="w3-bar-item w3-button w3-teal" style="margin-top:0px;">OVS USER</p>
  <p class="w3-bar-item ">Register Number : <?php echo $res['regid'];?></p>
  <a class="w3-bar-item ">Name : <?php echo $res['name'];?>
  <a class="w3-bar-item ">Department : <?php echo $res['dept'];?>
  <a class="w3-bar-item ">Email : <?php echo $res['email'];?>
  <a class="w3-bar-item" href="mainpage.html">Sign-Out</a>
  <img src="nitklogo.png" alt="nitk"  style='margin-left:25px;margin-top:60px;'/>

</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

<div id="myTop" class="w3-container w3-top w3-theme w3-large">
  <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
  <span id="myIntro" class="w3-hide">OVS User's Space</span></p>
</div>

<header class="w3-container w3-theme" style="padding:64px 32px;margin-top:-30px;margin-bottom:20px;">
  <h1 class="w3-xxxlarge">Welcome OVS User</h1>
</header>

<div class="w3-container" style="padding:32px">
<center><h1><font color="blue">Online Voting System</font></h1></center>



<div class="w3-panel w3-light-grey w3-padding-16 w3-card">
<div class="w3-content" style="max-width:800px">

   <div class="w3-row">
   <form action="student.php#section" method="post" enctype="multipart/form-data" style="margin-left:90px;">
   <?php 
           echo "<h3 class='w3-center' id='head' style='margin-left:-100px;'>You Can Vote After</h3>";
           echo "<p id='demo' style='margin-left:260px;'></p>";		   
   ?>
    
   
	</form>
  </div>
  </div>
  </div>
<div class="w3-panel w3-light-grey w3-padding-16 w3-card">
<div class="w3-content" style="max-width:800px;">

<div class="w3-row">
  
   <div class="w3-col m6 w3-large w3-margin-bottom" style="margin-left: 250px; margin-top: 50px;">
        <i class="fa fa-user" style="width:30px"></i> Sachin Rathod<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +91-78-46-988536<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: nieesachi.097@gmail.com<br>
		<i class="fa fa-circle-o" style="width:30px"> </i> OVS Admin<br>
        <a id="contact"></a>
      </div>
     <a id='section'></a>
    
  </div>
  
</div>
</div>
</div>
</div>
<?php
   if(isset($_POST['vote']))
   {
	   $sql="select * from posts";
 	   $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
	{		
	echo"<center><h3><p style='margin-left:250px; margin-top:45px; margin-bottom:40px;'><font color='blue'>Existing Posts</font></p></h3></center><br>
	<table border='1' cellspacing='10' cellpadding='15' id='customer2'>
	<thead>
                <tr>
                  <th>No.</th>
				  <th>Post Name</th>
                  <th>Vote</th>
                  </th>
				 </tr>
	</thead>
	<tbody>";
	$no=1;
	  while($res=mysqli_fetch_array($result)){
		  $pname=$res['pname'];
		  $pname1=str_replace('_',' ',$pname);
	   echo "<tr>
	   <td>$no</td>
	   <td>$pname1</td>
	   <td><form action='2.php' method='POST'>";
	   $sql="select * from votes where user = '$voter' and pos = '$pname'";
	   $r=mysqli_query($con,$sql);
	   if(mysqli_num_rows($r)>0)
	   {
		   echo "You Have Already Casted Your Vote For The Post $pname1";
	   }
	   else
	   {
	     echo "<input type='submit' name='votepos' value='$pname1' id='bt'></input></form>
	            </td>
	             </tr>";
	   }
	   $no+=1;
	  }
	  echo "</tbody></table>";
    }	 
	 else
    {
		echo "<div class='w3-panel w3-light-grey w3-padding-16 w3-card'>
					<h3 class='w3-center'></h3>
					<div class='w3-content' style='max-width:100%'> <div class='w3-row'>";
		   echo "<form action='eleadmin.php#section' method='post' enctype='multipart/form-data' style='margin-left:365px;'>
           <span style='color:red;'>No Posts Found. Wait Until Admin Adds The Post.</span></form></div></div></div>";
	}
	   
   }
   if(isset($_POST['votepos']))
   {
	   echo"<center><h3><p style='margin-left:250px;margin-top:45px; margin-bottom:40px;'><font color='blue'>Add Post</font></p></h3></center><br>";
	   echo "<table border='1' cellspacing='10' cellpadding='15' id='customer2'>
				<thead>
                <tr>
                  <th>Post Name</th>
				  <th>Post Name</th>
				</tr>
				</thead>
				<tbody><form action='2.php' method='POST'>
			  ";
			    echo "<tr><td><input type='text' value='' name='pname' style='width:100%;border:solid gray;border-radius:10px;' required></td>
				<td><input type='submit' name='addpost' value='Add' id='bt' style='width:100%;'></input>
				</td></tr>";
			  
			  echo "</form></tbody></table>";
   }
   ?>
<footer class="w3-container w3-theme" style="margin-left:251px;">
	<center><i class="fa fa-circle-o" style="margin-top:10px;"></i><h3><font color="white">Online Voting System</font></h3></center>
 </footer>
     
</div>

<script>

// Set the date we're counting down to
    var jsonData = $.ajax({
          url: "time.php",
          dataType: "json",
          async: false
          }).responseText;
  
  jsonData=JSON.parse(jsonData);
  var date=jsonData["dt"];
  var time=jsonData["tt"];
  var countDownDate = new Date(date+" "+time).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
		document.getElementById("head").innerHTML = "Options";
        document.getElementById("demo").innerHTML = "<input class='button' type='submit' value='Vote' name='vote' style='margin-left:-80px;width:250px;'>";
    }
}, 1000);
   
</script>





<script>

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("myIntro").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("myIntro").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
    }
}

// Accordions
function myAccordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
    }
}
</script>
     
</body>
</html> 
