<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Item;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
/*use backend\models\User;*/

use backend\models\Image;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
     public $enableCsrfValidation=false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
     * @return mixed
     */
    public function actionIndex()
    {
        //$items = Item::find()->where(['featured'=>'Yes'])->all();
        /*$items = new ActiveDataProvider([
        'query'=> Item::find(),
        'pagination'=>['pageSize' => 3,
        ],
    ]);*/

        return $this->render('index');//,['items'=>$items]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionCart()
    {
         if (Yii::$app->user->isGuest) 
            { 
                return $this->redirect(['/site/login']);
            }


        $session=Yii::$app->session;
        //Yii::$app->user->logout(false);
        //echo $_POST['iid']." ";
       // $session['cart']='';

        $pid = $session['cart'];

        if(isset($_POST['qty']))
        {
            $qty=$_POST['qty'];
            /*echo $qty;*/
            $pid[]=$_POST['iid'];
            $session['cart']=$pid;
        }
        $carts = Item::find()->where(['item_id'=>$session['cart']])->all();
        $cartimages = Image::find()->where(['item_id'=>$session['cart']])->distinct()->all();

        return $this->render('cart',['carts'=>$carts,'cartimages'=>$cartimages]);
    }

    /*public function actionViewDetails($id)
    {
        $item =Image::find()->where(['item_id'=>$id])->all();
        
        return $this->render('viewDetails',['item'=>$item]);
    
    }*/
    public function actionDelitem($id)
    {
        $session=Yii::$app->session;
        echo $id;
        $array=$session['cart'];
        //print_r($array);

       if(($key = array_search($id,$array)) !== false) {
       unset($array[$key]);
         }    
    
        
        $session['cart']=$array;
       // print_r($array);        
        return $this->redirect(['/site/cart']);
    }
    public function actionCheckout()
    {
       //echo 'hello';
        $session=Yii::$app->session;
        $session->open();
        if($session->isActive)
        {
            echo 'hello';
        } 
        /*print_r($session['cart']);*/ //displaying array
        $var=$session['cart'];//displaying array

        echo $var[0];
        echo count($var);
         /*foreach ($var as $key => $value) {
            # code...
            //echo $value;
        }*/
        $var = Item::find()->where(['item_id'=>$var])->all();
        //$carts = Item::find()->where(['item_id'=>$session['cart']])->all();
        $cartimages = Image::find()->where(['item_id'=>$session['cart']])->distinct()->all();
       
/*foreach ($session as $x) {
    echo key($x);
}

       echo $session[];*/
       return $this->render('checkout',['var'=>$var,'cartimages'=>$cartimages]);


    }
    public function actionAccount()
    {
        //$session=Yii::$app->session;
        $cuser= Yii::$app->user->getId();
        //$accountuser =  ser::find()->where(['id'=>$cuser])->one();
        
        $accountuser=$cuser;

        return $this->render('account',['accountuser'=>$accountuser]);

    }

    public function actionDecor()
    {
        $decors = Item::find()->where(['type'=>'decor'])->all();
        $decorimages = Image::find()->where(['in','item_id',$decors])->distinct()->all();

        return $this->render('decor',['decors'=>$decors,'decorimages' => $decorimages]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */

    public function actionPrint()
    {
        return $this->render('print');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $email = \Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom('sneha@embellish.store')
                ->setSubject('Signup Confirmation')
                ->setTextBody("Click this link ".\yii\helpers\Html::a('confirm',Yii::$app->urlManager->createAbsoluteUrl(['/site/confirm','key'=>$user->auth_key])))->send();
                if($email){
                    Yii::$app->getSession()->setFlash('success','Check Your E-mail!');
                }
                else{
                    Yii::$app->getSession()->setFlash('warning','Failed, contact Admin!');
                }
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionConfirm($key)
    {
        $user = \common\models\User::find()->where([
            'auth_key' => $key,
            'status' => 0,
        ])->one();

        if(!empty($user)){
            $user->status = 10;
            $user->save();
            Yii::$app->getSession()->setFlash('success','Success!');
        }
        else{
            Yii::$app->getSession()->setFlash('warning','Failed!');   
        }

        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
