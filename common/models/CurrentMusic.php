<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "current_music".
 *
 * @property int $id
 * @property int $music_type_id
 *
 * @property MusicType $musicType
 */
class CurrentMusic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'current_music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_type_id'], 'required'],
            [['music_type_id'], 'default', 'value' => null],
            [['music_type_id'], 'integer'],
            [['music_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MusicType::className(), 'targetAttribute' => ['music_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'music_type_id' => 'Music Type ID',
        ];
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

    /**
     * @return array
     */
    public function getDanceTypes(): array
    {
        return MusicTypeDanceType::find()->select('dance_type_id')->where(['music_type_id' => $this->musicType->id])->column();
    }
}
