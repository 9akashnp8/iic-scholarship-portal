
<?php

require('config.php');
require('razorpay-php/Razorpay.php');
// session_start();
// $regid=$_SESSION['regid'];
//   $name=$_SESSION['name'];
//     $email=$_SESSION['email'];
//  $phno= $_SESSION['phno'];


// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
$api->plan->create(array('period' => 'weekly', 'interval' => 1, 'item' => array('name' => 'Test Weekly 1 plan', 'description' => 'Description for the weekly 1 plan', 'amount' => 600, 'currency' => 'INR'),'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

$api->plan->all($options);
?>