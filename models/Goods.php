<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property int $type_id
 * @property int $supplier_id
 * @property int $warehouse_id
 * @property string $name
 * @property int $count
 * @property int $price
 * @property bool|null $deleted
 *
 * @property Suppliers $supplier
 * @property Trades[] $trades
 * @property GoodsType $type
 * @property Warehouse $warehouse
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'supplier_id', 'warehouse_id', 'name', 'count', 'price'], 'required'],
            [['type_id', 'supplier_id', 'warehouse_id', 'count', 'price'], 'default', 'value' => null],
            [['type_id', 'supplier_id', 'warehouse_id', 'count', 'price'], 'integer'],
            [['deleted'], 'boolean'],
            [['name'], 'string', 'max' => 125],
            [['name'], 'unique'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'type_id' => 'Тип',
            'supplier_id' => 'Поставщик',
            'warehouse_id' => 'Склад',
            'name' => 'Имя',
            'count' => 'Количество',
            'price' => 'Цена',
            'deleted' => 'Удалено',
        ];
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::className(), ['id' => 'supplier_id']);
    }

    /**
     * Gets query for [[Trades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrades()
    {
        return $this->hasMany(Trades::className(), ['good_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(GoodsType::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Warehouse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }

    /**
     * Удаляет строку с товаром из таблицы.
     * 
     * Алгоритм заключается в поиске записи в таблице по id, полученная строка 
     * записывается в переменную `$model`. По связи `$model->trades` проиходит 
     * получение всех смежных записей и их последующее удаление. После этого,
     * удаляется искомая запись
     * 
     */
    public function deleteRow()
    {
        foreach($this->trades as $trade) {
            $trade->deleted = true;
            $trade->save(false);
        }

        $this->deleted = true;
        $this->save(false);
    }
}
