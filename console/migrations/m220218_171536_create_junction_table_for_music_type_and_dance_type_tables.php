<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%music_type_dance_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%music_type}}`
 * - `{{%dance_type}}`
 */
class m220218_171536_create_junction_table_for_music_type_and_dance_type_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%music_type_dance_type}}', [
            'music_type_id' => $this->integer(),
            'dance_type_id' => $this->integer(),
            'PRIMARY KEY(music_type_id, dance_type_id)',
        ]);

        // creates index for column `music_type_id`
        $this->createIndex(
            '{{%idx-music_type_dance_type-music_type_id}}',
            '{{%music_type_dance_type}}',
            'music_type_id'
        );

        // add foreign key for table `{{%music_type}}`
        $this->addForeignKey(
            '{{%fk-music_type_dance_type-music_type_id}}',
            '{{%music_type_dance_type}}',
            'music_type_id',
            '{{%music_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `dance_type_id`
        $this->createIndex(
            '{{%idx-music_type_dance_type-dance_type_id}}',
            '{{%music_type_dance_type}}',
            'dance_type_id'
        );

        // add foreign key for table `{{%dance_type}}`
        $this->addForeignKey(
            '{{%fk-music_type_dance_type-dance_type_id}}',
            '{{%music_type_dance_type}}',
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
        // drops foreign key for table `{{%music_type}}`
        $this->dropForeignKey(
            '{{%fk-music_type_dance_type-music_type_id}}',
            '{{%music_type_dance_type}}'
        );

        // drops index for column `music_type_id`
        $this->dropIndex(
            '{{%idx-music_type_dance_type-music_type_id}}',
            '{{%music_type_dance_type}}'
        );

        // drops foreign key for table `{{%dance_type}}`
        $this->dropForeignKey(
            '{{%fk-music_type_dance_type-dance_type_id}}',
            '{{%music_type_dance_type}}'
        );

        // drops index for column `dance_type_id`
        $this->dropIndex(
            '{{%idx-music_type_dance_type-dance_type_id}}',
            '{{%music_type_dance_type}}'
        );

        $this->dropTable('{{%music_type_dance_type}}');
    }
}
