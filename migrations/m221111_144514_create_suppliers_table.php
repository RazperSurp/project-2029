<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%suppliers}}`.
 */
class m221111_144514_create_suppliers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%suppliers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(125)->unique()->notNull(),
            'phone' => $this->integer()->unique()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%suppliers}}');
    }
}
