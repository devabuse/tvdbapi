<?php

namespace TVDB\Authentication;

use GuzzleHttp\Client;
use TVDB\Credentials\Credentials;

class Authentication {
    const AUTHENTICATION_URL = "https://api.thetvdb.com/login";

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var the token received from the API
     */
    private $token;

    /**
     * Authentication constructor.
     *
     * @param Credentials $credentials
     * @param Client $client
     */
    public function __construct(Credentials $credentials, Client $client) {
        $this->credentials = $credentials;
        $this->client = $client;
    }

    /**
     * Returns the token after authentication.
     *
     * @todo Maybe add a layer to the class to store the token for a set period as the token can be used for up to 60 minutes
     *
     * @return string
     */
    public function getToken() {
        if(empty($this->token)) {
            $this->token = json_decode($this->authenticate())->token;
        }

        return $this->token;
    }

    private function authenticate() {
        try {
            $request = $this->client->request('post', self::AUTHENTICATION_URL, [
                'json' => $this->getParams(),
            ]);

            return $request->getBody()->getContents();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    private function getParams() {
        return [
            'apikey' => $this->credentials->getApiKey(),
        ];
    }
}