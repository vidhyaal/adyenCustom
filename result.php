<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
// Set your X-API-KEY with the API key from the Customer Area.
$client = new \Adyen\Client();
$client->setXApiKey("AQE1hmfxJo/OaR1Kw0m/n3Q5qf3Ve55dHZxYTFdTxWq+l3JOk8J4BA+ztqPuS4G6vYkJoj+c4MIQwV1bDb7kfNy1WIxIIkxgBw==-+g+FdHJB1s/8mcg/evWIDkJgGZRqO7hMsodFya1e7f0=-Bg2vV8qEgP65bdMd");
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
    "number" =>"4111111111111111",
    "expiryMonth"=> "10",
    "expiryYear"=> "2020",
    "holderName"=>"John Smith",
    "cvc"=> "737"
  ),
  "returnUrl" => "success.php",
  "merchantAccount" => "SupportRecruitementCOM"
);
$result = $service->payments($params);
$_SESSION['result'] = $result;
 $_COOKIE['res'] = $result;
 echo "<pre>";
 print_r($result) ;


?>
