<?php error_reporting(E_ALL);

     use Mailgun\Mailgun;
    require '../vendor/autoload.php';
    $name2 = $_POST['name'];
$email2 = $_POST['email'];
$mensaje=$_POST['message'];
$asunto='Un cliente requiere de mayor información: ';
 
  $api_key = 'key-640c4034f076a9f1a0ec13a1e93b1598';
  $api_domain = 'sandboxe6d048d4b3b6442a93835a10e535b542.mailgun.org';
  $send_to = 'contacto@amparoexpress.com';
 
  
  $name = $name2;
  $email = $email2;
  $content = $mensaje;
  $subject= $asunto;

 
  $messageBody = "De: $name ($email)\n\n $content";
 
  $config = array();
  $config['api_key'] = $api_key;
  $config['api_url'] = 'https://api.mailgun.net/v2/'.$api_domain.'/messages';
 
  $message = array();
  $message['from'] = $email;
  $message['to'] = $send_to;
  $message['h:Reply-To'] = $email;
  $message['subject'] = $subject;
  $message['text'] = $messageBody;
 
  $curl = curl_init();
 
  curl_setopt($curl, CURLOPT_URL, $config['api_url']);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_POST, true); 
  curl_setopt($curl, CURLOPT_POSTFIELDS,$message);
 
  $result = curl_exec($curl);
 
  curl_close($curl);
  header('Location: ../enviado.html');
  
  return $result;
  
?>