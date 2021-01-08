<?php
namespace app\code\admin\controllers;

use app\code\admin\models\CoreConfig;
use app\code\admin\models\source\Scope;
use yii\web\Controller;

class DashboardController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSave()
    {
        foreach (\Yii::$app->request->post('test') as $key => $item) {
            $path = str_replace('_', '/', $key);
            CoreConfig::updateScopeValue($item, $path,0, Scope::WEBSITE_SCOPE);
        }
    }
}