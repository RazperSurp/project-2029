<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trades}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%goods}}`
 */
class m221111_145354_create_trades_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trades}}', [
            'id' => $this->primaryKey(),
            'good_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false)
        ]);

        // creates index for column `good_id`
        $this->createIndex(
            '{{%idx-trades-good_id}}',
            '{{%trades}}',
            'good_id'
        );

        // add foreign key for table `{{%goods}}`
        $this->addForeignKey(
            '{{%fk-trades-good_id}}',
            '{{%trades}}',
            'good_id',
            '{{%goods}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%goods}}`
        $this->dropForeignKey(
            '{{%fk-trades-good_id}}',
            '{{%trades}}'
        );

        // drops index for column `good_id`
        $this->dropIndex(
            '{{%idx-trades-good_id}}',
            '{{%trades}}'
        );

        $this->dropTable('{{%trades}}');
    }
}
