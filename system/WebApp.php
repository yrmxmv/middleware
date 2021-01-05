<?php
namespace app\system;

require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

use yii\web\Application;

/**
 * Application is the base class for all web application classes.
 *
 * @property AppView $view The view component. This property is read-only.
 */
class WebApp extends Application
{
    public function coreComponents()
    {
        $components = parent::coreComponents();
        $components['view']['class'] = AppView::class;

        return $components;
    }
}