<?php

namespace app\models\search;

use Yii;
use app\models\Goods;
use yii\data\ActiveDataProvider;

class GoodsSearch extends Goods
{
    static public function search()
    {
        $query = parent::find()
            ->joinWith([
                'type',
                'supplier',
                'warehouse',
            ])->where(['goods.deleted' => false])
            ->orderBy(['goods.id' => SORT_ASC]);
            
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $dataProvider;
    }
}
