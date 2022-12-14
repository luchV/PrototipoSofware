<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Institucion;

/**
 * InstitucionSearch represents the model behind the search form about `common\models\Menus`.
 */
class InstitucionSearch extends Institucion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['insCodigo', 'ubicación', 'insNombre', 'insEstado'], 'safe']
        ];
    }

    /**
     * @inheritdoc
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
        $query = Institucion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'insCodigo', $this->insCodigo])
            ->andFilterWhere(['like', 'ubicación', $this->ubicación])
            ->andFilterWhere(['like', 'insEstado', $this->insEstado])
            ->andFilterWhere(['like', 'insNombre', $this->insNombre]);

        return $dataProvider;
    }
}
