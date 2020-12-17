<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Dispositivo".
 *
 * @property int $idDispositivo
 * @property int $estado
 * @property string $dataCompra
 * @property string $tipo
 * @property string $referencia
 */
class Dispositivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Dispositivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'integer'],
            [['dataCompra', 'tipo', 'referencia'], 'required'],
            [['dataCompra'], 'safe'],
            [['tipo'], 'string', 'max' => 30],
            [['referencia'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDispositivo' => 'Id Dispositivo',
            'estado' => 'Estado',
            'dataCompra' => 'Data Compra',
            'tipo' => 'Tipo',
            'referencia' => 'Referencia',
        ];
    }
}
