<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%people}}`.
 */
class m220218_171643_create_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%people}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'gender' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%people}}');
    }
}
