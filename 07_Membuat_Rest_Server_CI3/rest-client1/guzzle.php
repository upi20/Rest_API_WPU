<?php
require 'vendor/autoload.php';


use GuzzleHttp\Client;

$client = new Client;
$response = $client->request('get', 'http://www.omdbapi.com',[
	'query' => [
		'apikey' => 'd9bc1b6b',
		's' => 'transformers'
	]
]);

var_dump(json_decode($response->getBody()->getContents(), true));
?>