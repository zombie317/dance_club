<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property int $id
 * @property int $people_id
 *
 * @property People $people
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people_id'], 'required'],
            [['people_id'], 'default', 'value' => null],
            [['people_id'], 'integer'],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::className(), 'targetAttribute' => ['people_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people_id' => 'People ID',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'people_id']);
    }
}
