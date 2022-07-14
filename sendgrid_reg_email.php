<?php
require_once 'sendgrid-php\sendgrid-php.php';   

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); //Notice the Namespace and Class name
$dotenv->load();

use SendGrid\Mail\From;
use SendGrid\Mail\To;
use SendGrid\Mail\Mail;

$from = new From("akash.np@lakshyaca.com", "Akash NP");
$to = new To(
    "akash.np@lakshyaca.com",
    "Akash NP",
    [
        'subject' => 'Lakshya Scholarship - Registration Success',
        'name' => 'Akash NP',
        'login_id' => 'LAK-SC-001',
        'payment_id' => 'ABCD123'
    ]
    );
$email = new Mail(
    $from, 
    $to
);
$email->setTemplateId('d-5ea8fd6d573948118796b818436e8cff');

$sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}
?>