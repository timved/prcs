<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 24.06.2018
 * Time: 13:27
 */

namespace app\models\tables;


use yii\base\Model;

class CompanyForm extends Model
{
    public $id;
    public $company_name;
    public $company_inn;
    public $company_director;
    public $company_address;
    public $company_status;
    public $contact_name;
    public $contact_phone;
    public $contact_email;



    public function rules()
    {
        return [
            [['company_name', 'company_inn', 'company_director', 'company_address', 'company_status', 'contact_name', 'contact_phone', 'contact_email'], 'required'],
            [['company_inn'], 'integer'],
            [['company_name', 'company_director', 'contact_name', 'contact_email'], 'string', 'max' => 200],
            [['company_address'], 'string', 'max' => 255],
            [['company_status'], 'string', 'max' => 50],
            [['contact_phone'], 'string', 'max' => 100],
            ['contact_email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'company_name' => 'Название',
            'company_inn' => 'ИНН',
            'company_director' => 'Генеральный директор',
            'company_address' => 'Адрес',
            'company_status' => 'Статус',
            'contact_name' => 'Контактное лицо',
            'contact_phone' => 'Телефон',
            'contact_email' => 'E-mail',
        ];
    }

    public function createCompany()
    {
        $company = new Company();
        $contact = new Contact();
        $company->name = $this->company_name;
        $company->inn = $this->company_inn;
        $company->director = $this->company_director;
        $company->address = $this->company_address;
        $company->status = $this->company_status;
        $company->save();
        $this->id = $company->id;
        $contact->name = $this->contact_name;
        $contact->phone = $this->contact_phone;
        $contact->email = $this->contact_email;
        $contact->company_id = $company->id;
        $contact->save();
    }

    public function checkRole()
    {
        if (\Yii::$app->user->can('redactor')){
           return $this->company_status = 'В ожидании';
        }
    }


}