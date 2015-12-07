<?php error_reporting(E_ALL);


$name = $_POST['name']; 
$lastname1 = $_POST['last_name_1'];
$lastname2 = $_POST['last_name_2'];
$email = $_POST['email'];
$phone_number=$_POST['phone_number'];
$last_name=$lastname1 . $lastname2;
$name_2 = utf8_decode($name);
//estableciendo conexion
$con=mysqli_connect("localhost","root","","AmparoExpress");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Change database 
mysqli_select_db($con,"AmparoExpress");

//
$ins2=mysqli_query($con,"INSERT INTO User (email,name,last_name,phone_number) 
VALUES ('$email','$name','$last_name','$phone_number')");

mysqli_close($con);

echo '<script language="javascript">';
echo 'alert("Registro Exitoso!!")';
echo '</script>';
exit;

?>
