<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="x-model">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
//            'content',
            'amount',
            'term',
//            'keywords',
            //'description',
            'status',
            'link',
            //'analytics',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
