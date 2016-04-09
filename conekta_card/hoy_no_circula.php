<?php error_reporting(E_ALL);

require_once("../conekta/lib/Conekta.php");
Conekta::setLocale('es');
Conekta::setApiKey("key_bxBpAz1j8Y3iVW6esPPLxQ");

try{
    $charge = Conekta_Charge::create(array(
  'amount'=> 220000,
  'currency'=>'MXN',
  'description'=> 'Servicio',
  'reference_id'=> '9839-wolf_pack',
  'card'=> $_POST['conektaTokenId'],
  'details'=> array(
    'name'=> $_POST['name'],
    'email'=> $_POST['email'],
    'customer'=> array(
      'corporation_name'=> 'AmparoExpress.',
      'logged_in'=> true,
      'successful_purchases'=> 14,
      'created_at'=> 1379784950,
      'updated_at'=> 1379784950,
      'offline_payments'=> 4,
      'score'=> 9
    ),
    'line_items'=> array(
      array(
        'name'=> 'Amparo Hoy No Circula',
        'description'=> 'Amparo Hoy No Circula',
        'unit_price'=> 220000,
        'quantity'=> 1,
        
        'type'=> 'Service'
      )
    )
   )
  
    ));
  $toke=$charge->status;
  if ($toke=='paid'){
    require_once '../model/mail_cliente_hoy_no_circula.php';
                require_once '../model/mail_pagos_hoy_no_circula.php';
            header('Location: ../aprobado.html');
  }
} catch (Exception $ex) {
//    echo $ex;
header('Location: ../rechazado.html');
   
}
        
        
        
?>