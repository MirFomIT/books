<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'image_id', 'user_id'], 'integer'],
            [['description', 'key_words', 'title', 'new', 'date_create', 'date_update', 'year', 'publishing_house', 'pdf', 'style'], 'safe'],
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
        $query = Article::find();

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
            'id' => $this->id,
            'image_id' => $this->image_id,
            'user_id' => $this->user_id,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'key_words', $this->key_words])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'new', $this->new])
            ->andFilterWhere(['like', 'date_create', $this->date_create])
            ->andFilterWhere(['like', 'date_update', $this->date_update])
            ->andFilterWhere(['like', 'publishing_house', $this->publishing_house])
            ->andFilterWhere(['like', 'pdf', $this->pdf])
            ->andFilterWhere(['like', 'style', $this->style]);

        return $dataProvider;
    }
}
