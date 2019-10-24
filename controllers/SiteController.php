<?php

namespace app\controllers;

use app\models\Article;
use app\models\Comment;
use app\models\Image;
use app\models\Orders;
use app\models\Quote;
use app\models\RegisterForm;
use app\models\User;

use LiqPay;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $articles = Article::find()->all();

        $quote = Quote::find()->where(['quote'=>'0'])->one();
        $author_quote = Quote::find()->where(['quote'=>'1'])->one();


        $session = Yii::$app->session;
        $session->open();

        $session->set('modal_window','modal_window');

        timeOutSession(18);

        return $this->render('index', compact('articles','quote','author_quote','session'));
    }

    public function actionArticle(){
        //id выбранной страницы
        $id = Yii::$app->request->get('id');
        //поиск страницы по id
        $article = Article::find()->where(['id'=>$id])->one();

        //if click button new comment
        $user_new = new User();
        $comment_new = new Comment();
        $comments = Comment::find()
            ->where(['article_id'=>$id])
            ->andWhere(['allow'=>1])
            ->orderBy(['id'=> SORT_DESC])
            ->all();
        if($comment_new->load(Yii::$app->request->post()) && $user_new->load(Yii::$app->request->post())){

            $user_new->save(false);

            $comment_new->article_id = $id;
            $comment_new->user_id = Yii::$app->db->lastInsertID;
            $comment_new->allow = 0;
            $comment_new->date = date("Y-m-d");
            $comment_new->save(false);

            //$user_new->first_name = '';
            // $comment_new->comment = '';

            Yii::$app->session->setFlash('comment-success');
            return $this->refresh();
        }

        //новый заказ
        $order = new Orders();
        $order_id = $order->id;
        $order->article_id = $id;

// pay Privat24
        //ключи доступа mien
        $public_key = 'i22325639922';
        $private_key = 'giLSTM4cA9LOxhjE4obFdTcZ7qq2GNpS8npXczSG';
        //test key Ira
        // $public_key = 'sandbox_i52307824982';
        // $private_key = 'sandbox_LfKoI9U23o5PaTLxvtyCJX6U84kb6mcHijuuKRim';
        //base key Ira
        // $public_key = 'i54202089218';
        // $private_key = 'upM1fvCbWxxk9xhWxuSqdv99vLCXapOpWrS1xhf0';
//$data
        $version = "3";
        $action = "pay";
        $result_url = "http://www.antresolia.dp.ua/article/2";
        $json_string_array = array(
            'public_key' => $public_key,
            'version' => $version,
            'action' => $action,
            'amount' => $article->price_pdf,
            'currency' => 'UAH',
            'description' => $article->title,
            'order_id' => $order_id,
            // 'result_url' => $result_url
        );
        // {"public_key":"i81205308458","version":"3","action":"pay","amount":"3","currency":"UAH","description":"test","order_id":"000001"}
        $json_string = json_encode($json_string_array);

        $data = base64_encode($json_string);
        $sign_string = $private_key;
        $sign_string .= $data;
        $sign_string .= $private_key;

        // signature
        $signature = base64_encode(sha1($sign_string, true));

        // aad into session $client_data and $client_signature
        $session = Yii::$app->session;
        //$session->set('client_data', $data);
        //$session->set('client_signature',$signature);

        // send e-mail
        if($user_new->load(Yii::$app->request->post())){
            $liqpay = new LiqPay($public_key, $private_key);
            $res = $liqpay->api("request", array(
                'action'    => 'invoice_send',
                'version'   => '3',
                'email'     => $user_new->email,
                'amount'    => $article->price_pdf,
                'currency' => 'UAH',
                'order_id'  => 'order_id_1',
                'goods'     => array(array(
                    'amount' => 100,
                    'count'  => 2,
                    'unit'   => 'шт.',
                    'name'   => 'телефон'
                ))
            ));
        }


        if($session->has('request_data')|| $session->has('request_signature') ){
            $liqpay_data = $session->get('request_data');
            $liqpay_signature = $session->get('request_signature');
            //if status = "wait_accept"
            if($liqpay_data['status'] == 'wait_accept'){
                // data liqpay
                $liqpay_public_key = $liqpay_data['public_key'];// public key
                $liqpay_order_id = $liqpay_data['order_id'];// number of order
                $liqpay_ip = $liqpay_data['ip'];// ip address of client
                $liqpay_amount = $liqpay_data['amount'];// price pdf
                $liqpay_currency = $liqpay_data['currency'];// currency

                if(($article->price_pdf == $liqpay_amount) || ($json_string_array['currency']==$liqpay_currency)){
                    //открыть доступ к файлу

                    $pdf_path = "pdf/{$article->pdf_full}";

                    if (file_exists($pdf_path)) {
                        return \Yii::$app->response->sendFile($pdf_path);
                    }
                    return Yii::$app->response->redirect(["article/{$id}"]);

                }
            }
        }


        return $this->render('article',compact('article','comments','comment_new','user_new','data','signature'));
    }

    public function actionArticleOld(){
        //id выбранной страницы
        $id = Yii::$app->request->get('id');
        //поиск страницы по id
        $article = Article::find()->where(['id'=>$id])->one();
        //новый заказ
        $order = new Orders();
        $order_id = $order->id;
        $order->article_id = $id;

// pay Privat24
        //ключи доступа mien
        $public_key = 'i22325639922';
        $private_key = 'giLSTM4cA9LOxhjE4obFdTcZ7qq2GNpS8npXczSG';
        //test key Ira
        // $public_key = 'sandbox_i52307824982';
        // $private_key = 'sandbox_LfKoI9U23o5PaTLxvtyCJX6U84kb6mcHijuuKRim';
        //base key Ira
        // $public_key = 'i54202089218';
        // $private_key = 'upM1fvCbWxxk9xhWxuSqdv99vLCXapOpWrS1xhf0';
//$data
        $version = "3";
        $action = "pay";
        $result_url = "http://www.antresolia.dp.ua/article/2";
        $json_string_array = array(
            'public_key' => $public_key,
            'version' => $version,
            'action' => $action,
            'amount' => $article->price_pdf,
            'currency' => 'UAH',
            'description' => $article->title,
            'order_id' => $order_id,
            // 'result_url' => $result_url
        );
        // {"public_key":"i81205308458","version":"3","action":"pay","amount":"3","currency":"UAH","description":"test","order_id":"000001"}
        $json_string = json_encode($json_string_array);

        $data = base64_encode($json_string);
        $sign_string = $private_key;
        $sign_string .= $data;
        $sign_string .= $private_key;

        // signature
        $signature = base64_encode(sha1($sign_string, true));

        // aad into session $client_data and $client_signature
        $session = Yii::$app->session;
        //$session->set('client_data', $data);
        //$session->set('client_signature',$signature);

        if($session->has('request_data')|| $session->has('request_signature') ){
            $liqpay_data = $session->get('request_data');
            $liqpay_signature = $session->get('request_signature');
            //if status = "wait_accept"
            if($liqpay_data['status'] == 'wait_accept'){
                // data liqpay
                $liqpay_public_key = $liqpay_data['public_key'];// public key
                $liqpay_order_id = $liqpay_data['order_id'];// number of order
                $liqpay_ip = $liqpay_data['ip'];// ip address of client
                $liqpay_amount = $liqpay_data['amount'];// price pdf
                $liqpay_currency = $liqpay_data['currency'];// currency

                if(($article->price_pdf == $liqpay_amount) || ($json_string_array['currency']==$liqpay_currency)){
                    //открыть доступ к файлу

                    $pdf_path = "pdf/{$article->pdf_full}";

                    if (file_exists($pdf_path)) {
                        return \Yii::$app->response->sendFile($pdf_path);
                    }
                    return Yii::$app->response->redirect(["article/{$id}"]);

                }
            }
        }

//if click button new comment
        $user_new = new User();
        $comment_new = new Comment();
        $comments = Comment::find()
            ->where(['article_id'=>$id])
            ->andWhere(['allow'=>1])
            ->orderBy(['id'=> SORT_DESC])
            ->all();


       if($comment_new->load(Yii::$app->request->isPjax) && $user_new->load(Yii::$app->request->isPjax)){

            $user_new->save(false);

            $comment_new->article_id = $id;
            $comment_new->user_id = Yii::$app->db->lastInsertID;
            $comment_new->allow = 0;
            $comment_new->date = date("Y-m-d");
            $comment_new->save(false);

           $answer = true;

           return $this->render('article-old',compact('article','comments','data','signature','answer'));
        }

        return $this->render('article-old',compact('article','comments','comment_new','user_new','data','signature'));
    }

    /**
     * Displays first page page.
     *
     * @return string
     */
    public function actionResultUrl(){
        if(Yii::$app->request->post()) {
            $request_data = $_POST['data'];
            $request_data = base64_decode($request_data,1);
            $request_data = json_decode($request_data,true);
            $request_signature = $_POST['signature'];


            $article_description = $request_data['description'];
            // $article_description = strstr($article_description,'"');

            $article = Article::find()->where(['title' => $article_description])->one();
            $id = $article->id;
            //$id = $article['id'];
            //  $request_signature = $_POST['signature'];
            //  Yii::$app->response->redirect(Url::to("/"));
            // return $this->redirect(Url::to("article/{$request_data}"));
            //  $order_id = Yii::$app->request->get('order_id');
            // Yii::$app->runAction('article', ['id' => $article_id]);

            // aad into session $liqpay_data and $liqpay_signature
            $session = Yii::$app->session;
            $session->set('request_data', $request_data);
            $session->set('request_signature', $request_signature);

            return $this->render('result-url',compact('id'));
            //return $this->render("article/{$article_id}", compact('request_data','order_id'));
        }
        // return $this->render('result-url', compact('request_data','liqpay_data'));
    }

    public function actionRegister(){
        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post())){

            if ($model->register()) {
                return $this->redirect(['site/login']);
            }

        }
        return $this->render('register', compact('model'));

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        // $quote = Quote::find()->where(['quote'=>'0'])->one();
        $user = User::find()->select(['phone'])->where(['last_name'=>'Мальчукова'])->one();

        $model = new ContactForm();
        // if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
        if ($model->load(Yii::$app->request->post())){
            Yii::$app->mailer->compose('mail',compact('model'))
                ->setFrom($model->email)
                ->setTo('iramalchukova@gmail.com')
                ->setSubject($model->body)
                ->send();

            Yii::$app->session->setFlash('contact-success');

            return $this->refresh();
        }
        return $this->render('contact', compact('model','user'));
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAboutMe()
    {
        $sliders_img = Image::find()->where(['is_slider' => 1])->all();
        return $this->render('about-me', compact('sliders_img'));
    }
    /**
     * Displays first page page.
     *
     * @return string
     */
    public function actionFirstStory(){
        $carousel_images = Image::find()->where(['is_slider'=>1])->all();
        return $this->render('first-story', compact('carousel_images'));
    }


    public function actionContract(){
        return $this->render('contract');
    }
    public function actionCallback(){
        return $this->render('callback');
    }
}
