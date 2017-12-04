<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Trip */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'post_username',
            'post_facebook_uid',
            'addr_from',
            'addr_to',
            'slot',
            'price',
            'body:ntext',
            'view',
            'category_id',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'status',
            'type',
            'created_by',
            'updated_by',
            'published_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>