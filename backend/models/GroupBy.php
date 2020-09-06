<?php
namespace backend\models;

use Yii;
use common\models\ClientRegulation;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\db\Query;

class ClientRegulationSearch extends ClientRegulation {
    public function rules() {
        return [
            [['status'], 'integer'],
            [['regulation', 'bizcode', 'email'], 'safe'],
        ];
    }
    public function search($params) {
      
        $expression = new Expression('bizcode,status,GROUP_CONCAT(regulation) AS regulation,action_at');
        $query = (new Query())->select($expression)
        ->from(ClientRegulation::tableName())      
        ->groupBy(['bizcode']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['action_at'=> SORT_DESC],
                'attributes' => ['regulation','status' ,'bizcode', 'action_at']]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'status' => $this->status
        ]);

        $query->andFilterWhere(['like', 'regulation', $this->regulation])
                ->andFilterWhere(['like', 'bizcode', $this->bizcode]);
                

        return $dataProvider;
    }
}
?>