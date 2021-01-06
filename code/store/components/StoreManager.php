<?php
namespace app\code\store\components;

use app\code\store\models\store\Site;
use Yii;
use yii\base\Component;

class StoreManager extends Component
{
    protected $store = null;

    public function init()
    {
        $host = Yii::$app->request->getHostInfo();
        if (null !== ($model = Site::findByHost($host))) {
            $this->store = $model;
        }
    }

    public function getSite()
    {
        if ($this->store === null) {
            return $this->getDefaultSite();
        }

        return $this->store;
    }

    protected function getDefaultSite()
    {
        return Site::findDefault();
    }
}