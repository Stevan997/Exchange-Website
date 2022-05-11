<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }
}
