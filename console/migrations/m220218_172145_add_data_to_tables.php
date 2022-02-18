<?php

use yii\db\Migration;

/**
 * Class m220218_172145_add_data_to_tables
 */
class m220218_172145_add_data_to_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('music_type', ['name'], [
            ['R&b'],
            ['Electrohouse'],
            ['Поп-музыка'],
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('dance_type', ['name', 'movements'], [
            ['хип-хоп', 'покачивание телом вперед назад, ноги в полуприседе, руки согнуты в локтях, головой вперед-назад'],
            ['рнб', 'покачивание телом вперед назад'],
            ['Electrodance', 'покачивание туловищем вперед-назад, почти нет движения головой, круговые движения-вращения руками, ноги двигаются в ритме'],
            ['house', 'круговые движения-вращения руками, ноги двигаются в ритме'],
            ['поп', 'плавные движения туловищем, руками, ногами и головой'],
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('people', ['name', 'gender'], [
            ['маша', 0],
            ['паша', 1],
            ['даша', 0],
            ['иван', 1],
            ['степа', 1],
            ['аня', 0],
            ['коля', 1],
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('music_type_dance_type', ['music_type_id', 'dance_type_id'], [
            [1, 1],
            [1, 2],
            [2, 3],
            [2, 4],
            [3, 5],
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('people_dance_type', ['people_id', 'dance_type_id'], [
            [1, 1],
            [1, 2],
            [2, 3],
            [3, 5],
            [4, 1],
            [4, 2],
            [4, 3],
            [4, 4],
            [4, 5],
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('club', ['people_id'], [
            [1],
            [2],
            [3],
            [4],
            [6],
            [7],
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('current_music', ['music_type_id'], [
            [1],
        ])->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220218_172145_add_data_to_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220218_172145_add_data_to_tables cannot be reverted.\n";

        return false;
    }
    */
}
