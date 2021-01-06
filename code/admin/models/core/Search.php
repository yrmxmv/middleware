<?php
namespace app\code\admin\models\core;

use yii\db\ActiveQuery;

class Search extends ActiveQuery
{
    public function scopeValue($scope, $scopeId, $path)
    {
        return $this->andWhere(['scope' => $scope])
            ->andWhere(['scope_id' => $scopeId])
            ->andWhere(['path' => $path])
            ->one();
    }
}