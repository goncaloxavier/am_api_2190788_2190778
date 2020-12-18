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

    public function actionByestado($estado){
        $modelDispositivo = $this->modelClass;
        $recEstado = $modelDispositivo::find()->where(["estado" => $estado])->asArray()->all();

        return $recEstado;
    }

    public function actionByref($referencia){
        $modelDispositivo = $this->modelClass;
        $rec = $modelDispositivo::find()->where(["referencia" => $referencia])->asArray()->all();

        return $rec;
    }

    public function actionByavaria($referencia){
        $modelDispositivo = $this->modelClass;
        $rec = $modelDispositivo::find()->where(["referencia" => $referencia])->one();
        $modelAvaria = Avarias::findBySql("SELECT * FROM avaria WHERE idDispositivo = ".$rec->idDispositivo." and estado != 3")->asArray()->all();

        return $modelAvaria;
    }
}
