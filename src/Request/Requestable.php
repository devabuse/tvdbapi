<?php

namespace TVDB\Request;

interface Requestable {
    /**
     * Return the method required to perform the request. TVDB api uses POST and GET requests
     *
     * @return string
     */
    public function getMethod();

    /**
     * Return the path for this request
     *
     * @return string
     */
    public function getPath();

    /**
     * Return a set of default paramaters that always need to be provided for a functional API call
     *
     * @return array
     */
    public function getDefaultParams();
}