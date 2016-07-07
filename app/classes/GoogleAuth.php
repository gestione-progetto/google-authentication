<?php

class GoogleAuth
{
    private $db;
    private $client;
    private $redirectUri;

    public function __construct(DB $db, Google_Client $googleClient)
    {
        $this->db = $db;
        $this->client = $googleClient;
        $this->redirectUri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->client->setClientId('192153637896-c3c2m8veqjc552nmj2ksgaaumtifbik1.apps.googleusercontent.com');
        $this->client->setClientSecret('CzWaUukwRPX7Oe7WbIfsqC2q');
        $this->client->setRedirectUri($this->redirectUri);
        $this->client->setScopes('email');
    }

    public function checkToken(){
        if(isset($_SESSION['access_token']) && !emply($_SESSION['access_token']))
        {
            $this->client->setAccessToken($_SESSION['access_token']);
        }
        else {
            return $this->client->createAuthUrl();
        }

        return '';
    }
}
