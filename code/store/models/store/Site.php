<?php
namespace app\code\store\models\store;

class Site
{
    public static function findByHost($host)
    {
        return $host;
    }

    public static function findDefault()
    {
        return '$host';
    }
}