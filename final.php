<?php
session_start();
$res=$_SESSION['result'];
echo "<pre>";
print_r($res);
?>
<html>
    <head>
        <title>
        Success page
        </title>
    </head>
   
    <body><h1>Payment Success!</h1></body>
    
</html>
