<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\TwiML\VoiceResponse;

// Start our TwiML response
$response = new VoiceResponse;
$city = $_GET['FromCity'];
// Read a message aloud to the caller
$response->say(
    $city, 
    array("voice" => "alice")
);

echo $response;