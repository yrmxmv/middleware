<?php
namespace app\system\google;
use Yii;

class GoogleAPI
{
    protected $client;

    protected $tokenPath;

    public function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setApplicationName('Gmail API PHP Quickstart');
        $this->client->setScopes(\Google_Service_Gmail::MAIL_GOOGLE_COM);
        $this->client->setAuthConfig(Yii::getAlias('@app/system/google/credentials.json'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');

        $this->tokenPath = Yii::getAlias('@app/system/google/token.json');
        if (file_exists($this->tokenPath)) {
            $accessToken = json_decode(file_get_contents($this->tokenPath), true);
            if (null !== $accessToken) {
                $this->client->setAccessToken($accessToken);
            }
        }
    }

    public function getClient()
    {
        if ($this->client->isAccessTokenExpired()) {
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            } else {
                Yii::$app->response->redirect('/admin/dashboard');
            }

            $this->saveAccessToken();
        }

        return $this->client;
    }

    public function saveAccessToken()
    {
        if (!file_exists(dirname($this->tokenPath))) {
            mkdir(dirname($this->tokenPath), 0700, true);
        }
        file_put_contents($this->tokenPath, json_encode($this->client->getAccessToken()));
    }

    public function fetchAccessTokenWithAuthCode()
    {
        if (Yii::$app->request->get('code')) {
            $accessToken = $this->client->fetchAccessTokenWithAuthCode(Yii::$app->request->get('code'));
            $this->client->setAccessToken($accessToken);
        }
    }

    public function createGoogleAuthUrl()
    {
        return $this->client->createAuthUrl();
    }
}