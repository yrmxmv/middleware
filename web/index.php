<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../system/WebApp.php';

$config = require __DIR__ . '/../etc/web.php';

(new \app\system\WebApp($config))->run();