<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string $name
 * @property bool|null $gender
 *
 * @property Club[] $clubs
 * @property DanceType[] $danceTypes
 * @property PeopleDanceSkills[] $peopleDanceSkills
 * @property PeopleDanceSkills[] $peopleFirstDanceSkills
 */
class People extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['gender'], 'boolean'],
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
            'gender' => 'Gender',
            'genderName' => 'Gender',
        ];
    }

    /**
     * Gets query for [[Clubs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClubs()
    {
        return $this->hasMany(Club::className(), ['people_id' => 'id']);
    }

    /**
     * Gets query for [[DanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanceTypes()
    {
        return $this->hasMany(DanceType::className(), ['id' => 'dance_type_id'])->viaTable('people_dance_type', ['people_id' => 'id']);
    }

    /**
     * Gets query for [[PeopleDanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeopleDanceSkills()
    {
        return $this->hasMany(PeopleDanceSkills::className(), ['people_id' => 'id']);
    }

    /**
     * Gets query for [[PeopleDanceTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeopleFirstDanceSkills()
    {
        return $this->hasOne(PeopleDanceSkills::className(), ['people_id' => 'id']);
    }
}
