<?php

namespace app\controllers;

use Yii;
use app\models\RelatoriosPecas;
use app\models\RelatoriosPecasSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelatoriosPecasController implements the CRUD actions for RelatoriosPecas model.
 */
class RelatoriosPecasController extends ActiveController
{
    public $modelClass = 'app\models\relatoriospecas';
}
