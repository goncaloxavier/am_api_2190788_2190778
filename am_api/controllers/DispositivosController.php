<?php

namespace app\controllers;

use Yii;
use app\models\Dispositivos;
use app\models\DispositivosSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DispositivosController implements the CRUD actions for Dispositivos model.
 */
class DispositivosController extends ActiveController
{
    public $modelClass = "app\models\dispositivos";
}
