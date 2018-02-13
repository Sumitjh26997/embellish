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
use backend\models\Items;
use yii\data\ActiveDataProvider;
/*use backend\models\User;*/
use frontend\models\User;
use backend\models\Image;
use backend\models\OrderItem;
use backend\models\Orders;
use backend\models\DeleteOrderItemLog;
use backend\models\DeleteOrdersLog;
use yii\db\Query;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\db\Exception;
use yii\helpers\Html;
use yii\db\Transaction;
use backend\models\Feedback;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\Connection;
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

   public function actionCategory($cat,array $color,array $material)
    {
        if($color[0]=="none" && $material[0]=="none")
        {
            //echo "all";
            $category = Items::find()->where(['type'=>$cat])->all();
        }
        else if($color[0]!="none" && $material[0]=="none")
        {
            //echo "color";
            $category = Items::find()->where(['type'=>$cat])->andWhere(['in','color',$color])->all();   
        }
        else if($color[0]=="none" && $material[0]!="none")
        {
            //echo "material";
            $category = Items::find()->where(['type'=>$cat])->andWhere(['in','material',$material])->all();   
        }
        else
        {
            //echo "both";
            $category = Items::find()->where(['type'=>$cat])->andWhere(['in','color',$color])->orWhere(['in','material',$material])->all();   
        }
        //print_r($category);
        $categoryimages = Image::find()->where(['in','item_id',$category])->distinct()->all();
        $colors = Items::find()->select(['color'])->where(['type'=>$cat])->distinct()->all();
        $materials = Items::find()->select(['material'])->where(['type'=>$cat])->distinct()->all();

        return $this->render('category',['cat' => $cat,'category'=>$category,'categoryimages' => $categoryimages,'color'=>$colors,'material'=>$materials,'colorcheck'=>$color,'materialcheck'=>$material]);
    }

    public function actionSearch($keyword)
    {
       $search = Items::find()->orWhere(['like','name',$keyword])->orWhere(['like','color',$keyword])->orWhere(['like','material',$keyword])->orWhere(['like','description',$keyword])->limit(6)->all();
       return $this->renderPartial('search',['result'=>$search]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
 

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $items = Items::find()->where(['featured'=>'Yes'])->all();
        $categories = Items::find()->select(['type'])->distinct()->all();
      
       /* $items=new ActiveDataProvider (['query'=>Item::find()->where(['featured'=>'Yes']),
            'pagination'=>['pageSize'=>3],

        ]);*/

        return $this->render('index',['items'=>$items,'categories'=>$categories]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionCart($message)
    {
       
    $cuser= Yii::$app->user->getId();
$cookie = isset($_COOKIE['cart_items_cookie'.$cuser]) ? $_COOKIE['cart_items_cookie'.$cuser] : "";
    $cookie = stripslashes($cookie);
    $saved_cart_items = json_decode($cookie, true);

    
    //echo 'cart_items_cookie'."$cuser".'<br>';
 
    // if $saved_cart_items is null, prevent null error
    if(!$saved_cart_items)
    {
        $saved_cart_items=array();  
    }

    if(isset($_POST['quantity']) && isset($_POST['iid']))
    {
        $quantity=$_POST['quantity'];
        $id=$_POST['iid'];

    if(!array_key_exists($id, $saved_cart_items))
    {
        $cart_items[$id]=array(
        'quantity'=>$quantity);

        if(count($saved_cart_items)>0)
        {
            foreach($saved_cart_items as $key=>$value)
            {
                // add old item to array, it will prevent duplicate keys
                $cart_items[$key]=array(
                    'quantity'=>$value['quantity']
                );
            }
        }


      /*  echo "new : ";
        print_r($cart_items);
        echo "<br>";*/

        $json = json_encode($cart_items, true);
        setcookie("cart_items_cookie"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
        $_COOKIE['cart_items_cookie'.$cuser]=$json;

      //  echo $json.'<br>';
        $saved_cart_items=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
      //  print_r($saved_cart_items);


    }

   
    
    /*else
    {
        echo " old<br>";
        $cart_items[$id]=array('quantity'=>$quantity);
         $json = json_encode($cart_items, true);
        setcookie("cart_items_cookie"."$cuser", $json, time() + (3000), '/'); // 86400 = 1 day
        $_COOKIE['cart_items_cookie'."$cuser"]=$json;

        $saved_cart_items=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
        print_r($saved_cart_items);
       
        //render
    }*/

}

else
{ 
  //  print_r($saved_cart_items); 

} 


return $this->render('cart',['saved_cart_items'=>$saved_cart_items,'message'=>$message,'cuser'=>$cuser]);

}

 public function actionProduct($id)
    {
        $item = Items::findOne($id);
        $itemimages=Image::find()->where(['item_id'=>$id])->all();
        $cuser= Yii::$app->user->getId();  


    return $this->render('product',['item'=>$item,'id'=>$id,'itemimages'=>$itemimages,'cuser'=>$cuser]);

    }

public function actionFeedback($order_id)
{
    $r=1;
     $cuser= Yii::$app->user->getId();
     $accountuserdetails = User::find()->where(['id'=>$cuser])->one();

     $result=Feedback::find()->where(['order_id'=>$order_id])->one(); 

     $fetchorder=Orders::find()->where(['user_id'=>$cuser])->all();
    $fetchpreviousorder=DeleteOrdersLog::find()->where(['user_id'=>$cuser])->all();


     if(empty($result))
        return $this->render('feedback',['accountuserdetails'=>$accountuserdetails,'order_id'=>$order_id]);
    else
    return $this->render('order',['fetchorder'=>$fetchorder,'fetchpreviousorder'=>$fetchpreviousorder,'r'=>$r]);
}
  
    public function actionDelitem($id)
    {
        $session=Yii::$app->session;
        echo $id;
        $cuser= Yii::$app->user->getId();


        //retrieving from cookie
        $array=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
        //print_r($array);

        echo "before<br>" ;

        //deleting an element from an array
        print_r($array); echo '<br>';
        $array = array_diff_key($array,[$id=>array()]);

        echo "after<br>";
        print_r($array);echo '<br>';

        //storing in cookie
        $json = json_encode($array, true);
        setcookie("cart_items_cookie"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
        $_COOKIE['cart_items_cookie'.$cuser]=$json;


        echo '<br>';
        print_r($_COOKIE['cart_items_cookie'.$cuser]);
        
       // print_r($array);     
       $message='unset';   
        return $this->redirect(['/site/cart','message'=>'unset']);
    }

    public function actionCheckout()
    {
       
        $cuser= Yii::$app->user->getId();

        if(isset($_COOKIE['cart_items_cookie'.$cuser]))
       {

         $vars=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
         return $this->render('checkout',['vars'=>$vars,'cuser'=>$cuser]);//'cartimages'=>$cartimages]);
       }
        
        return $this->redirect(['/site/cart']);

        
        
       
/*foreach ($session as $x) {
    echo key($x);
}       echo $session[];*/

        
       

    }
    public function actionCancelorder($order_id)
    {
        $order=Orders::find()->where(['order_id'=>$order_id])->one();
        $order->status='Cancelled';
        $order->save();

        $cuser= Yii::$app->user->getId();
        
        $r1=1;

        $fetchorder=Orders::find()->where(['user_id'=>$cuser])->all();
        $fetchpreviousorder=DeleteOrdersLog::find()->where(['user_id'=>$cuser])->all();

        return $this->render('order',['fetchorder'=>$fetchorder,'fetchpreviousorder'=>$fetchpreviousorder,'r1'=>$r1]);
    }

    public function actionAccount()
    {
        //$session=Yii::$app->session;
        $cuser= Yii::$app->user->getId();
        $accountuserdetails = User::find()->where(['id'=>$cuser])->one();
        
        $accountuser=$cuser;

        return $this->render('account',['accountuser'=>$accountuser,'accountuserdetails'=>$accountuserdetails]);

    }
    public function actionConfirmtocheckout()
    {
        $cart_amount=0;
        $whetherorder=0;
       /*  $start_date='2018-09-05';
         $end_date='2018-09-27';*/
         $cuser= Yii::$app->user->getId();
           //if(!isset($_SESSION['osd']) || !isset($_SESSION['osd']))
        if(!isset($_COOKIE['start_date'.$cuser]) || !isset($_COOKIE['end_date'.$cuser]))
           return $this->redirect(['/site/cart','message'=>'Order start date or end Date is Not set']);

         $start_date=json_decode(stripslashes($_COOKIE['start_date'.$cuser]));
        $end_date=json_decode(stripslashes($_COOKIE['end_date'.$cuser]));

         $pickup=$_POST['pickup_time'];
         echo 'pickup'.$pickup.'<br>';

         $nice=array();
        $cuser= Yii::$app->user->getId();

        $return_date = date('Y-m-d',strtotime($end_date . "+1 days"));
        echo $return_date;

        $checkoutitems=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
        
        echo "count=".count($checkoutitems)."<br>";
      //  echo "print=".print_r($checkoutitems)."<br>";
    
       // print_r($orderitems);



        $connection = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=embellish_props',
            'username' => 'root',
            'password' => '12345',
                ]);

        $connection->open();
         

        

        $transaction=$connection->beginTransaction();
        try {

            $command1= $connection->createCommand()->insert('orders',['user_id'=>$cuser,'order_end_date'=>$end_date,'order_start_date'=>$start_date,'return_date'=>$return_date,'pickup_time'=>$pickup])->execute();
            //if($command1)
            $fetchrecentorder= $connection->createCommand("select order_id from  orders where user_id=$cuser order by order_id DESC limit 1 ")->queryOne();

        foreach (array_keys($checkoutitems) as $i) {
            $total_items=0;
        
            $from_item = Items::find()->where(['item_id'=>$i])->one();

            $from_orderitems = OrderItem::find()->where(['item_id'=>$i])->all();

            foreach ($from_orderitems as $ouritem) {

             
                $from_order = Orders::find()->where(['order_id'=>$ouritem->order_id])//order ids of same items 
                //->andWhere(['order_end_date'=>'2018-09-12'])
                ->one();
                
              
                if($from_order['status']=='Received'|| $from_order['status']=='Fulfilled')
                {
                  if($start_date < $from_order['return_date'] && $end_date < $from_order['order_start_date'])
                  {
                    //skip
                  }
                  else if($start_date <=$from_order['return_date'])
                //  echo "received";
                  $total_items=$total_items+$ouritem['qty_per_item'];//
                   //$total=min($total_items,$from_item['qty_on_order']);
                }

             
            }

           // echo '<br>'."above sum for item_id".$i."---".$total_items."in store=".$from_item->quantity.'<br>';

            $star=$from_item->quantity-$total_items;
         //   echo "current availability";
         //   echo $star;
         //   echo "--------------";

            
            if($star<=0 || $star< $checkoutitems[$i]['quantity'] )
            {

                    throw new Exception("$from_item->name is not available in specified quantity");
            }
                
                else {

                    $command2= $connection->createCommand()
                ->insert('order_item',
                    [   'order_id'=>$fetchrecentorder['order_id'],
                        'item_id'=>$i,
                        'current_price'=>$from_item->rent_per_day,
                        'qty_per_item'=>$checkoutitems[$i]['quantity']
                        ])->execute();

                $cart_amount=$cart_amount+$from_item->rent_per_day*$checkoutitems[$i]['quantity'];
            }
              
         }
        
          $cart_amount=$cart_amount+0.09*$cart_amount;
          $nom=$fetchrecentorder['order_id'];

          $check=$connection->createCommand("update orders set cart_amt = $cart_amount
                where order_id = $nom and user_id=$cuser")->execute();
    
          if(!$check)            
            throw new Exception("enable to process");

            $transaction->commit();

        $array=array();
        $json = json_encode($array, true);
        setcookie("cart_items_cookie"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
        $_COOKIE['cart_items_cookie'.$cuser]=$json;

        $start_date="";
        $end_date="";
       $json = json_encode($start_date, true);
      setcookie("start_date"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
      $_COOKIE['start_date'.$cuser]=$json;

      $json = json_encode($end_date, true);
      setcookie("end_date"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
      $_COOKIE['end_date'.$cuser]=$json;

        
        }
        catch(Exception $e)
        {
               //echo "<br>we are done<br>";
            /*$array=$checkoutitems ;
            $json = json_encode($array, true);
            setcookie("cart_items_cookie"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
            $_COOKIE['cart_items_cookie'.$cuser]=$json;*/
         
               $transaction->rollBack();
               echo Html::tag('p',$e->getMessage()."!",['class'=>'container alert alert-danger']);
               return $this->redirect(['/site/cart','message'=>$e->getMessage()]);
                
            }
          
        return $this->redirect(['/site/printorder']);
    }


    public function actionDecor($id)
    {
        $decors = Items::find()->where(['type'=>$id])->all();
    
        return $this->render('decor',['id'=>$id,'decors'=>$decors]);

    }
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $link=Yii::$app->urlManager->createAbsoluteUrl(['/site/confirm','key'=>$user->auth_key]);
                $email = \Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom('sneha@embellish.store')
                ->setSubject('Signup Confirmation')
                ->setTextBody("Click this link to verify your account.\r \n ".Html::encode($link))->send();
                if($email){
                    Yii::$app->getSession()->setFlash('success','Check Your e-mail for further instructions');
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
            Yii::$app->getSession()->setFlash('success','Success! You can now login.');
        }
        else{
            Yii::$app->getSession()->setFlash('warning','Verification failed!');   
        }

        return $this->goHome();
    }

    public function actionLogin()
    {
        session_destroy();
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

    public function actionPrintorder()
    {
        $cuser= Yii::$app->user->getId();
        $accountuser = User::find()->where(['id'=>$cuser])->one();

        $fetchorder=Orders::find()->where(['user_id'=>$cuser])->orderBy(['order_id'=>SORT_DESC])
        ->one();
        
       
        
        $f=$fetchorder['order_id'];
        
        $itemsinorder = OrderItem::find()->where(['order_id'=>$f])->all();

       
        return $this->render('printorder',['fetchorder'=>$fetchorder,'accountuser'=>$accountuser,
            'itemsinorder'=>$itemsinorder]);
    }

    public function actionOrder()
    {
        $cuser= Yii::$app->user->getId();
        //echo 'user-id'.$cuser.'<br>';
        $fetchorder=Orders::find()->where(['user_id'=>$cuser])->all();

        $fetchpreviousorder=DeleteOrdersLog::find()->where(['user_id'=>$cuser])->all();
        
        return $this->render('order',['fetchorder'=>$fetchorder,'fetchpreviousorder'=>$fetchpreviousorder]);
        
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
    /*public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }*/

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
