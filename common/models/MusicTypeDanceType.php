<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "music_type_dance_type".
 *
 * @property int $music_type_id
 * @property int $dance_type_id
 *
 * @property DanceType $danceType
 * @property MusicType $musicType
 */
class MusicTypeDanceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music_type_dance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_type_id', 'dance_type_id'], 'required'],
            [['music_type_id', 'dance_type_id'], 'default', 'value' => null],
            [['music_type_id', 'dance_type_id'], 'integer'],
            [['music_type_id', 'dance_type_id'], 'unique', 'targetAttribute' => ['music_type_id', 'dance_type_id']],
            [['dance_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DanceType::className(), 'targetAttribute' => ['dance_type_id' => 'id']],
            [['music_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MusicType::className(), 'targetAttribute' => ['music_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'music_type_id' => 'Music Type ID',
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
     * Gets query for [[MusicType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicType()
    {
        return $this->hasOne(MusicType::className(), ['id' => 'music_type_id']);
    }
}
