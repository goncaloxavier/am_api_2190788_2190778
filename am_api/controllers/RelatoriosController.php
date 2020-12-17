<?php

namespace app\controllers;

use Yii;
use app\models\Relatorios;
use app\models\RelatoriosSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelatoriosController implements the CRUD actions for Relatorios model.
 */
class RelatoriosController extends ActiveController
{
    public $modelClass = 'app\models\relatorios';
}
