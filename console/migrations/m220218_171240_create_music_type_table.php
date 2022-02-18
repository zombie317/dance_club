<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%music_type}}`.
 */
class m220218_171240_create_music_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%music_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%music_type}}');
    }
}
