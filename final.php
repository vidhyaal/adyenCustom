<?php
require __DIR__ . '/vendor/autoload.php';
// Set your X-API-KEY with the API key from the Customer Area.
$client = new \Adyen\Client();
$client->setXApiKey("AQE1hmfxJo/OaR1Kw0m/n3Q5qf3Ve55dHZxYTFdTxWq+l3JOk8J4BA+ztqPuS4G6vYkJoj+c4MIQwV1bDb7kfNy1WIxIIkxgBw==-cpyGy0LKZtWHM3D+Mk38kzhN3F+nlAtza4Rf9jFsNO8=-h4tyr9I25QRa4GEV");
$client->setEnvironment(\Adyen\Environment::TEST);
$service = new \Adyen\Service\Checkout($client);
 
$params = array(
  "amount" => array(
    "currency" => "EUR",
    "value" => 10000
  ),
  "reference" => "12345",
  "paymentMethod" => array(
    "type" => "scheme",
    "number" =>"4111111145551142",
    "expiryMonth"=> "10",
    "expiryYear"=> "2020",
    "holderName"=>"John Smith",
    "cvc"=> "737"
  ),
  "returnUrl" => "final.php",
  "merchantAccount" => "SupportRecruitementCOM"
);
$result = $service->payments($params);
$_SESSION['result'] = $result;
echo '<pre>';
print_r($result) ;
?>
