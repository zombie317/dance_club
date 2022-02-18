<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "music_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property CurrentMusic[] $currentMusics
 * @property DanceType[] $danceTypes
 * @property MusicTypeDanceType[] $musicTypeDanceTypes
 */
class MusicType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[CurrentMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentMusics()
    {
        return $this->hasMany(CurrentMusic::className(), ['music_type_id' => 'id']);
    }

    /**
     * Gets query for [[DanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanceTypes()
    {
        return $this->hasMany(DanceType::className(), ['id' => 'dance_type_id'])->viaTable('music_type_dance_type', ['music_type_id' => 'id']);
    }

    /**
     * Gets query for [[MusicTypeDanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicTypeDanceTypes()
    {
        return $this->hasMany(MusicTypeDanceType::className(), ['music_type_id' => 'id']);
    }
}
