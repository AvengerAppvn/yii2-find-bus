<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trip */

$this->title = 'Update Trip: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trip-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
