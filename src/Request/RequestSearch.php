<?php

namespace TVDB\Request;

use GuzzleHttp\Client;
use TVDB\Authentication\Authentication;

/**
 * Class RequestSearch
 * @url https://api.thetvdb.com/swagger#/Series
 * @package TVDB\Request
 */
class RequestSearch extends Request implements Requestable {
    public function __construct(Authentication $authentication, Client $client) {
        parent::__construct($authentication, $client);
    }

    /**
     * Return the method required to perform the request. TVDB api uses POST and GET requests
     *
     * @return string
     */
    public function getMethod() {
        return 'get';
    }

    /**
     * Return the path for this request
     *
     * @return string
     */
    public function getPath() {
        return '/search/series';
    }

    /**
     * Return a set of default paramaters that always need to be provided for a functional API call
     *
     * @return array
     */
    public function getDefaultParams() {
        return [
            'name' => 'The Sopranos',
        ];
    }
}