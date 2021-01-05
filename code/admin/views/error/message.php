<?php
use app\system\AppView;
use yii\helpers\Html;

/**
 * @var $this AppView
 * @var $message string
 * @var $name string
 */

$this->title = $name;

echo Html::encode($this->title);

nl2br(Html::encode($message));
