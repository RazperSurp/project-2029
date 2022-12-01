<?php
use yii\widgets\DetailView;
?>

<h2>Карточка товара</h2>

<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'type',
            'format' => 'text',
            'label' => 'Тип',
            'value' => function($row) {
                return $row->type->name;
            }
        ],
        [
            'attribute' => 'supplier',
            'format' => 'text',
            'label' => 'Поставщик',
            'value' => function($row) {
                return $row->supplier->name;
            }
        ],
        [
            'attribute' => 'warehouse',
            'format' => 'text',
            'label' => 'Склад',
            'value' => function($row) {
                return $row->warehouse->name . ' №' . $row->warehouse->id . ', ' . $row->warehouse->address;
            }
        ],
        'name',
        'count',
        'price'
    ],
]);
?>