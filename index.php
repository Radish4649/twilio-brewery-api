<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/brewery_lookup.php';
use Twilio\TwiML\VoiceResponse;

// Start our TwiML response
$response = new VoiceResponse;
$city = array_key_exists("FromCity", $_GET) ? $_GET['FromCity'] : "";
$response_message = get_brewery($city);
// Read a message aloud to the caller
$response->say(
    $response_message, 
    array("voice" => "alice")
);

echo $response;