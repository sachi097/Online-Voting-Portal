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
		$it=(int)$res['SUM(IT)'];
        $eee=(int)$res['SUM(EEE)'];
		$ec=(int)$res['SUM(EC)'];
		$me=(int)$res['SUM(ME)'];
		$mi=(int)$res['SUM(MI)'];
		$mt=(int)$res['SUM(MT)'];
		$ch=(int)$res['SUM(CH)'];
		$cs=(int)$res['SUM(CS)'];
		$civ=(int)$res['SUM(CIVIL)'];
	   }
	   $it=103-$it;
	   $eee=103-$eee;
	   $ec=103-$ec;
	   $me=103-$me;
	   $mi=103-$mi;
	   $mt=103-$mt;
	   $ch=103-$ch;
	   $cs=103-$cs;
	   $civ=103-$civ;
	   $data = new stdClass();
	   $data->cols=array(array("id"=>"Task","type"=>"string"),array("id"=>"Hours per Day","type"=>"number"));
	   $data->rows=array(array("c"=>array(array("v"=>"IT"),array("v"=>$it))),
						 array("c"=>array(array("v"=>"EEE"),array("v"=>$eee))),
					     array("c"=>array(array("v"=>"EC"),array("v"=>$ec))),
						 array("c"=>array(array("v"=>"ME"),array("v"=>$me))),
						 array("c"=>array(array("v"=>"MI"),array("v"=>$mi))),
						 array("c"=>array(array("v"=>"MT"),array("v"=>$mt))),
						 array("c"=>array(array("v"=>"CH"),array("v"=>$ch))),
						 array("c"=>array(array("v"=>"CS"),array("v"=>$cs))),
						 array("c"=>array(array("v"=>"CIVIL"),array("v"=>$civ))));
       $datajson = json_encode($data);
	   echo $datajson;
?>
