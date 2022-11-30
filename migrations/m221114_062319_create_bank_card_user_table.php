<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bank_card_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m221114_062319_create_bank_card_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bank_card_user}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'number' => $this->string(16)->notNull(),
            'validity' => $this->string(5)->notNull(),
            'cvv' => $this->text()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false)
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-bank_card_user-user_id}}',
            '{{%bank_card_user}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-bank_card_user-user_id}}',
            '{{%bank_card_user}}',
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
            '{{%fk-bank_card_user-user_id}}',
            '{{%bank_card_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-bank_card_user-user_id}}',
            '{{%bank_card_user}}'
        );

        $this->dropTable('{{%bank_card_user}}');
    }
}
