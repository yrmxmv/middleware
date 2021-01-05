<?php
namespace app\code\admin\controllers;

use yii\web\Controller;

class ErrorController extends Controller
{
    public function actions()
    {
        return [
            'message' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}