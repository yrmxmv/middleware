<?php
namespace app\code\admin;

use app\system\AppModule;

class AdminModule extends AppModule
{
    public $layout = 'admin';

    public $defaultRoute = 'dashboard';
}