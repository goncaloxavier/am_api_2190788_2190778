<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avaria".
 *
 * @property int $idAvaria
 * @property string $descricao
 * @property int $tipo
 * @property int $estado
 * @property int $gravidade
 * @property string $data
 * @property int $idDispositivo
 * @property int|null $idRelatorio
 *
 * @property Dispositivos $idDispositivo0
 * @property Relatorio[] $relatorios
 */
class Avarias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avaria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'tipo', 'gravidade', 'data', 'idDispositivo'], 'required'],
            [['tipo', 'estado', 'gravidade', 'idDispositivo', 'idRelatorio'], 'integer'],
            [['data'], 'safe'],
            [['descricao'], 'string', 'max' => 200],
            [['idDispositivo'], 'exist', 'skipOnError' => true, 'targetClass' => Dispositivos::className(), 'targetAttribute' => ['idDispositivo' => 'idDispositivo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAvaria' => 'Id Avarias',
            'descricao' => 'Descricao',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
            'gravidade' => 'Gravidade',
            'data' => 'Data',
            'idDispositivo' => 'Id Dispositivos',
            'idRelatorio' => 'Id Relatorio',
        ];
    }

    /**
     * Gets query for [[IdDispositivo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDispositivo0()
    {
        return $this->hasOne(Dispositivos::className(), ['idDispositivo' => 'idDispositivo']);
    }

    /**
     * Gets query for [[Relatorios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelatorios()
    {
        return $this->hasMany(Relatorio::className(), ['idAvaria' => 'idAvaria']);
    }
}