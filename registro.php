<?php error_reporting(E_ALL);
 //include("model/conexion.php"); 
 include("../AmparoExpress/model/conexion.php");
$name = $_POST['name']; 
$lastname1 = $_POST['last_name_1'];
$lastname2 = $_POST['last_name_2'];
$email = $_POST['email'];
$phone_number=$_POST['phone_number'];
$last_name=$lastname1 . $lastname2;


$sql="INSERT INTO User (email,name,last_name,phone_number)  VALUES ('$email','$name','$last_name','$phone_number');";
?>
