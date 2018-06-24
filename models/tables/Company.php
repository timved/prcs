<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $inn
 * @property string $director
 * @property string $address
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Contact[] $contacts
 */
class Company extends ActiveRecord
{
//    public $contact_name;
//    public $contact;
//    public $contactPhone;
//    public $contactEmail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inn', 'director', 'address', 'status'], 'required'],
            [['inn'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'director'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'inn' => 'ИНН',
            'director' => 'Генеральный директор',
            'address' => 'Адрес',
            'status' => 'Статус',
//            'contact_name' => 'contact_name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

//            'contactPhone' => 'Телефон',
//            'contactEmail' => 'E-mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['company_id' => 'id']);
    }
}
