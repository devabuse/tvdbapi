<?php

namespace TVDB\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use TVDB\Authentication\Authentication;

abstract class Request {
    const BASE_URL = "https://api.thetvdb.com";

    /**
     * @var Authentication
     */
    private $authentication;
    /**
     * @var Client
     */
    private $client;
    /**
     * @var array params to send to the API
     */
    private $params = [];

    /**
     * Request constructor.
     * @param Authentication $authentication
     * @param Client $client
     */
    public function __construct(Authentication $authentication, Client $client) {
        $this->authentication = $authentication;
        $this->client = $client;
    }

    /**
     * Return the method required to perform the request. TVDB api uses POST and GET requests
     *
     * @return string
     */
    abstract public function getMethod();

    /**
     * Return the path for this request
     *
     * @return string
     */
    abstract public function getPath();

    /**
     * Return a set of default paramaters that always need to be provided for a functional API call
     *
     * @return array
     */
    abstract public function getDefaultParams();    

    /**
     * Performs the actual request using methods implemented from extended classes
     *
     * @return Response
     * @throws \Exception
     */
    public function doRequest() {
        try {
            return $this->client->request($this->getMethod(), self::BASE_URL . $this->getPath(), [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authentication->getToken(),
                ],
                'query' => $this->getParams(),
            ]);
        } catch(\Exception $e) {
            throw $e;
        }
    }

    /**
     * Returnthe params for this request
     *
     * @return array
     */
    public function getParams() {
        return array_replace_recursive($this->getDefaultParams(), $this->params);
    }

    /**
     * Set the params for this request
     *
     * @param array $params
     */
    public function setParams($params) {
        $this->params = $params;
    }
}
