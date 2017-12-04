<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TripCategory]].
 *
 * @see TripCategory
 */
class TripCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TripCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TripCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
