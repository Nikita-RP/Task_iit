<?php
$conn = new mysqli("localhost","root","","weather") or die($conn->error);
	session_start();
	
	echo"<div align='center'>Select Location:</div>";
	echo"<form action='test.php' method='get' align='center'><select name='location'>";

	error_reporting(0);
	
	$query_run="SELECT * FROM `place`";
	$result=mysqli_query($conn,$query_run);
	while($row=mysqli_fetch_array($result))
	{
		$triplet=$row['Place_ID'];
		$loc=$row['Place_Name'];
		if($triplet==$_GET['location'])
		{
			echo '<option value='.$triplet.' selected="selected">'.$loc.'</option>';
		}
		else
		{
			echo '<option value='.$triplet.'>'.$loc.'</option>';
		}
	}
	if(@$_GET['id'])
	    $on_start=false;
	else
	    $on_start=true;
	echo"</select><input type='submit' value='Submit' /></center><form>";
	if(@$_GET['location'])
	{   
	    echo"<br>";
	    $tri_id=$_GET['location'];
		$GLOBALS['location']=$tri_id;
        //echo ($tri_id);
        if($tri_id=='s1' &&$on_start==true)
		{
	      include 'chrt.php'; 
		}
		elseif($tri_id=='s2' &&$on_start==true)
		{
			include 'index.php';
		}
		elseif($tri_id=='s3' &&$on_start==true)
		{
			include 'tableshow.php';
		}
    
    }
    ?>