
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/gif/png" href="logo.png">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="tutssty.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<h2>Admin Login</h2>
	</div>
	<form method="post" action="allready1.php">
		<div class="input-g">
			<label>Admin Id:</label>
			<input type="text" name="reg" id="reg" required>
		</div>
		<div class="input-g">
			<label>Password</label>
			<input type="password" name="Password" id="Password" required>
		</div>
		<div class="input-g">
			<button type="button" name="login" class="btn" onclick="encry();">Login</button>
		</div>
		<p>
			 <a style="float: right;" href="mainpage.html">Home</a>
		</p>
		<script>
			var studentpubk,alreadypubk;
		   function encry()
		   {
			   var student = new XMLHttpRequest();
			   var allready = new XMLHttpRequest();
			   student.open("GET", "studentpubk.txt", false);
			   allready.open("GET", "alreadypubk.txt", false);
			   student.onreadystatechange = function ()
              {
				if(student.readyState === 4)
				{
					if(student.status === 200 || student.status == 0)
					{
						studentpubk = student.responseText;
					}
				}
			  }
			   student.send(null);
			   allready.onreadystatechange = function ()
              {
				if(allready.readyState === 4)
				{
					if(allready.status === 200 || allready.status == 0)
					{
						alreadypubk = allready.responseText;
					}
				}
			  }
			   allready.send(null);
			   alreadypubk=encodeURIComponent(alreadypubk);
			   studentpubk=encodeURIComponent(studentpubk);
			   var reg=document.getElementById("reg").value;
			   var pass=document.getElementById("Password").value;
			   var jsonData = $.ajax({
								url: "kerberos.php?reg="+reg+"&pass="+pass+"&senderpubk="+studentpubk+"&reciverpubk="+alreadypubk,
								dataType: "json",
								async: false
								}).responseText;
				jsonData = JSON.parse(jsonData);
				window.location.href = "ticketgrantadmin.php?"+jsonData.ciquery;	
		   }
		</script>
	</form>
</body>
</html>