<?php error_reporting(E_ALL);
     include("../model/conexion.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
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
        'subject' => 'Tu amparo está en proceso.',
        'text' => 'Hola ' . $name . ',

        ¡Gracias por confiar en amparoexpress!

        Tu amparo ya está en trámite y el proceso de tu liberación puede tardar de 3 a 5 horas*.

        Para cualquier duda o aclaración contáctanos a contacto@amparoexpress.com.

        Estamos para apoyarte,
        Equipo de amparoexpress

        *Este tiempo no depende de amparoexpress; está sujeto a la carga de trabajo del Poder Judicial de la Federación. '
    ));




//// Change database 
mysqli_select_db($con, "$dbname");

    $query = mysqli_query($con, "INSERT INTO User (email,name) 
VALUES ('$email','$name')");

    mysqli_close($con);    
    
    ?>