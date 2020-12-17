<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relatorios */

$this->title = 'Create Relatorios';
$this->params['breadcrumbs'][] = ['label' => 'Relatorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relatorios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
