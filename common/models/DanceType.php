<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dance_type".
 *
 * @property int $id
 * @property string $name
 * @property string $movements
 *
 * @property MusicTypeDanceType[] $musicTypeDanceTypes
 * @property MusicType[] $musicTypes
 * @property PeopleDanceType[] $peopleDanceTypes
 * @property People[] $peoples
 */
class DanceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'movements'], 'required'],
            [['name', 'movements'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'movements' => 'Movements',
        ];
    }

    /**
     * Gets query for [[MusicTypeDanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicTypeDanceTypes()
    {
        return $this->hasMany(MusicTypeDanceType::className(), ['dance_type_id' => 'id']);
    }

    /**
     * Gets query for [[MusicTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicTypes()
    {
        return $this->hasMany(MusicType::className(), ['id' => 'music_type_id'])->viaTable('music_type_dance_type', ['dance_type_id' => 'id']);
    }

    /**
     * Gets query for [[PeopleDanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeopleDanceTypes()
    {
        return $this->hasMany(PeopleDanceType::className(), ['dance_type_id' => 'id']);
    }

    /**
     * Gets query for [[Peoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::className(), ['id' => 'people_id'])->viaTable('people_dance_type', ['dance_type_id' => 'id']);
    }
}
