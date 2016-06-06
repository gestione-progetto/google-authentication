<?php

class GoogleAuth
{
    private $db;
    private $client;

    public function __construct(DB $db, Google_Client $googleClient)
    {
        $this->db = $db;
        $this->client = $googleClient;

        $this->client->setClientId('192153637896-c3c2m8veqjc552nmj2ksgaaumtifbik1.apps.googleusercontent.com');
        $this->client->setClientSecret('CzWaUukwRPX7Oe7WbIfsqC2q');
        $this->client->setRedirectUri();
        $this->client->setScopes('email');
    }
}
