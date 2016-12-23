<?php

namespace TVDB\Credentials;

class Credentials {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * Get an API key from the settings class
     *
     * @return string
     */
    public function getApiKey(){
        return $this->apiKey;
    }
}