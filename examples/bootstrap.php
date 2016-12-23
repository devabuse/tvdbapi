<?php

use GuzzleHttp\Client;
use TVDB\Credentials\Credentials;

$base = dirname(__DIR__);

require_once $base . '/vendor/autoload.php';

$settings = parse_ini_file($base . '/settings.ini');

$credentials = new Credentials($settings['apikey']);
$client = new Client();