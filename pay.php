<html>
<head><title>Pay</title>
<body>
<h2>Payment methods</h2>
<?php
require __DIR__ . '/vendor/autoload.php';
	$client = new \Adyen\Client();
		$client->setXApiKey("AQE1hmfxJo/OaR1Kw0m/n3Q5qf3Ve55dHZxYTFdTxWq+l3JOk8J4BA+ztqPuS4G6vYkJoj+c4MIQwV1bDb7kfNy1WIxIIkxgBw==-cpyGy0LKZtWHM3D+Mk38kzhN3F+nlAtza4Rf9jFsNO8=-h4tyr9I25QRa4GEV");
		$client->setEnvironment(\Adyen\Environment::TEST);

		$service = new \Adyen\Service\Checkout($client);
		
		$params = array(
		  "merchantAccount" => "SupportRecruitementCOM",
		  "countryCode" => "NL",
		  "amount" => array(
			"currency" => "EUR",
			"value" => 1000
		  ),
		  "channel" => "Web"
		);
		$result = $service->paymentMethods($params);
	if (is_array($result['paymentMethods'])){
			foreach ($result['paymentMethods'] as $k)
			{
				if (is_array($k)){

					foreach ($k as $name=>$val){
						echo "<ul>";
						if(!is_array($name)){
							if ($name=='name'){
								$filename=substr($val, 0, strpos($val, ' '));
								echo "<a href=".$filename.".php><li>".( $val). "</li></a>";
							}
							
						}
						echo "</ul>";
					}
				}
				
			}
					
		
		

		}	
		


?>
</body>
</html>