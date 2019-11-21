<?php
session_start();
$res=$_SESSION['result'];
if $result['resultCode']=='Authorised{
echo "<body><h1>Payment Success!</h1></body>";
}
else
echo "<body><h1>Payment Refused!</h1></body>";

echo "<pre>";
print_r($res);
?>

