<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Avarias */

$this->title = 'Create Avarias';
$this->params['breadcrumbs'][] = ['label' => 'Avarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avarias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
