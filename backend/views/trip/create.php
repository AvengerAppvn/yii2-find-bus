<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Trip */

$this->title = 'Create Trip';
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
