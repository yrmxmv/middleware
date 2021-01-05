<?php
namespace app\code\store\components;

use Yii;
use yii\base\Component;

class StoreManager extends Component
{
    protected $store = null;

    public function init()
    {
        $host = Yii::$app->request->getServerName();
    }
}