<?php
use yii\grid\{GridView, SerialColumn};
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => SerialColumn::class],
        [
            'attribute' => 'id',
            'format' => 'text',
            'label' => 'Код',
        ],
        [
            'attribute' => 'type',
            'format' => 'text',
            'label' => 'Тип',
            'value' => function($row) {
                return $row->type->name;
            }
        ],
        [
            'attribute' => 'name',
            'format' => 'text',
            'label' => 'Имя',
        ],
        [
            'attribute' => 'count',
            'format' => 'text',
            'label' => 'На складе (шт.)',
        ],
        [
            'attribute' => 'price',
            'format' => 'text',
            'label' => 'Цена (руб./шт.)',
        ],
        [
            'attribute' => 'warehouse',
            'format' => 'text',
            'label' => 'Склад',
            'value' => function($row) {
                return $row->warehouse->name;
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
            'format' => 'raw',
            'label' => 'Действия',
            'value' => function($row) {
                return Html::button(FA::icon('trash'), [
                    'class' => 'btn btn-sm btn-danger',
                    'style' => 'font-size: inherit'
                ]);
            }
        ],
    ]
]);

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
