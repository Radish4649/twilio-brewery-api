<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

function get_breweries_from_city ($city) {
    $response = WpOrg\Requests\Requests::get("https://api.openbrewerydb.org/breweries?by_city=$city", array('Accept' => 'application/json'));
    $response_object = json_decode($response->body);
    return $response_object;
}
/*
function get_random_brewery_from_array
Example of returned object: 
{
  ["name"]=>
  string(16) "Batch Brewing Co"
  ["street"]=>
  string(14) "1400 Porter St"
  ["city"]=>
  string(7) "Detroit"
  ["state"]=>
  string(8) "Michigan"
}
*/
function get_random_brewery_from_array ($array) {
    return $array[rand(0,count($array)-1)];
} 

function assemble_brewery_address_string ($brewery) {
    return $brewery->name." is located at ".$brewery->street." ".$brewery->city.", ".$brewery->state.".";
}

function get_brewery ($city) {
    $array = get_breweries_from_city($city);
    if (count($array) === 0) return "Sorry, we could not find a brewery in the city you are located.";
    $random_brewery = get_random_brewery_from_array($array);
    $random_brewery_address = assemble_brewery_address_string($random_brewery);
    return $random_brewery_address;
}