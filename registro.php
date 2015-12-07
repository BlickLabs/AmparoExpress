<?php error_reporting(E_ALL);
/*    if(isset($_POST['email'])) {

  // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
  $email_to = $_POST['email'];
  $email_nombre = $_POST['nombre'] . "\n";
  $email_paterno = $_POST['ap_paterno'] . "\n";
  $email_materno = $_POST['ap_materno'] . "\n";
  $email_usuario = $_POST['rfc'] . "\n";
  $email_pass = $_POST['pw'] . "\n";
  $email_subject = "Confirmacion Registro En Sistema";

  // Aquí se deberían validar los datos ingresados por el usuario
  if(!isset($_POST['nombre']) ||
  !isset($_POST['ap_paterno']) ||
  !isset($_POST['ap_materno']) ||
  !isset($_POST['rfc']) ||
  !isset($_POST['pw']) ||
  !isset($_POST['email'])){

  echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
  echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
  die();
  }

  $email_message = "Bienvenido(a):";
  $email_message .= "<br>";
  $email_message .= "Correo De Confirmacion Al Sistema : ";
  $email_message .= "<br>";
  $email_message .= "Bienvenido Al Sistema Promoción 2014. ";
  $email_message .= "<br>";
  $email_message .= "Tus Datos son los siguientes: ";
  $email_message .= "<br>";
  $email_message .= "Nombre: " . $_POST['nombre'] . "\n";
  $email_message .=  $_POST['ap_paterno'] . "\n";
  $email_message .=  $_POST['ap_materno'] . "<br>";
  $email_message .= "Usuario: " . $_POST['rfc'] . "<br>";
  $email_message .= "Contraseña: " . $_POST['pw'] . "<br>";






  require 'PHPMailerAutoload.php';

  //Create a new PHPMailer instance
  $mail = new PHPMailer();
  // Set PHPMailer to use the sendmail transport
  //$mail->isSendmail();
  //Set who the message is to be sent from
  $mail->setFrom('registro@ipnpromociondocente.tk', 'Registro');
  //Set an alternative reply-to address
  $mail->addReplyTo('registro@ipnpromociondocente.tk', 'Respuestas');
  //Set who the message is to be sent to
  $mail->addAddress($email_to, $email_nombre);
  //Set the subject line
  $mail->Subject = $email_subject;

  $mail->msgHTML($email_message);


  //send the message, check for errors
  if (!$mail->send()) {
  //echo "Error: " . $mail->ErrorInfo;
  } else {
  //echo "Correo Enviado!";
  }
  } */

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
// Recuperamos la sesiones y la almacenamos en variables

$name = $_POST['name']; 
$lastname1 = $_POST['last_name_1'];
$lastname2 = $_POST['last_name_2'];
$email = $_POST['email'];
$phone_number=$_POST['phone_number'];
$last_name=$lastname1 . $lastname2;






// hacemos la conexion
$con=mysqli_connect("localhost","root","","AmparoExpress");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"AmparoExpress");

// ...some PHP code for database "test"...
$ins2=mysqli_query($con,"INSERT INTO User (email,name,last_name,phone_number) 
VALUES ('$email','$name','$last_name','$phone_number')");
//////hola
mysqli_close($con);

?>
<script type="text/javascript">alert('Registro Exitoso!!');</script>
<?php
header('Location: index.php');
?>
