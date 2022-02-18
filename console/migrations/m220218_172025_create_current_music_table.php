<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%current_music}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%music_type}}`
 */
class m220218_172025_create_current_music_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%current_music}}', [
            'id' => $this->primaryKey(),
            'music_type_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `music_type_id`
        $this->createIndex(
            '{{%idx-current_music-music_type_id}}',
            '{{%current_music}}',
            'music_type_id'
        );

        // add foreign key for table `{{%music_type}}`
        $this->addForeignKey(
            '{{%fk-current_music-music_type_id}}',
            '{{%current_music}}',
            'music_type_id',
            '{{%music_type}}',
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
            '{{%fk-current_music-music_type_id}}',
            '{{%current_music}}'
        );

        // drops index for column `music_type_id`
        $this->dropIndex(
            '{{%idx-current_music-music_type_id}}',
            '{{%current_music}}'
        );

        $this->dropTable('{{%current_music}}');
    }
}
