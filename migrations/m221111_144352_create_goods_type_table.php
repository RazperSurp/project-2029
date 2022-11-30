<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_type}}`.
 */
class m221111_144352_create_goods_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(125)->unique()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_type}}');
    }
}
