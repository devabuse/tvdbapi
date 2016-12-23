<?php

use TVDB\Authentication\Authentication;
use TVDB\Request\RequestSeries;

require_once __DIR__ . '/bootstrap.php';

$authentication = new Authentication($credentials, $client);

$seriesId = 75299; // Sopranos Series ID ( see series.php example )
$request = new RequestSeries($authentication, $client, 75299);

try {
    $result = $request->doRequest();

    var_dump(json_decode($result->getBody()->getContents()));
} catch(Exception $e) {
    print $e->getMessage();
}