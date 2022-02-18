<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%people}}`
 */
class m220218_171918_create_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'id' => $this->primaryKey(),
            'people_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-club-people_id}}',
            '{{%club}}',
            'people_id'
        );

        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-club-people_id}}',
            '{{%club}}',
            'people_id',
            '{{%people}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%people}}`
        $this->dropForeignKey(
            '{{%fk-club-people_id}}',
            '{{%club}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-club-people_id}}',
            '{{%club}}'
        );

        $this->dropTable('{{%club}}');
    }
}
