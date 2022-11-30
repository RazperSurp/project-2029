<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%warehouse}}`.
 */
class m221111_144607_create_warehouse_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%warehouse}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(125)->unique()->notNull(),
            'address' => $this->string(125)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%warehouse}}');
    }
}
