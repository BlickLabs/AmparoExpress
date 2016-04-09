
<?php error_reporting(E_ALL);
    // include("../model/conexion.php");
    date_default_timezone_set("america/mexico_city");


   $name = $_POST['name'];
    $email = 'contacto@amparoexpress.com';
    $email2=$_POST['email'];
    
//# Include the Autoloader (see "Libraries" for install instructions)
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;
    
//# Instantiate the client.
    $mgClient = new Mailgun('key-640c4034f076a9f1a0ec13a1e93b1598');
    $domain = "sandboxe6d048d4b3b6442a93835a10e535b542.mailgun.org";
//
//# Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' => 'AmparoExpress <postmaster@sandboxe6d048d4b3b6442a93835a10e535b542.mailgun.org>',
        'to' => $email,
        'subject' => 'Solicitud de amparo aprobada',
        'text' => 

       ' Equipo de amparoexpress,

        Hemos recibido una solicitud de amparo contra el programa de hoy no circula y el pago ha sido aprobado. 
 

        Nombre del cliente: ' . $name . '   
        Correo electrónico: ' . $email2. '
        Fecha y Hora: '.date("d/m/y H:i:s").'
       
'
    ));