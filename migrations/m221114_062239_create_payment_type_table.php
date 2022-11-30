<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_type}}`.
 */
class m221114_062239_create_payment_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(125)->unique()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_type}}');
    }
}
