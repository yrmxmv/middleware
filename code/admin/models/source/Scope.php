<?php
namespace app\code\admin\models\source;

class Scope
{
    const DEFAULT_SCOPE = 'default';

    const WEBSITE_SCOPE = 'websites';

    const STORE_SCOPE = 'stores';

    const SOURCE_PRIORITY = [
        self::DEFAULT_SCOPE => 1,
        self::WEBSITE_SCOPE => 2,
        self::STORE_SCOPE => 3
    ];
}