<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/brewery_lookup.php';
require __DIR__ . '/helper.php';
use Twilio\TwiML\VoiceResponse;


$response = new VoiceResponse;

if ( is_closed() ) {
    $response_message = "Sorry, we are closed. Please call again between the hours of nine and five-thirty.";
} else {
    $city = array_key_exists("FromCity", $_GET) ? $_GET['FromCity'] : "";
    $response_message = get_brewery($city);
}

$response->say(
    $response_message, 
    array("voice" => "alice", "loop" => 0)
);


echo $response;