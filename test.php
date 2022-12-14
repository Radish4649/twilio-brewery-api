<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/index.php';

$test_urls = [
    "http://localhost:80?FromCity=detroit",
    "http://localhost:80?FromCity=norfolk",
    "http://localhost:80?FromCity=virginia beach",
    "http://localhost:80?FromCity=chicago",
    "http://localhost:80?FromCity=phoenix",
    "http://localhost:80?FromCity=fsdgvnrvnjksrn",
    "http://localhost:80?FromCity=",
    "http://localhost:80"
];

foreach ($test_urls as $url) {
    $response = WpOrg\Requests\Requests::get($url, array('Accept' => 'application/json'));
    var_dump($response->body);
}

/*

Currently the outputs are dumped to be manually inspected, but a natural extension of this would be to have the results be automatically graded as pass/fail

*/