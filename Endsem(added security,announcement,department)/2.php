<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/gif/png" href="logo.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="2.css">
</head>
<body background="page.jpg">
		  <?php
	session_start();
	   $servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
     if(isset($_POST['votepos']))
	 {
      $tab = $_POST['votepos'];
     }
	 $_SESSION['votingpos']=$tab;
	 	 echo "<p><h3 style='text-align:center;'><b>Nominees For The Post $tab</b></h3></p> <a href='student.php' style='float:right;text-decoration:none;'><b>Home</b></a>";
	  $tabq=str_replace(' ','_',$tab);
      $query  = " SELECT * from $tabq ";
      $r=mysqli_query($con, $query);
	  if ($r->num_rows > 0) {
		  $n=$r->num_rows;
		  if($n==2)
		  {
			  echo '<div class="w3-row w3-padding-16 w3-section" style="margin-left:268px;">';
				while($row=mysqli_fetch_assoc($r)){
					echo '<form action="3.php" method="POST">';
				 echo ' <div class="w3-half  w3-section"> ';
echo '<div class="promo" style="margin-top:16px;">'.
  '<div class="deal">'.
    '<span>'.$tab .' Candidate</span>'.
    '<span>'.$row['regnum'].'</span>'.
  '</div>'.
  '<span class="price">'.'<img src="data:image/jpeg;base64,'.base64_encode($row['pic']).'" style="width:50%; height:145px;"/>'.'</span>'.
  '<ul class="features">'.
    '<li>'.$row['nname'].'</li>'.
    '<li>'.$row['nyear'].'</li>'. 
  '</ul>'.
  '<input type="hidden" value="'. $row['regnum'] .'" name="vote"/>'.
 '<input type="submit" class="button" value="Vote">'
.'</div></div></form>';
	}  
		}
		else if($n%3==0)
		{
			echo '<div class="w3-row w3-padding-16 w3-section" style="margin-left:136px;">';
			while($row=mysqli_fetch_assoc($r)){
			echo '<form action="3.php" method="POST">';
						
							echo ' <div class="w3-third w3-section">';
				echo '<div class="promo" style="margin-top:16px;">'.
						'<div class="deal">'.
							'<span>'.$tab .' Candidate</span>'.
							'<span>'.$row['regnum'].'</span>'.
						'</div>'.
						'<span class="price">'.'<img src="data:image/jpeg;base64,'.base64_encode($row['pic']).'" style="width:50%; height:145px;"/>'.'</span>'.
						'<ul class="features">'.
							'<li>'.$row['nname'].'</li>'.
							'<li>'.$row['nyear'].'</li>'. 
						'</ul>'.
						'<input type="hidden" value="'. $row['regnum'] .'" name="vote"/>'.
						'<input type="submit"  value="Vote" class="button">'
						.'</div></div> </form>';
					}
		}
		else
		{
			    echo '<div class="w3-row w3-padding-16 w3-section" style="margin-left:55px;">';
			      $rem=$n%4;
				while($row=mysqli_fetch_assoc($r)){
					if($n>$rem)
					{
						echo '<form action="3.php" method="POST">';
				 echo ' <div class="w3-quarter w3-section"> ';
				echo '<div class="promo" style="margin-top:16px;">'.
						'<div class="deal">'.
							'<span>'.$tab .' Candidate</span>'.
							'<span>'.$row['regnum'].'</span>'.
						'</div>'.
						'<span class="price">'.'<img src="data:image/jpeg;base64,'.base64_encode($row['pic']).'" style="width:50%; height:145px;"/>'.'</span>'.
						'<ul class="features">'.
							'<li>'.$row['nname'].'</li>'.
							'<li>'.$row['nyear'].'</li>'. 
						'</ul>'.
						'<input type="hidden" value="'. $row['regnum'] .'" name="vote"/>'.
						'<input type="submit"  value="Vote" class="button">'
						.'</div></div></form>';
						$n--;
					}
					else if($rem==1)
					{
						echo '<form action="3.php" method="POST">';
						if($n==$rem)
						{
							echo "</div>";
							$n--;	
						  echo '<div class="w3-row w3-padding-16 w3-section" style="margin-left:515px;">';
						}
						echo ' <div class="w3-quarter w3-section"> ';
				echo '<div class="promo" style="margin-top:16px;">'.
						'<div class="deal">'.
							'<span>'.$tab .' Candidate</span>'.
							'<span>'.$row['regnum'].'</span>'.
						'</div>'.
						'<span class="price">'.'<img src="data:image/jpeg;base64,'.base64_encode($row['pic']).'" style="width:50%; height:145px;"/>'.'</span>'.
						'<ul class="features">'.
							'<li>'.$row['nname'].'</li>'.
							'<li>'.$row['nyear'].'</li>'.
						'</ul>'.
						'<input type="hidden" value="'. $row['regnum'] .'" name="vote"/>'.
						'<input type="submit"  value="Vote" class="button">'
						.'</div></div></form>';
					}
					else if($rem==2)
					{
						echo '<form action="3.php" method="POST">';
						if($n==$rem)
						{
							echo "</div>";
							$n--;	
						  echo '<div class="w3-row w3-padding-16 w3-section" style="margin-left:268px;">';
						}
						echo ' <div class="w3-half w3-section"> ';
				echo '<div class="promo" style="margin-top:16px;">'.
						'<div class="deal">'.
							'<span>'.$tab .' Candidate</span>'.
							'<span>'.$row['regnum'].'</span>'.
						'</div>'.
						'<span class="price">'.'<img src="data:image/jpeg;base64,'.base64_encode($row['pic']).'" style="width:50%; height:145px;"/>'.'</span>'.
						'<ul class="features">'.
							'<li>'.$row['nname'].'</li>'.
							'<li>'.$row['nyear'].'</li>'. 
						'</ul>'.
						'<input type="hidden" value="'. $row['regnum'] .'" name="vote"/>'.
						'<input type="submit"  value="Vote" class="button">'
						.'</div></div></form>';
					}
					else if($rem==3)
					{
						echo '<form action="3.php" method="POST">';
						if($n==$rem)
						{
							echo "</div>";
							$n--;
							
						  echo '<div class="w3-row w3-padding-16 w3-section" style="margin-left:136px;">';
						}
							echo ' <div class="w3-third w3-section">';
				            echo '<div class="promo" style="margin-top:16px;">'.
						'<div class="deal">'.
							'<span>'.$tab .' Candidate</span>'.
							'<span>'.$row['regnum'].'</span>'.
						'</div>'.
						'<span class="price">'.'<img src="data:image/jpeg;base64,'.base64_encode($row['pic']).'" style="width:50%; height:145px;"/>'.'</span>'.
						'<ul class="features">'.
							'<li>'.$row['nname'].'</li>'.
							'<li>'.$row['nyear'].'</li>'. 
						'</ul>'.
						'<input type="hidden" value="'. $row['regnum'] .'" name="vote"/>'.
						'<input type="submit"  value="Vote" class="button">'
						.'</div></div> </form>';
					}
	                }
		}
}
?>
</div> 

<footer class="w3-container w3-padding-32 w3-center w3-opacity w3-light-grey w3-xlarge">
 <p style="font-size:20px;">Copyright © OVS, LSH @ NITK 2018</p><br>
 <p style="font-size:15px; margin-top:-40px;">* Best viewed in Mozilla Firefox® 20 or higher & Google Chrome 30 or higher. Strictly no support or access through Internet Explorer.</p>
</footer>

</body>
</html>
