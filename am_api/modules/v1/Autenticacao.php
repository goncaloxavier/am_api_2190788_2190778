<?php

namespace app\modules\v1;

/**
 * v1 module definition class
 */
class Autenticacao extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
        // custom initialization code goes here
    }
}
