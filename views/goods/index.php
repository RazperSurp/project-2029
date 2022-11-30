<?php

use Codeception\Step\Retry;
use yii\grid\{GridView, SerialColumn};
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

$this->title = 'Товары магазина';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::getAlias('@web') ."\js\goods\main.js", ['depends' => [\yii\web\JqueryAsset::class]]);
?>

<div class="goods-about">
    <h1 style='display: flex; justify-content: space-between;'>
        <?= Html::encode($this->title) ?>
        <?php echo Html::a(FA::icon('plus') . " Добавить товар",["add"],['class' => 'btn btn-success']) ?>
    </h1>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],
            'id',
            [
                'attribute' => 'type',
                'format' => 'text',
                'label' => 'Тип',
                'value' => function($row) {
                    return $row->type->name;
                }
            ],
            'name',
            [
                'attribute' => 'count',
                'format' => 'text',
                'label' => 'Количество',
            ],
            'price',
            [
                'attribute' => 'warehouse',
                'format' => 'text',
                'label' => 'Склад',
                'value' => function($row) {
                    return $row->warehouse->name . ' №' . $row->warehouse->id . ', ' . $row->warehouse->address;
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
            // [
            //     'format' => 'raw',
            //     'label' => 'Действия',
            //     'value' => function($row) {
            //         $element = '<div class="btn-group" role="group">'; 
            //         $element .= Html::button(FA::icon('gear'), [
            //             'class' => 'btn btn-sm btn-outline-info btn-light',
            //             'style' => 'font-size: inherit'
            //         ]);
            //         $element .= Html::button(FA::icon('trash'), [
            //             'class' => 'btn btn-sm btn-outline-danger btn-light btn-delete-goods',
            //             'style' => 'font-size: inherit'
            //         ]);
            //         $element .= '</div>';

            //         return $element;
            //     }
            // ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
            ]
        ]
    ]);
    ?> 
</div>