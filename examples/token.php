<?php

require_once __DIR__ . '/bootstrap.php';

use TVDB\Authentication\Authentication;

$authentication = new Authentication($credentials, $client);

$token = $authentication->getToken();

print $token;