<?php
		   $servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
       $tab=$_GET['tab'];
	   $reg=$_GET['reg'];
	   $tab=strtolower($tab);
	   $tab=str_replace(' ','_',$tab);
	   $sql="select IT,EEE,EC,ME,MI,MT,CH,CS,CIVIL from $tab where regnum = '$reg'";
	   $result=mysqli_query($con,$sql);
	   while($res=mysqli_fetch_assoc($result))
	   {
		$it=$res['IT'];
        $eee=$res['EEE'];
		$ec=$res['EC'];
		$me=$res['ME'];
		$mi=$res['MI'];
		$mt=$res['MT'];
		$ch=$res['CH'];
		$cs=$res['CS'];
		$civ=$res['CIVIL'];
	   }
	   $data = new stdClass();
	   $data->cols=array(array("id"=>"Task","type"=>"string"),array("id"=>"Hours per Day","type"=>"number"));
	   $data->rows=array(array("c"=>array(array("v"=>"IT"),array("v"=>(int)$it))),
						 array("c"=>array(array("v"=>"EEE"),array("v"=>(int)$eee))),
					     array("c"=>array(array("v"=>"EC"),array("v"=>(int)$ec))),
						 array("c"=>array(array("v"=>"ME"),array("v"=>(int)$me))),
						 array("c"=>array(array("v"=>"MI"),array("v"=>(int)$mi))),
						 array("c"=>array(array("v"=>"MT"),array("v"=>(int)$mt))),
						 array("c"=>array(array("v"=>"CH"),array("v"=>(int)$ch))),
						 array("c"=>array(array("v"=>"CS"),array("v"=>(int)$cs))),
						 array("c"=>array(array("v"=>"CIVIL"),array("v"=>(int)$civ))));
       $datajson = json_encode($data);
	   echo $datajson;
?>
