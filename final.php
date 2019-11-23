<html>
<head><title.Payment</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<?php
$cardNum=$_POST['ccNum'];
$cvv=$_POST['cvv'];
$expDate=$_POST['expDate'];
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
    "number" =>$cardNum,
    "expiryMonth"=> substr($expDate,0,2),
    "expiryYear"=>'20'. substr($expDate,3,2),
    "holderName"=>"John Smith",
    "cvc"=> $cvv
  ),
  "returnUrl" => "final.php",
  "merchantAccount" => "SupportRecruitementCOM"
);
$result = $service->payments($params);
$_SESSION['result'] = $result;
echo "<center>Your transaction is <b>".$result['resultCode']."</b><p> Your transaction reference number is <label>".$result['additionalData']['networkTxReference']."</label>";

 
?>
</body>
</html>

