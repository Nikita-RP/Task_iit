<?php
$servername="localhost";
$pass="";
$username="root";
$dbname="weather";
$db2name="weatherb";
$db3name="jaipur";

$conn=new mysqli($servername,$username,$pass,$dbname);
$conn2=new mysqli($servername,$username,$pass,$db2name);
$conn3=new mysqli($servername,$username,$pass,$db3name);
if($conn){
echo " connected";
}else{

}

?>