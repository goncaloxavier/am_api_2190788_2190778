<?php

namespace app\controllers;

use app\models\Dispositivos;
use app\models\Utilizador;
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
class AvariasController extends ActiveController
{
    public $modelClass = 'app\models\Avarias';

    public function actionOrdered(){
        $modelAvaria = $this->modelClass;
        $rec = $modelAvaria::findBySql("SELECT * FROM avaria WHERE avaria.estado IN (3,2,1,0) ORDER BY FIELD(avaria.estado,0,1,2,3), data desc")->asArray()->all();

        return $rec;
    }

    public function actionFindbyuser($user){
        $user = Utilizador::find()->where(["nomeUtilizador" => $user])->one();
        $modelAvaria = $this->modelClass;
        $recAvaria = $modelAvaria::find()->where(["idUtilizador" => $user->idUtilizador])->asArray()->all();

        return $recAvaria;
    }

    public function actionFindbyref($referencia){
        $dispositivo = Dispositivos::find()->where(["referencia" => $referencia])->one();
        $modelAvaria = $this->modelClass;
        $recAvaria = $modelAvaria::find()->where(["avaria.idDispositivo" => $dispositivo->idDispositivo])->asArray()->all();

        return $recAvaria;
    }
}
