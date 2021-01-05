<?php
namespace app\code\store\models\store;

use yii\db\ActiveQuery;

class Search extends ActiveQuery
{
    /**
     * @param $host
     * @return $this
     */
    public function byHost($host)
    {
        return $this->andWhere(['host' => $host]);
    }

    /**
     * @return $this
     */
    public function isDefault()
    {
        return $this->andWhere(['is_default' => true]);
    }
}