<?php error_reporting(E_ALL);
include("../model/conexion.php");
$name = $_POST['Nombre']; 
$email = $_POST['email'];
# Include the Autoloader (see "Libraries" for install instructions)
require '../vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-4e896b8110f1ceb63b180c87bc225c16');
$domain = "sandbox8128d26fd2464b42a6dc95e54a7cda2a.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'AmparoExpress <postmaster@sandbox8128d26fd2464b42a6dc95e54a7cda2a.mailgun.org>',
    'to'      => $email,
    'subject' => 'AmparoExpress',
    'text'    => 'Hola '.$name.',


¡Gracias por confiar en amparoexpress!

Tu amparo ya está en trámite y el proceso de tu liberación puede tardar de 3 a 5 horas*.

Para cualquier duda o aclaración contáctanos a contacto@amparoexpress.com.

Estamos para apoyarte,
Equipo de amparoexpress

*Este tiempo no depende de amparoexpress; está sujeto a la carga de trabajo del Poder Judicial de la Federación. '
));



?>

//// Change database 
//mysqli_select_db($con,"$dbname");
//
////
//$query=mysqli_query($con,"INSERT INTO User (email,name) 
//VALUES ('$email','$name')");
//
//mysqli_close($con);
//
//header('Location:../index.html?status=success');
//if( $_GET['status'] == 'success'):
//    echo 'feedback message goes here';
//endif;
?>
