<?php

use app\models\Supplier;
use kartik\export\ExportMenu;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Supplier', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $gridColumns = [
        'id',
        'name',
        'code',
        't_status' => [
            'attribute' => 't_status',
            'value'=>function ($model,$key,$index,$column){
                return $model->t_status == 1 ? 'hold' : 'ok';
            },
            //在搜索条件（过滤条件）中使用下拉框来搜索
            'filter' => ['ok', 'hold'],
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Supplier $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],

    ]; ?>
    <?= ExportMenu::widget([
        'dataProvider'          => $dataProvider,
        'exportConfig'          => [
            ExportMenu::FORMAT_TEXT  => false,
            ExportMenu::FORMAT_HTML  => false,
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_EXCEL_X   => false,
            ExportMenu::FORMAT_PDF   => false,
        ],
        'showConfirmAlert' => false,
        'filename' => 'Suppliers',
        'columnSelectorOptions' => [
            'label' => '选择字段',
        ],
        'dropdownOptions'       => [
            'label' => '导出',
            'class' => 'btn btn-outline-secondary btn-default'
        ],
    ])?>
    <?= GridView::widget([
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<script type="text/javascript">
    var keys = $('#grid').yiiGridView('getSelectedRows');
</script>
