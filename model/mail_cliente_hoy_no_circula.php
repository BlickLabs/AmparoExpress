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
        'subject' => 'Solicitud de amparo Hoy no circula...',
        'text' => 'Hola ' . $name . ',

        ¡Gracias por confiar en amparoexpress!
        
         Es necesario que nos envíes en archivo adjunto la siguiente documentación escaneada:
            1.- Tarjeta de circulación
            2.- Factura o carta factura 
            3.- Licencia de conducir vigente
            4.- Engomado en donde establezca que tiene “0” o “00”

        ¿Cómo es el proceso? 

        Una vez recibida la documentación validaremos que esté correcta. Posteriormente nos pondremos en contacto con usted 
        para presentar la demanda de amparo el cual una vez que se haya admitido y se obtenga el acuerdo de sentencia de 
        suspensión provisional se la enviaremos.
        
        Es importante manifestarle que cada Juzgado de Distrito en Materia Administrativa en la Ciudad de México tiene criterios distintos, 
        por lo que en caso que nieguen la suspensión del acto, se presentará recurso de queja dentro de los días siguientes para que el Tribunal 
        de Alzada se pronuncie respecto a su suspensión, el cual le avisaremos cuando se resuelva la misma. 
        
        Para cualquier duda o aclaración contáctanos a contacto@amparoexpress.com.

        Estamos para apoyarte,
        Equipo de amparoexpress'
    ));




//// Change database 
mysqli_select_db($con, "$dbname");

    $query = mysqli_query($con, "INSERT INTO User (email,name) 
    VALUES ('$email','$name')");

    mysqli_close($con);    
    
    ?>