<?php

require_once("../conekta/lib/Conekta.php");
Conekta::setLocale('es');
class MyConekta {
	
	public static $api_key = 'key_eYvWV7gSDkNYXsmr';
	public static $description = 'Donation';	
	public static $currency = 'MXN';	

	//Function to validate if the token does exist
	public static function check_token($token){
		if ($token == $_SESSION['token'])
			return true;

		return false;
	}

	//Function to generate a md5 32digits token
	public static function tokengenerator($len = 32){		
		//seed
		$keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";				
		// RANDOM KEY GENERATOR
		$id = "";
		$max = strlen($keychars) - 1;
		
		for ($i=0;$i<$len;$i++)
			$id .= substr($keychars, rand(0, $max), 1);
		
		return md5($id);
	}

	//Function to make payments in Bank
	public static function bank($amount, $name, $email, $phone, $bank){		
		Conekta::setApiKey(self::$api_key);
		$request = array(	
			'amount' => $amount,
			'currency' => self::$currency,
			'description' => self::$description,
			'details' => array(
			                'name' => $name,
			                'email' => $email,
			                'phone' => $phone
			                ),
			'bank' => array('type' => $bank)
			);
                        var_dump($request);
		try {
			$response = Conekta_Charge::create($request);  	

			echo
		    'status='.$response['status'].
		    '&currency='.$response['currency'].
		    '&description='.$response['description'].
		    '&amount='.$response['amount'].
		    '&service_name='.$response['payment_method']['service_name'].
		    '&service_number='.$response['payment_method']['service_number'].
		    '&reference='.$response['payment_method']['reference'].
		    '&type='.$response['payment_method']['type'].
		    '&expiry_date='.date('d/m/Y').
		    '&token='.$_SESSION['token'];
		  	
		} 
		catch (Exception $e) {
		  	// Catch all exceptions including validation errors.
		  	echo $e->getMessage(); 
		 }		
	}

	
	//Function to make payments with a Credit/Debit Card
	public static function card($amount, $number, $exp_month, $exp_year, $cvc,$name){
               
		Conekta::setApiKey(self::$api_key);
                
		$data = array(
			'card' => array(
				'number' => $number, 
				'exp_month' => $exp_month, 
				'exp_year' => $exp_year, 
				'cvc' => $cvc, 
				'name' => $name
				), 
			'description' => self::$description, 
			'amount' => $amount, 
			'currency' => self::$currency
			);
                        

		try {
		  $charge = Conekta_Charge::create($data);  
////		  echo 'exitoso';
////                  echo '<br>';
////                  echo $charge;
//                 //header('Location: ../aprobado.html');
 $token = $charge->status;
//                  echo $token;
                  if ($token == 'paid') {
   
//require_once 'init.php';
header('Location: ../aprobado.html');
}
		} 
		catch (Exception $e) {
		  // Catch all exceptions including validation errors.
//                  echo '<br>';
 echo $e->getMessage(); 
//                  echo '<br>';
//                  echo 'error';
                  //header('Location: ../rechazado.html');
		}
	}
	//END OF CLASS
}

//if ($token == 'paid') {
//   
////require_once 'init.php';
//header('Location: ../aprobado.html');
//}else {
//    header('Location: ../rechazado.html');
//}



