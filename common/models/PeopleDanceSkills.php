<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "people_dance_type".
 *
 * @property int $people_id
 * @property int $dance_type_id
 *
 * @property DanceType $danceType
 * @property People $people
 */
class PeopleDanceSkills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people_dance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people_id', 'dance_type_id'], 'required'],
            [['people_id', 'dance_type_id'], 'default', 'value' => null],
            [['people_id', 'dance_type_id'], 'integer'],
            [['people_id', 'dance_type_id'], 'unique', 'targetAttribute' => ['people_id', 'dance_type_id']],
            [['dance_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DanceType::className(), 'targetAttribute' => ['dance_type_id' => 'id']],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::className(), 'targetAttribute' => ['people_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'people_id' => 'People ID',
            'dance_type_id' => 'Dance Type ID',
        ];
    }

    /**
     * Gets query for [[DanceType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanceType()
    {
        return $this->hasOne(DanceType::className(), ['id' => 'dance_type_id']);
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
