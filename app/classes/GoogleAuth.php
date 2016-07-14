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
        // TODO get ClientId and ClientSecret from client_secret...googleusercontent.com.json
        $this->client->setClientId('xxx');
        $this->client->setClientSecret('xxx');
        $this->client->setRedirectUri($this->redirectUri);
        $this->client->setScopes('email');
    }

    public function checkToken()
    {
        if(isset($_SESSION['access_token']) && !emply($_SESSION['access_token']))
        {
            $this->client->setAccessToken($_SESSION['access_token']);
        }
        else {
            return $this->client->createAuthUrl();
        }

        return '';
    }

    public function login()
    {
        if(isset($_GET['code']))
        {
            $this->client->authenticate($_GET['code']);
            // $this->client->refreshToken();

            $_SESSION['access_token'] = $this->client->getAccessToken();

            // TODO: store user in DB

            return true;
        }

        return false;
    }
}
