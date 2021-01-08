<?php
namespace app\code\admin\controllers;

use app\system\google\GoogleAPI;
use yii\web\Controller;

class GoogleController extends Controller
{
    public function actionIndex()
    {
        $client = new GoogleAPI();

        return $this->render('index', [
            'client' => $client
        ]);
    }
}