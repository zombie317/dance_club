<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dance_type}}`.
 */
class m220218_171335_create_dance_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dance_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'movements' => $this->string()->NotNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dance_type}}');
    }
}
