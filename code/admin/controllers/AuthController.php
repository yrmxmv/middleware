<?php
namespace app\code\admin\controllers;

use app\system\google\GoogleAPI;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionOauth2callback()
    {
        $client = new GoogleAPI();
        $client->fetchAccessTokenWithAuthCode();
        $client->saveAccessToken();

        return $this->redirect('/admin?success=true');
    }
}