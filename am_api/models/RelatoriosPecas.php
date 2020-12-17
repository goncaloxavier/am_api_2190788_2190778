<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "RelatoriosPecas".
 *
 * @property int $idRelatorio
 * @property int $idPeca
 */
class RelatoriosPecas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'RelatoriosPecas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRelatorio', 'idPeca'], 'required'],
            [['idRelatorio', 'idPeca'], 'integer'],
            [['idRelatorio', 'idPeca'], 'unique', 'targetAttribute' => ['idRelatorio', 'idPeca']],
            [['idRelatorio'], 'exist', 'skipOnError' => true, 'targetClass' => Relatorio::className(), 'targetAttribute' => ['idRelatorio' => 'idRelatorio']],
            [['idPeca'], 'exist', 'skipOnError' => true, 'targetClass' => Pecas::className(), 'targetAttribute' => ['idPeca' => 'idPeca']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRelatorio' => 'Id Relatorio',
            'idPeca' => 'Id Pecas',
        ];
    }
}