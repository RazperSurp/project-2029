<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221114_062106_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(16)->notNull(),
            'password' => $this->text()->notNull(),
            'email' => $this->string(125)->unique()->notNull(),
            'phone' => $this->integer()->unique()->notNull(),
            'firstname' => $this->string(125)->notNull(),
            'secondname' => $this->string(125)->notNull(),
            'thirdname' => $this->string(125),
            'address' => $this->string(125)->notNull(),
            'deleted' => $this->boolean()->defaultValue(false)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
