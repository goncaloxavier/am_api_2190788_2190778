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
 * @property int $idUtilizador
 * @property int $idDispositivo
 * @property int|null $idRelatorio
 *
 * @property Dispositivos $idDispositivo0
 * @property Relatorios[] $relatorios
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
            [['descricao', 'tipo', 'gravidade', 'data', 'idDispositivo', 'idUtilizador'], 'required'],
            [['tipo', 'estado', 'gravidade', 'idDispositivo', 'idRelatorio', 'idUtilizador'], 'integer'],
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
            'idRelatorio' => 'Id Relatorios',
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
        return $this->hasMany(Relatorios::className(), ['idAvaria' => 'idAvaria']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do regsito em causa
        $idAvaria = $this->idAvaria;
        $descricao = $this->descricao;
        $tipo = $this->tipo;
        $estado = $this->estado;
        $gravidade = $this->gravidade;
        $data = $this->data;
        $idDispositivo = $this->idDispositivo;
        $idUtilizador = $this->idUtilizador;

        $myObj = new \stdClass();
        $myObj->idAvaria = $idAvaria;
        $myObj->descricao = $descricao;
        $myObj->tipo = $tipo;
        $myObj->estado = $estado;
        $myObj->gravidade = $gravidade;
        $myObj->data = $data;
        $myObj->idDispositivo = $idDispositivo;
        $myObj->idUtilizador = $idUtilizador;
        $myJSON = json_encode($myObj);

        if($insert)
            $this->FazPublish("INSERT", $myJSON);
        else
            $this->FazPublish("UPDATE", $myJSON);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
    }
}
