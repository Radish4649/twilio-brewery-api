<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\TwiML\VoiceResponse;

// Start our TwiML response
$response = new VoiceResponse;
$zipcode = $_GET['FromZip'];
// Read a message aloud to the caller
$response->say(
    $zipcode, 
    array("voice" => "alice")
);

echo $response;