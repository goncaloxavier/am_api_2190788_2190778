<?php

namespace app\controllers;

use Yii;
use app\models\Utilizador;
use app\models\UtilizadorSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UtilizadorController implements the CRUD actions for Utilizador model.
 */
class UtilizadorController extends ActiveController
{
  public $modelClass = "app\models\utilizador";
}
