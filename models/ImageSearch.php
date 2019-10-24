<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Image;

/**
 * ImageSearch represents the model behind the search form of `app\models\Image`.
 */
class ImageSearch extends Image
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['image_path', 'date_create', 'date_update'], 'safe'],
            [['image_height', 'image_width'], 'number'],
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
        $query = Image::find();

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
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'image_height' => $this->image_height,
            'image_width' => $this->image_width,
        ]);

        $query->andFilterWhere(['like', 'image_path', $this->image_path]);

        return $dataProvider;
    }
}
