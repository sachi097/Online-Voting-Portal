<?php
		   $servername = "localhost";
	$username = "root";
	$password = "";
	$database="ovs";
	$con=mysqli_connect($servername,$username,$password,$database);
       $tab=$_GET['tab'];
	   $tab=strtolower($tab);
	   $tab=str_replace(' ','_',$tab);
	   $sql="select SUM(IT),SUM(EEE),SUM(EC),SUM(ME),SUM(MI),SUM(MT),SUM(CH),SUM(CS),SUM(CIVIL) from $tab";
	   $result=mysqli_query($con,$sql);
	   while($res=mysqli_fetch_assoc($result))
	   {
		$it=$res['SUM(IT)'];
        $eee=$res['SUM(EEE)'];
		$ec=$res['SUM(EC)'];
		$me=$res['SUM(ME)'];
		$mi=$res['SUM(MI)'];
		$mt=$res['SUM(MT)'];
		$ch=$res['SUM(CH)'];
		$cs=$res['SUM(CS)'];
		$civ=$res['SUM(CIVIL)'];
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
