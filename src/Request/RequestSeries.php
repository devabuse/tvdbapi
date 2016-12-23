<?php

namespace TVDB\Request;

use GuzzleHttp\Client;
use TVDB\Authentication\Authentication;

/**
 * Class RequestSeries
 * @url https://api.thetvdb.com/swagger#/Series
 * @package TVDB\Request
 */
class RequestSeries extends Request implements Requestable {
    /**
     * @var int series id
     */
    private $seriesId;

    public function __construct(Authentication $authentication, Client $client, $seriesId) {
        parent::__construct($authentication, $client);

        $this->seriesId = $seriesId;
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
        return '/series/' . $this->seriesId;
    }

    /**
     * Return a set of default paramaters that always need to be provided for a functional API call
     *
     * @return array
     */
    public function getDefaultParams() {
        // No additional params required for this method
        return [];
    }
}