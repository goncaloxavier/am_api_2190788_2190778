<?php

namespace app\controllers;

use Yii;
use app\models\Avarias;
use app\models\AvariasSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AvariasController implements the CRUD actions for Avarias model.
 */
class DispositivosController extends ActiveController
{
    public $modelClass = 'app\models\Dispositivos';

    public function actionTotal(){

    }
}