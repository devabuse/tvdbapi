<?php

use TVDB\Authentication\Authentication;
use TVDB\Request\RequestSearch;

require_once __DIR__ . '/bootstrap.php';

$authentication = new Authentication($credentials, $client);
$request = new RequestSearch($authentication, $client);

try {
    $request->setParams([
        'name' => 'The Sopranos',
    ]);

    $result = $request->doRequest();

    var_dump(json_decode($result->getBody()->getContents()));
} catch(Exception $e) {
    print $e->getMessage();
}