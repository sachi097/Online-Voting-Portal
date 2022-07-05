<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>IRRS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/gif/png" href="logo.gif">
<link href="./timer/sample in bootstrap v2/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="./timer/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
//input[type=file] {
    display: none;
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
a:hover{
	text-decoration:none;
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
<script type="text/javascript">
function getchart(tab)
{
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
  var jsonData = $.ajax({
          url: "getdata.php?tab="+ tab,
          dataType: "json",
          async: false
          }).responseText;
var data = new google.visualization.DataTable(jsonData);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Percentage voted for '+tab, 'width':500, 'height':350};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
 }
  google.charts.setOnLoadCallback(drawChart1);
  function drawChart1() {
  var jsonData = $.ajax({
          url: "getdata1.php?tab="+ tab,
          dataType: "json",
          async: false
          }).responseText;
var data = new google.visualization.DataTable(jsonData);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Percentage did not vote for '+tab, 'width':500, 'height':350};

  // Display the chart inside the <div> element with id="piechart"
     var chart = new google.visualization.PieChart(document.getElementById('barchart'));
  chart.draw(data, options);
 }

}
function getwinchart(tab,reg,str)
{
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawCharte);
  function drawCharte() {
  var jsonData = $.ajax({
          url: "getwindata.php?tab="+tab+"&reg="+reg,
          dataType: "json",
          async: false
          }).responseText;
var data = new google.visualization.DataTable(jsonData);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Percentage voted for '+str+' ('+tab+')', 'width':500, 'height':350};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
 }
  google.charts.setOnLoadCallback(drawCharte1);
  function drawCharte1() {
  var jsonData = $.ajax({
          url: "getwindata1.php?tab="+tab+"&reg="+reg,
          dataType: "json",
          async: false
          }).responseText;
var data = new google.visualization.DataTable(jsonData);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Percentage did not vote for '+str+' ('+tab+')', 'width':500, 'height':350};

  // Display the chart inside the <div> element with id="piechart"
     var chart = new google.visualization.PieChart(document.getElementById('barchart'));
  chart.draw(data, options);
 }

}
$(document).ready(function(){
	$('#insert').click(function(){
		var image_name = $('#image').val();
		var extention =$('#image').val().split('.').pop().toLowerCase();
		if(jQuery.inArray(extention, ['gif','png','jpg','jpeg']) == -1)
		{
			alert('Invalid image file');
			$('#image').val('');
			return false;
		}
		else
		{
			var td = document.getElementById('bt');
			var td1 = document.getElementById('dyn');
            if (typeof ($("#image")[0].files) != "undefined") {
                var size = parseFloat($("#image")[0].files[0].size / 1024).toFixed(2);
				alert(size);
				if(size>999.31){
				alert("Image Size is more than 999kb");
			}
			else
			{
				 td.style.visibility='visible';
			     td1.style.visibility='hidden';
			     td.style.top="-30px";
			     alert('Image Has Been Uploaded. Click Add To Add Nominee'); 
			}
			}

		}
	});
});
</script>
</head>
<body>

  <?php
     $servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
      
      $username = "adminovs";
      $query  = " SELECT * from admin where aid = '$username' ";
      $r=mysqli_query($con, $query);
      $res=mysqli_fetch_assoc($r);
 ?>
<p style="font-size: 25px;">
<nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;margin-top:-9px;" id="mySidebar">
  <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $res['pic'] ).'" style="width:80%;" alt="upload your pic";/>' 
   ?></a>
  <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
  <p class="w3-bar-item w3-button w3-teal">OVS ADMIN</p>
  <p class="w3-bar-item ">Username : <?php echo $res['aid'];?></p>
  <p class="w3-bar-item ">Name : <?php echo $res['name'];?></p>
  <p class="w3-bar-item ">Email : <?php echo $res['email'];?></p>
  <a class="w3-bar-item" href="mainpage.html">Sign-Out</a>

</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

<div id="myTop" class="w3-container w3-top w3-theme w3-large">
  <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
  <span id="myIntro" class="w3-hide" style="height:30px;margin-top:10px;"><?php echo $res['name'];?>'s Space</span></p>
</div>

<header class="w3-container w3-theme" style="padding:64px 32px">
  <h1 class="w3-xxxlarge">Welcome <?php echo $res["name"];?></h1>
</header>

<div class="w3-container" style="padding:32px">
<center><h1><font color="blue">Online Voting System</font></h1></center>



<div class="w3-panel w3-light-grey w3-padding-16 w3-card">
<h3 class="w3-center">Options</h3>
<div class="w3-content" style="max-width:800px">

   <div class="w3-row">
   <form action="eleadmin.php#section" method="post" enctype="multipart/form-data" style="margin-left:10px;">
   <?php
	 	   echo "<input class='button' type='submit' value='View Existing Posts' name='existing' style='margin-left:130px;'>
    <input class='button' type='submit' value='Add Post' name='add' style='margin-left:50px;'>
    <input class='button' type='submit' value='Set Time' name='timer' style='margin-left:50px;'>
    <p id='demo'></p>"; 	
   ?>
    
   
	</form>
  </div>
  </div>
  </div>
<div class="w3-panel w3-light-grey w3-padding-16 w3-card">
<h3 class="w3-center"></h3>
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
   if(isset($_POST['existing']))
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
                  <th>View</th>
                  </th>
				 </tr>
	</thead>
	<tbody>";
	$no=1;
	  while($res=mysqli_fetch_array($result)){
		  $pname=$res['pname'];
		  $pname=str_replace('_',' ',$pname);
	   echo "<tr>
	   <td>$no</td>
	   <td>$pname</td>
	   <td><form action='eleadmin.php#section' method='POST'>
	   <input type='submit' name='modify' value='$pname' id='bt'></input></form>
	   </td>
	   </tr>";
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
           <span style='color:red;'>No Posts Found. Please Add Post.</span></form></div></div></div>";
	}
	   
   }
   if(isset($_POST['add']))
   {
	   echo"<center><h3><p style='margin-left:250px;margin-top:45px; margin-bottom:40px;'><font color='blue'>Add Post</font></p></h3></center><br>";
	   echo "<table border='1' cellspacing='10' cellpadding='15' id='customer2'>
				<thead>
                <tr>
                  <th>Post Name</th>
				  <th>Action</th>
				</tr>
				</thead>
				<tbody><form action='eleadmin.php#section' method='POST'>
			  ";
			    echo "<tr><td><input type='text' value='' maxlength='55'  name='pname' style='width:100%;border:solid gray;border-radius:10px;' required></td>
				<td><input type='submit' name='addpost' value='Add' id='bt' style='width:100%;'></input>
				</td></tr>";
			  
			  echo "</form></tbody></table>";
   }
   if(isset($_POST['addpost']))
   {
	   $pname=$_POST['pname'];
	   $_SESSION['pname']=$pname;
	   $pname1=$pname;
	   $pname=str_replace(' ','_',$pname);
	   $_SESSION['newtab']=$pname1;
	   $sql="select * from posts where pname = '$pname'";
	   $result=mysqli_query($con,$sql);
	   if (mysqli_num_rows($result) >  0) {
		   echo "<center><h3><p style='margin-left:250px'><font color='red'>Failed! Post $pname1 Already Exist.</font></p></h3></center><br>";
	   }
	   else
	   {
		   $sql="insert into posts(pname) values('$pname')";
		   $result=mysqli_query($con,$sql);
		   $sql="create table $pname
		   (
			   nid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			   nname VARCHAR(20),
			   nyear VARCHAR(10),
			   regnum VARCHAR(10),
			   IT INT DEFAULT 0,
			   EEE INT DEFAULT 0,
			   EC INT DEFAULT 0,
			   ME INT DEFAULT 0,
			   MI INT DEFAULT 0,
			   MT INT DEFAULT 0,
			   CH INT DEFAULT 0,
			   CS INT DEFAULT 0,
			   CIVIL INT DEFAULT 0,
			   pic LONGBLOB
		   )";
		   $result=mysqli_query($con,$sql);
		   echo "<center><h3><p style='margin-left:250px'><font color='blue'>Post $pname1 Has Been Added.</font></p></h3></center><br>";
		   }
   }
   if(isset($_POST['modify']))
   {
	   $pname=$_POST['modify'];
	   $_SESSION['postname']=$pname;
	   echo "<div class='w3-panel w3-light-grey w3-padding-16 w3-card'>
					<h3 class='w3-center'></h3>
					<div class='w3-content' style='max-width:100%;margin-top:55px;margin-bottom:55px;'> <div class='w3-row'>";
		   echo "<form action='eleadmin.php#section' method='post' enctype='multipart/form-data' style='margin-left:355px;'>
		   <input class='button' type='submit' value='View Existing Nominees For The Post $pname' name='existingnom'>
           <input class='button' type='submit' value='Add Nominee For The Post $pname' name='addnom'></div></div></div></form>";			  
   }
   if(isset($_POST['existingnom'])){
	   $pname=$_SESSION['postname'];
	   $pname1=$pname;
	   $pname=str_replace(' ','_',$pname);
	   $sql="select * from $pname";
	   $result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo"<center><h3><p style='margin-left:250px; margin-top:40px; margin-bottom:40px;'><font color='blue'>Existing Nominees</font></p></h3></center><br>
	<table border='1' cellspacing='10' cellpadding='15' id='customer2'>
	<thead>
                <tr>
                  <th>No.</th>
				  <th>Register Number</th>
				  <th>Name</th>
				  <th>Year</th>
                  <th>Modify</th>
                  </th>
				 </tr>
	</thead>
	<tbody>";
	$no=1;
	  while($res=mysqli_fetch_array($result)){
		  $rg=$res['regnum'];
	   echo "<tr>
	   <td>$no</td>
	   <td>{$res['regnum']}</td>
	   <td>{$res['nname']}</td>
	   <td>{$res['nyear']}</td>
	   <td><form action='eleadmin.php#section' method='POST'>
	   <input type='submit' name='action' value='$rg' id='bt'></form>
	   </td>
	   </tr>";
	   $no+=1;
	  }
	  echo "</tbody></table>";
    }
    else
    {
		echo "<div class='w3-panel w3-light-grey w3-padding-16 w3-card'>
					<h3 class='w3-center'></h3>
					<div class='w3-content' style='max-width:100%;margin-top:55px;margin-bottom:55px;'> <div class='w3-row'>";
		   echo "<form action='eleadmin.php#section' method='post' enctype='multipart/form-data' style='margin-left:365px;'>
           <span style='color:red;'>No Nominee For The Post $pname1 Found.</span>
           <input class='button' type='submit' value='Add Nominee For The Post $pname1' name='addnom'></div></div></div></form>";
	}		
  }
   if(isset($_POST['addnom']))
   {
	   echo"<center><h3><p style='margin-left:250px;margin-top:45px; margin-bottom:40px;'><font color='blue'>Add Nominee</font></p></h3></center><br>";
	   echo "<table border='1' cellspacing='10' cellpadding='15' id='customer2'>
	<thead>
                <tr>
                  <th>Register No.</th>
				  <th>Nominee Name</th>
                  <th>Year</th>
				  <th>Upload Image (Less Than 999kb)</th>
                  <th>Action</th>
				 </tr>
				   </thead>
				   <tbody><form name='form1' action='eleadmin.php#section' enctype='multipart/form-data' method='POST'>
			  ";
			    echo "<tr><td><input type='text' maxlength='6' pattern='[0-9]{6}' value='' name='reg' style='width:100px;border:solid gray;border-radius:10px;' required></td>
				<td><input type='text' value='' maxlength='20' name='nname' style='width:100px;border:solid gray;border-radius:10px;' required></td>
				<td><select name='year' style='width:65px;border:solid gray;border-radius:10px;' required>
				   <option value=''>None</option>
				   <option value='Fourth'>Fourth</option>
				   <option value='Third'>Third</option>
				   <option value='Second'>Second</option>
				   <option value='First'>First</option>
				   </select>
				   <td><input type='file' name='image' id='image' value='' required />
				   <input type='button' name='insert' id='insert' value='Upload' style='margin-left:200px'>
				   </td>
					 <td> <p id='dyn' style='margin-top:-10px;'>Click Upload</p><input type='submit' name='addposnom' value='Add' id='bt' style='visibility:hidden; margin-top:-30px;'>
				</td></tr>";
				       

			  echo "</form></tbody></table>";
   }
   if(isset($_POST['addposnom']))
   {
	   $reg=$_POST['reg'];
	   $nname=$_POST['nname'];
	   $nname=ucwords($nname);
	   $year=$_POST['year'];
	   $pic=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	   $tab=$_SESSION['postname'];
	   $tab=strtolower($tab);
	   $pname=$_SESSION['postname'];
	   $tab=str_replace(' ','_',$tab);
	   $sql="select * from $tab where regnum = '$reg'";
	   $result=mysqli_query($con,$sql);
	   if (mysqli_num_rows($result) >  0) {
		   echo "<center><h3><p style='margin-left:250px'><font color='red'>Failed! Nominee With Register No. $reg For The Post $pname Already Exist.</font></p></h3></center><br>";
	   }
	   else
	   {
	   $sql="insert into $tab(nname,nyear,regnum,pic) values('$nname','$year','$reg','$pic')";
	   $result=mysqli_query($con,$sql);
	   echo "<center><h3><p style='margin-left:250px'><font color='blue'>Nominee $nname Has Been Added For The Post $pname.</font></p></h3></center><br>";
       }
   }
   if(isset($_POST['action'])){
	   $reg=$_POST['action'];
	   $_SESSION['regsel']=$reg;
	   $tab=$_SESSION['postname'];
	   $tab=strtolower($tab);
	   $tab=str_replace(' ','_',$tab);
	   $sql="select * from $tab where regnum ='$reg'";
	   $result=mysqli_query($con,$sql);
	   while($res=mysqli_fetch_array($result)){
	      $nname=$res['nname'];  
		  $nyear=$res['nyear'];
	   }
	   echo"<center><h3><p style='margin-left:250px'><font color='blue'>Modify Details Of Nominee $nname</font></p></h3></center><br>
	<table border='1' cellspacing='10' cellpadding='15' id='customer2'>
	<thead>
                <tr>
				  <th>Register Number</th>
				  <th>Name</th>
				  <th>Year</th>
                  <th>Action</th>
                  </th>
				 </tr>
	</thead>
	<tbody>";
		echo "<form action='eleadmin.php#section' method='POST'>
		        <td>$reg</td>
				<td><input type='text' value='$nname' maxlength='20' name='nname' style='width:100%;border:solid gray;border-radius:10px;'></input></td>
				<td>
				<select name='year' style='width:100%;border:solid gray;border-radius:10px;' required>
				   <option value=''>None</option>
				   <option value='Fourth'>Fourth</option>
				   <option value='Third'>Third</option>
				   <option value='Second'>Second</option>
				   <option value='First'>First</option>
				   </select>
				</td>
				<td><input type='submit' name='update' value='Update' id='bt' style='width:100%;margin-left:5px;'></input>
				<input type='submit' name='delete' value='Delete' id='bt1' style='width:100%;margin-top:4px;margin-left:5px;'></input></td></tr>";
			  echo "</form></tbody></table>";
	   
   }
   if(isset($_POST['delete']))
   {
	   $reg=$_SESSION['regsel'];
	   $tab=$_SESSION['postname'];
	   $tab=strtolower($tab);
	   $tab=str_replace(' ','_',$tab);
	   $pname=$_SESSION['postname'];
	   $nname=$_POST['nname'];
	   $nname=ucwords($nname);
	   $sql="delete from $tab where regnum = '$reg'";
	   $result=mysqli_query($con,$sql);
	   echo "<center><h3><p style='margin-left:250px'><font color='blue'>Nominee $nname Has Been Removed From The Post $pname.</font></p></h3></center><br>";
   }
   if(isset($_POST['update']))
   {
	   $reg=$_SESSION['regsel'];
	   $tab=$_SESSION['postname'];
	   $tab=strtolower($tab);
	   $tab=str_replace(' ','_',$tab);
	   $pname=$_SESSION['postname'];
	   $nname=$_POST['nname'];
	   $nname=ucwords($nname);
	   $nyear=$_POST['year'];
	   $sql="update $tab set nname = '$nname', nyear = '$nyear' where regnum = '$reg'";
	   $result=mysqli_query($con,$sql);
	  echo "<center><h3><p style='margin-left:250px'><font color='blue'>Details Of Nominee With Register No. $reg Has Been Updated.</font></p></h3></center><br>";
   }
   if(isset($_POST['result']))
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
                  <th>View Result</th>
                  </th>
				 </tr>
	</thead>
	<tbody>";
	$no=1;
	  while($res=mysqli_fetch_array($result)){
		  $pname=$res['pname'];
		  $pname=str_replace('_',' ',$pname);
	   echo "<tr>
	   <td>$no</td>
	   <td>$pname</td>
	   <td><form action='eleadmin.php#section' method='POST'>
	   <input type='submit' name='viewres' value='$pname' id='bt'></input></form>
	   </td>
	   </tr>";
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
           <span style='color:red;'>No Posts Found. Please Add Post.</span></form></div></div></div>";
	}  
   }
   if(isset($_POST['viewres']))
   {
	   $tab=$_POST['viewres'];
	   $pos=$tab;
	   $_SESSION['pos']=$pos;
	   echo "<script>getchart('$tab');</script>
			<div class='w3-main' style='margin-left:250px;'>
			<div class='w3-container' style='padding:32px'>
			<div class='w3-row'>
			<div class='w3-row w3-center w3-padding-16 w3-section w3-light-grey' style='margin-left:-25px; margin-right: -30px;'>
			<div class='w3-half w3-section' style='margin-left:-10px;'>
			<div id='piechart' style='margin-left: 20px; border: 1px solid;
			padding: 10px;
			box-shadow: 0 5px 10px 1px #86abe8;'></div>
			</div>
			<div class='w3-half w3-section' style='margin-left:-1px;'>
			<div id='barchart' style='margin-left: 20px; border: 1px solid;
			padding: 10px;
			box-shadow: 0 5px 10px 1px #86abe8;'></div>
			</div>";
			$tab=strtolower($tab);
	        $tab=str_replace(' ','_',$tab);
			$sql="SELECT regnum,nname from $tab where IT+EEE+EC+ME+MT+CH+CS+CIVIL = (select MAX(IT+EEE+EC+ME+MT+CH+CS+CIVIL) from $tab) ";
			$result=mysqli_query($con,$sql);
			if($result->num_rows == 1)
			{
			while($res=mysqli_fetch_array($result))
			{
				$regnum=$res['regnum'];
				$pname1=$res['nname'];
			}
			$_SESSION['regnum']=$regnum;
			$_SESSION['nname']=$pname1;
			echo "<form action='eleadmin.php#section' method='post' enctype='multipart/form-data'>
           <span style='color:blue;'>$regnum $pname1 Has Been Elected As $pos</span>
           <input class='button' type='submit' value='View Analysis' name='viewwin' style='margin-left:25px;'>
		   <input class='button' type='submit' value='View Other Results' name='result' style='margin-left:50px;'></div></div></div></form>
			</div>
			</div>
			</div></div></div>";
			}
			else
			{
				while($res=mysqli_fetch_array($result))
			   {
				$regnum=$res['regnum'];
				$pname1=$res['nname'];
			   }
			   echo "Post $pos Has More Than One Winner</div></div></div>
			</div>
			</div>
			</div></div></div>";
			}
   }
   if(isset($_POST['viewwin']))
   {
	   $reg=$_SESSION['regnum'];
	   $nname=$_SESSION['nname'];
	   $tab=$_SESSION['pos'];
	   echo "<script>getwinchart('$tab','$reg','$nname');</script>
	   <div class='w3-main' style='margin-left:250px;'>
			<div class='w3-container' style='padding:32px'>
			<div class='w3-row'>
			<div class='w3-row w3-center w3-padding-16 w3-section w3-light-grey' style='margin-left:-25px; margin-right: -30px;'>
			<div class='w3-half w3-section' style='margin-left:-10px;'>
			<div id='piechart' style='margin-left: 20px; border: 1px solid;
			padding: 10px;
			box-shadow: 0 5px 10px 1px #86abe8;'></div>
			</div>
			<div class='w3-half w3-section' style='margin-left:-1px;'>
			<div id='barchart' style='margin-left: 20px; border: 1px solid;
			padding: 10px;
			box-shadow: 0 5px 10px 1px #86abe8;'></div>
			</div><form action='eleadmin.php#section' method='post' enctype='multipart/form-data'>
			<span style='color:blue;'>Analysis Of The Votes For $nname ($tab).</span>
			<input class='button' type='submit' value='View Other Results' name='result' style='margin-left:50px;'></form>
			</div></div></div></div></div>";
   }
   if(isset($_POST['timer']))
   {
	   echo '<form action="eleadmin.php" method="POST" style="margin-left:690px;margin-bottom:10px;">
          <div class="control-group">
                <label class="control-label">Date Picking</label>
                <div  class="controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                    <input size="16" type="text" name="date" value="" style="height:30px;" readonly>
                    <span class="add-on" style="height:30px;"><i class="icon-remove"></i></span>
					<span class="add-on" style="height:30px;"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
			<div class="control-group">
                <label class="control-label">Time Picking</label>
                <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input size="16" type="text" name="time" value="" style="height:30px;" readonly>
                    <span class="add-on" style="height:30px;"><i class="icon-remove"></i></span>
					<span class="add-on"  style="height:30px;"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div> 
			</div>
			 <input type="submit" name="setter" id="bt" value="SET"/>
			</form>';
   }
   if(isset($_POST['setter']))
   {
	   $date=$_POST['date'];
	   $time=$_POST['time'];
       $sql="update timer set date='$date',time='$time' where tid=1";
	   $result=mysqli_query($con,$sql);
   }
   ?>
   <script type="text/javascript" src="./timer/sample in bootstrap v2/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./timer/sample in bootstrap v2/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./timer/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./timer/js/locales/bootstrap-datetimepicker.en.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        language:  'uk',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'uk',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script> 

<footer class="w3-container w3-theme" style="margin-left:251px;margin-bottom:-22px;">
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
  var hour=parseInt(time.substr(0,2));
  hour+=5;
  if(hour>24)
  {
	  hour=24-hour;
  }
  var min=time.substr(2);
  time=String(hour) + min;
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
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "<input class='button' type='submit' value='View Result' name='result' style='margin-left:320px;width:250px;margin-top:25px;'>";
    }
}, 1000);
   
</script>";
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
