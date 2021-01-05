<?php
namespace app\system;

use yii\helpers\Html;
use yii\web\View;

class AppView extends View
{
    public $bodyClassName;

    public function beginBodyTag($options = [])
    {
        if (isset($this->bodyClassName)) {
            Html::addCssClass($options, $this->bodyClassName);
        }

        return Html::beginTag('body', $options);
    }

    public function endBodyTag()
    {
        return Html::endTag('body');
    }
}