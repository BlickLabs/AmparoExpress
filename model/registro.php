<?php error_reporting(E_ALL);
include("../model/conexion.php");
$name = $_POST['Nombre']; 
$email = $_POST['correo'];

# Include the Autoloader (see "Libraries" for install instructions)
//require '../vendor/autoload.php';
//use Mailgun\Mailgun;

//# Instantiate the client.
//$mgClient = new Mailgun('key-4e896b8110f1ceb63b180c87bc225c16');
//$domain = "sandbox8128d26fd2464b42a6dc95e54a7cda2a.mailgun.org";
//
//# Make the call to the client.
//$result = $mgClient->sendMessage($domain, array(
//    'from'    => 'Excited User <mailgun@sandbox8128d26fd2464b42a6dc95e54a7cda2a.mailgun.org>',
//    'to'      => 'Baz <"tonoescom@gmail.com">',
//    'subject' => 'Hello',
//    'text'    => 'Testing some Mailgun awesomness!'
//));






// Change database 
mysqli_select_db($con,"$dbname");

//
$query=mysqli_query($con,"INSERT INTO User (email,name) 
VALUES ('$email','$name')");

mysqli_close($con);

echo '<script language="javascript">';
echo 'alert("Registro Exitoso!!")';
echo '</script>';
exit;

?>
