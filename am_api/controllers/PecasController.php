<?php

namespace app\controllers;

use Yii;
use app\models\Pecas;
use app\models\PecasSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PecasController implements the CRUD actions for Pecas model.
 */
class PecasController extends ActiveController
{
    public $modelClass = "app\models\pecas";
}
