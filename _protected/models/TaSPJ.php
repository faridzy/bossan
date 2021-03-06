<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ta_spj".
 *
 * @property string $tahun
 * @property string $no_spj
 * @property integer $sekolah_id
 * @property string $tgl_spj
 * @property integer $no_bku
 * @property string $keterangan
 * @property integer $kd_sah
 * @property string $no_pengesahan
 * @property string $disahkan_oleh
 * @property string $nip_pengesahan
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property string $nm_bendahara
 * @property string $nip_bendahara
 * @property string $jbt_bendahara
 * @property string $jbt_pengesahan
 * @property string $tgl_pengesahan
 * @property integer $kd_verifikasi
 */
class TaSPJ extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ta_spj';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun', 'no_spj', 'sekolah_id', 'tgl_spj'], 'required'],
            [['tahun', 'tgl_spj', 'tgl_pengesahan'], 'safe'],
            [['sekolah_id', 'no_bku', 'kd_sah', 'created_at', 'updated_at', 'user_id', 'kd_verifikasi'], 'integer'],
            [['no_spj', 'no_pengesahan', 'nip_pengesahan', 'nm_bendahara'], 'string', 'max' => 50],
            [['keterangan', 'jbt_bendahara', 'jbt_pengesahan'], 'string', 'max' => 255],
            [['disahkan_oleh'], 'string', 'max' => 100],
            [['nip_bendahara'], 'string', 'max' => 18],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    } 
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tahun' => 'Tahun',
            'no_spj' => 'No SPJ',
            'sekolah_id' => 'Sekolah ID',
            'tgl_spj' => 'Tgl Spj',
            'no_bku' => 'No BKU',
            'keterangan' => 'Keterangan',
            'kd_sah' => 'Kd Sah',
            'no_pengesahan' => 'No Pengesahan',
            'disahkan_oleh' => 'Disahkan Oleh',
            'nip_pengesahan' => 'NIP Pengesahan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'nm_bendahara' => 'Nama Bendahara',
            'nip_bendahara' => 'NIP Bendahara',
            'jbt_bendahara' => 'Jabatan',
            'jbt_pengesahan' => 'Jbt Pengesahan',
            'tgl_pengesahan' => 'Tgl Pengesahan',
            'kd_verifikasi' => 'Kd Verifikasi',
        ];
    }

    public function getSekolah()
    {
        return $this->hasOne(\app\models\RefSekolah::className(), ['id' => 'sekolah_id']);
    }    
}
