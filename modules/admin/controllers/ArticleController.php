<?php

namespace app\modules\admin\controllers;

use app\models\Comment;
use app\models\Image;
use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public $layout = 'admin';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $articles = Article::find()->all();

        return $this->render('index',compact('articles'));
       /* $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'article' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $article = new Article();
        $image = new Image();

        if ($article->load(Yii::$app->request->post())) {
         //  $image->image_path = $image->imageSave($image);
            if($image->load(Yii::$app->request->post())){
                // $image->image_path = $image->imageSave($image);
                $image->image_path = UploadedFile::getInstance($image,'image_path');
                $image->image_path->saveAs('images/'.$image->image_path->baseName .'.'. $image->image_path->extension);


                $image->save(false);
                $article->image_id = Yii::$app->db->lastInsertID;
            }

          //  $article->pdf = UploadedFile::getInstance($article,'pdf');
           // $article->pdf->saveAs('pdf/'.$article->pdf->baseName .'.'. $article->pdf->extension);

            $article->save(false);

            return $this->redirect(['view', 'id' => $article->id]);
        }

        return $this->render('create',compact('article','image'));
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $image = new Image();
        $article = $this->findModel($id);
        $image_path= $article->image_id;

        if ($article->load(Yii::$app->request->post())) {
            if ($image->load(Yii::$app->request->post())) {
                // $image->image_path = $image->imageSave($image);
                $image->image_path = UploadedFile::getInstance($image, 'image_path');
                $image->image_path->saveAs('images/' . $image->image_path->baseName . '.' . $image->image_path->extension);

                $image->update(false);
                $article->image_id = Yii::$app->db->lastInsertID;
            }else{
                $article->image_id = $image_path;
            }

                $article->update(false);

                return $this->redirect(['view', 'id' => $article->id]);
        }
        return $this->render('update', compact('article','image'));
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $comments = Comment::find()->where(['article_id' => $this->findModel($id)])->all();
        foreach ($comments as$comment) $comment->delete();

        unlink("images/{$this->findModel($id)->image->image_path}");

        $image_id = $this->findModel($id)->image_id;
        $image = Image::findOne($image_id);
        $image->delete();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($article = Article::findOne($id)) !== null) {
            return $article;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
