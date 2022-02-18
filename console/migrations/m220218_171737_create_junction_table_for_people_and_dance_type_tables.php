<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%people_dance_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%people}}`
 * - `{{%dance_type}}`
 */
class m220218_171737_create_junction_table_for_people_and_dance_type_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%people_dance_type}}', [
            'people_id' => $this->integer(),
            'dance_type_id' => $this->integer(),
            'PRIMARY KEY(people_id, dance_type_id)',
        ]);

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-people_dance_type-people_id}}',
            '{{%people_dance_type}}',
            'people_id'
        );

        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-people_dance_type-people_id}}',
            '{{%people_dance_type}}',
            'people_id',
            '{{%people}}',
            'id',
            'CASCADE'
        );

        // creates index for column `dance_type_id`
        $this->createIndex(
            '{{%idx-people_dance_type-dance_type_id}}',
            '{{%people_dance_type}}',
            'dance_type_id'
        );

        // add foreign key for table `{{%dance_type}}`
        $this->addForeignKey(
            '{{%fk-people_dance_type-dance_type_id}}',
            '{{%people_dance_type}}',
            'dance_type_id',
            '{{%dance_type}}',
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
            '{{%fk-people_dance_type-people_id}}',
            '{{%people_dance_type}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-people_dance_type-people_id}}',
            '{{%people_dance_type}}'
        );

        // drops foreign key for table `{{%dance_type}}`
        $this->dropForeignKey(
            '{{%fk-people_dance_type-dance_type_id}}',
            '{{%people_dance_type}}'
        );

        // drops index for column `dance_type_id`
        $this->dropIndex(
            '{{%idx-people_dance_type-dance_type_id}}',
            '{{%people_dance_type}}'
        );

        $this->dropTable('{{%people_dance_type}}');
    }
}
