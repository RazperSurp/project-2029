<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%goods_type}}`
 * - `{{%suppliers}}`
 * - `{{%warehouse}}`
 */
class m221111_145124_create_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->notNull(),
            'supplier_id' => $this->integer()->notNull(),
            'warehouse_id' => $this->integer()->notNull(),
            'name' => $this->string(125)->unique()->notNull(),
            'count' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false)
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            '{{%idx-goods-type_id}}',
            '{{%goods}}',
            'type_id'
        );

        // add foreign key for table `{{%goods_type}}`
        $this->addForeignKey(
            '{{%fk-goods-type_id}}',
            '{{%goods}}',
            'type_id',
            '{{%goods_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `supplier_id`
        $this->createIndex(
            '{{%idx-goods-supplier_id}}',
            '{{%goods}}',
            'supplier_id'
        );

        // add foreign key for table `{{%suppliers}}`
        $this->addForeignKey(
            '{{%fk-goods-supplier_id}}',
            '{{%goods}}',
            'supplier_id',
            '{{%suppliers}}',
            'id',
            'CASCADE'
        );

        // creates index for column `warehouse_id`
        $this->createIndex(
            '{{%idx-goods-warehouse_id}}',
            '{{%goods}}',
            'warehouse_id'
        );

        // add foreign key for table `{{%warehouse}}`
        $this->addForeignKey(
            '{{%fk-goods-warehouse_id}}',
            '{{%goods}}',
            'warehouse_id',
            '{{%warehouse}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%goods_type}}`
        $this->dropForeignKey(
            '{{%fk-goods-type_id}}',
            '{{%goods}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            '{{%idx-goods-type_id}}',
            '{{%goods}}'
        );

        // drops foreign key for table `{{%suppliers}}`
        $this->dropForeignKey(
            '{{%fk-goods-supplier_id}}',
            '{{%goods}}'
        );

        // drops index for column `supplier_id`
        $this->dropIndex(
            '{{%idx-goods-supplier_id}}',
            '{{%goods}}'
        );

        // drops foreign key for table `{{%warehouse}}`
        $this->dropForeignKey(
            '{{%fk-goods-warehouse_id}}',
            '{{%goods}}'
        );

        // drops index for column `warehouse_id`
        $this->dropIndex(
            '{{%idx-goods-warehouse_id}}',
            '{{%goods}}'
        );

        $this->dropTable('{{%goods}}');
    }
}
