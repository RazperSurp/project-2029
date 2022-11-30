<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%trades}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m221114_062613_add_user_id_column_to_trades_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%trades}}', 'user_id', $this->integer()->notNull());

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-trades-user_id}}',
            '{{%trades}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-trades-user_id}}',
            '{{%trades}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-trades-user_id}}',
            '{{%trades}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-trades-user_id}}',
            '{{%trades}}'
        );

        $this->dropColumn('{{%trades}}', 'user_id');
    }
}
