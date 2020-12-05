<?php
$server="localhost";
$username="root";
$password="";
$dbname="chatbot";

$conn=new mysqli($server,$username,$password,$dbname);
if($conn){
	echo "<br/>";
}
else{
echo "Failed to connect";
}
?>