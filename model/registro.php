<?php error_reporting(E_ALL);
include("../model/conexion.php");
$name = $_POST['name']; 
$lastname1 = $_POST['last_name_1'];
$lastname2 = $_POST['last_name_2'];
$email = $_POST['email'];
$phone_number=$_POST['phone_number'];
$last_name=$lastname1 . $lastname2;
# Include the Autoloader (see "Libraries" for install instructions)
require '../vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-4e896b8110f1ceb63b180c87bc225c16');
$domain = "sandbox8128d26fd2464b42a6dc95e54a7cda2a.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Excited User <mailgun@sandbox8128d26fd2464b42a6dc95e54a7cda2a.mailgun.org>',
    'to'      => 'Baz <"$email">',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!'
));






// Change database 
mysqli_select_db($con,"$dbname");

//
$query=mysqli_query($con,"INSERT INTO User (email,name,last_name,phone_number) 
VALUES ('$email','$name','$last_name','$phone_number')");

mysqli_close($con);

echo '<script language="javascript">';
echo 'alert("Registro Exitoso!!")';
echo '</script>';
exit;
header("location:index.html")
?>