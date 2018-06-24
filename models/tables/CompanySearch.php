<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CompanySearch represents the model behind the search form of `app\models\tables\company`.
 */
class CompanySearch extends Company
{
    public $contact_name;
    public $contact_phone;
    public $contact_email;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inn'], 'integer'],
            [['name', 'director', 'address', 'status', 'created_at', 'updated_at', 'contact_name', 'contact_phone','contact_email'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        if (Yii::$app->user->can('create')){
            $query = company::find();
        } else{
            $query = company::find()->where(['status' => 'Подтверждено']);
        }

        $query->joinWith('contacts');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            '`company`.id' => $this->id,
            'inn' => $this->inn,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', '`company`.name', $this->name])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'contact.name', $this->contact_name])
            ->andFilterWhere(['like', 'contact.phone', $this->contact_phone])
            ->andFilterWhere(['like', 'contact.email', $this->contact_email]);

        return $dataProvider;
    }
}
