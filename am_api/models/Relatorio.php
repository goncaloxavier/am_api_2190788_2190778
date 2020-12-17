<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Relatorio".
 *
 * @property int $idRelatorio
 * @property int $idAvaria
 * @property int $idDispositivo
 * @property string|null $descricao
 */
class Relatorio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Relatorio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAvaria', 'idDispositivo'], 'required'],
            [['idAvaria', 'idDispositivo'], 'integer'],
            [['descricao'], 'string', 'max' => 200],
            [['idAvaria'], 'exist', 'skipOnError' => true, 'targetClass' => Avarias::className(), 'targetAttribute' => ['idAvaria' => 'idAvaria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRelatorio' => 'Id Relatorio',
            'idAvaria' => 'Id Avarias',
            'idDispositivo' => 'Id Dispositivos',
            'descricao' => 'Descricao',
        ];
    }
}
