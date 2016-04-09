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
      'corporation_name'=> 'Conekta Inc.',
      'logged_in'=> true,
      'successful_purchases'=> 14,
      'created_at'=> 1379784950,
      'updated_at'=> 1379784950,
      'offline_payments'=> 4,
      'score'=> 9
    ),
    'line_items'=> array(
      array(
        'name'=> 'Box of Cohiba S1s',
        'description'=> 'Imported From Mex.',
        'unit_price'=> 20000,
        'quantity'=> 1,
        'sku'=> 'cohb_s1',
        'type'=> 'food'
      )
    )
   )
  
    ));
  $toke=$charge->status;
  if ($toke=='paid'){
    //require_once '../model/init.php';
     //      require_once '../model/mail_pagos_exitosos.php';
            header('Location: ../aprobado.html');
  }
} catch (Exception $ex) {
//    echo $ex;
header('Location: ../rechazado.html');
   
}
        
        
        
?>