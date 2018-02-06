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

    public function actionCategory($cat)
    {
        $category = Item::find()->where(['type'=>$cat])->all();
        //$categoryimages = Image::find()->where(['in','item_id',$category])->distinct()->all();

        return $this->render('category',['cat' => $cat,'category'=>$category]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $items = Item::find()->where(['featured'=>'Yes'])->all();
      
       /* $items=new ActiveDataProvider (['query'=>Item::find()->where(['featured'=>'Yes']),
            'pagination'=>['pageSize'=>3],

        ]);*/
        return $this->render('index',['items'=>$items]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionCart()
    {
        /* if (Yii::$app->user->isGuest) 
            { 
                return $this->redirect(['/site/login']);
            }*/


        $session=Yii::$app->session;
        //Yii::$app->user->logout(false);
        //echo $_POST['iid']." ";
        //$session['cart']='';
        //Yii::$app->db->autocommit=false;
        //$pid = $session['cart'];


/*
        if(isset($_POST['iid'])  && (empty($pid) || !in_array($_POST['iid'],$pid) ))
        {
            $connection = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=embellish_props',
            'username' => 'root',
            'password' => '12345',
                ]);

            $connection->open();
            

            $itemtofetch = $_POST['iid'];
            $itemqtydemand=$_POST['qty'];
           
            try {

            $transaction=Yii::$app->db->beginTransaction();
            $sql = "select * from item where item_id=$itemtofetch";
            
            $checkitem=Item::findBySql($sql)->One();
            $number=$checkitem->qty_left;  

            if($checkitem->qty_left < $itemqtydemand or $itemqtydemand > $checkitem->qty_on_order)
                throw new Exception('cannot proceed');

            else
            {
                $number=$number-1;
            

                $command = $connection->createCommand("Update item set qty_left=$number where item_id=$itemtofetch");
                $command->execute();
            
                $pid[]=$_POST['iid'];
                $session['cart']=$pid;
                //print_r($session['cart']);
                $transaction->commit();
            }

           

        } catch (Exception $e) {
            $transaction->rollBack();
           echo Html::tag('p',$e->getMessage()."!",['class'=>'container alert alert-danger']);
            echo $e->getMessage();
        }
    
 




      }*/
     /* else{
        echo 'already present';
         print_r($session['cart']);
      }*/
      /*print_r($session['cart']);
        $carts = Item::find()->where(['item_id'=>$session['cart']])->all();*/


       /* 
        foreach (array_keys($session['cart']) as $i) {
            echo $i.'=>'.$session['cart'][$i].'<br>';
        }
                    print_r($session['cart']);
       
 */
      //print_r($session['cart']);

       
        //$cartimages=findBySql($sql)->all();
        /*foreach($cartandimage as $cart)
        echo $cart->.'<br>';
        echo '<br>';

        foreach(array_keys($cartandimage) as $i)
        {

            echo $cartandimage[$i]->item_id.' '.'<br>';
        }*/
        
      
        // $cartimages = Image::find()->where(['in','item_id',$carts])->distinct()->all();

        //return $this->render('cart',['carts'=>$carts]);//,'cartimages'=>$cartimages]);
    $cuser= Yii::$app->user->getId();
$cookie = isset($_COOKIE['cart_items_cookie'.$cuser]) ? $_COOKIE['cart_items_cookie'.$cuser] : "";
    $cookie = stripslashes($cookie);
    $saved_cart_items = json_decode($cookie, true);

    
    echo 'cart_items_cookie'."$cuser".'<br>';
 
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


        echo "new : ";
        print_r($cart_items);
        echo "<br>";

        $json = json_encode($cart_items, true);
        setcookie("cart_items_cookie"."$cuser", $json, time() + (86400), '/'); // 86400 = 1 day
        $_COOKIE['cart_items_cookie'.$cuser]=$json;

        echo $json.'<br>';
        $saved_cart_items=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
        print_r($saved_cart_items);


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
    print_r($saved_cart_items); 
    //echo '<br>'.$saved_cart_items[9]['quantity'];//going directly from carts tab
    //echo '<br>$carts=';
    //print_r($carts);

    /*$cartitemsascookie=$_COOKIE['cart_items_cookie'.$cuser];
        $cartitemsascookie=stripslashes($cartitemsascookie);
        $carts = json_decode($cartitemsascookie, true);

//print_r($carts);

foreach(array_keys($carts) as $i)
{
    echo '<br>'.$i." ".$carts[$i]['quantity'].'<br>';
}
*/
} 


return $this->render('cart',['saved_cart_items'=>$saved_cart_items]);
}

 public function actionProduct($id)
    {
        $item = Item::findOne($id);
        $itemimages=Image::find()->where(['item_id'=>$id])->all();  

        
    return $this->render('product',['item'=>$item,'id'=>$id,'itemimages'=>$itemimages]);

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
        return $this->redirect(['/site/cart']);
    }

    public function actionCheckout()
    {
       
        $cuser= Yii::$app->user->getId();

        $vars=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
        
        
        
       
/*foreach ($session as $x) {
    echo key($x);
}       echo $session[];*/

        
       return $this->render('checkout',['vars'=>$vars]);//'cartimages'=>$cartimages]);

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
         $start_date='2018-09-05';
         $end_date='2018-09-27';
         $pickup=$_POST['pickup_time'];
         echo 'pickup'.$pickup.'<br>';

         $nice='';
        $cuser= Yii::$app->user->getId();

        $return_date = date('Y-m-d',strtotime($end_date . "+1 days"));
        echo $return_date;

        $checkoutitems=json_decode(stripslashes($_COOKIE['cart_items_cookie'.$cuser]),true);
        
        echo "count=".count($checkoutitems)."<br>";
      //  echo "print=".print_r($checkoutitems)."<br>";
         /*foreach ($var as $key => $value) {
            # code...
            //echo $value;
        }*/
       /* $orderitems = Item::find()->where(['item_id'=>array_keys($checkoutitems)])->all();
        echo "u wanted this";
        foreach ($orderitems as $key => $value) {
            echo $key."==".$value['quantity'].'<br>';
        }*/
       // print_r($orderitems);



        $connection = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=embellish_props',
            'username' => 'root',
            'password' => '12345',
                ]);

        $connection->open();
         

         try {

            $transaction=Yii::$app->db->beginTransaction();


            $command1= $connection->createCommand()->insert('orders',['user_id'=>$cuser,'order_end_date'=>$end_date,'order_start_date'=>$start_date,'return_date'=>$return_date,'pickup_time'=>$pickup])->execute();
            //if($command1)
            $fetchrecentorder= $connection->createCommand("select order_id from  orders where user_id=$cuser order by order_id DESC limit 1 ")->queryOne();

        foreach (array_keys($checkoutitems) as $i) {
            $total_items=0;
        
            $from_item = Item::find()->where(['item_id'=>$i])->one();

            $from_orderitems = OrderItem::find()->where(['item_id'=>$i])->all();

            foreach ($from_orderitems as $ouritem) {

               /* //echo "item_id:&nbsp".$ouritem['item_id']."<br>";
                $from_order = Orders::find()->where(['order_id'=>$ouritem->order_id])//order ids of same items 
                ->andWhere(['<=','order_end_date','2018-09-12'])
                ->one();//replace 2018....with $start_date of new order
                
               // echo "order_id".$from_order['order_id']."<br>";
               // echo "order_end date".$from_order['order_end_date']."<br>";
               // echo "qty per item".$ouritem['qty_per_item']."<br>";
                //echo "start date".$from_order['order_start_date']."<br><br>";
                if(!empty($from_order))
                $total_items=$total_items+$ouritem['qty_per_item'];*/

               // echo "item_id:&nbsp".$ouritem['item_id']."<br>";
                $from_order = Orders::find()->where(['order_id'=>$ouritem->order_id])//order ids of same items 
                //->andWhere(['order_end_date'=>'2018-09-12'])
                ->one();
                
                //echo "order_id".$from_order['order_id']."<br>";
                //echo "order_end date".$from_order['order_end_date']."<br>";
               // echo "qty per item".$ouritem['qty_per_item']."<br>";
                //echo "start date".$from_order['order_start_date']."<br><br>";
                if($from_order['status']=='Received')
                {
                  if($start_date < $from_order['order_end_date'] && $end_date < $from_order['order_start_date'])
                  {
                    //skip
                  }
                  else if($start_date <=$from_order['order_end_date'])
                //  echo "received";
                  $total_items=$total_items+$ouritem['qty_per_item'];//
                   //$total=min($total_items,$from_item['qty_on_order']);
                }

             
            }

            echo '<br>'."above sum for item_id".$i."---".$total_items."in store=".$from_item->quantity.'<br>';

            $star=$from_item->quantity-$total_items;
            echo "current availability";
            echo $star;
            echo "--------------";

            
            if($star<=0)
            {
               //throw new Exception("$i is not available");
                $nice[]=$i;

                
            }
            
              //  $nice[]=$i;
            

            

            
            //echo '<br>'.'command'.$command1.'<br>'.'fetch'.$fetchrecentorder['order_id'];
            /*foreach($orderitems as $item)
            {*/
                
                else {
                    /*$command2= $connection->createCommand()
                ->insert('order_item',
                    [   'order_id'=>$fetchrecentorder['order_id'],
                        'item_id'=>$i,
                        'current_price'=>$from_item->rent_per_day,
                        'qty_per_item'=>$checkoutitems[$i]['quantity']
                        
                        ])->execute();*/
                 $cart_amount=$cart_amount+$from_item->rent_per_day*$checkoutitems[$i]['quantity'];
            }
            /*}*/
            

            /*$transaction->commit();*/
           
              
         }

        //}
          /*$fetch= $connection->createCommand("select order_id from  orders where user_id=$cuser order by order_id DESC limit 1 ")->queryOne();*/
          $fetch=Orders::find()->where(['order_id'=>$fetchrecentorder])->one();
          
          $fetch->cart_amt=$cart_amount;
          $fetch->save();

            $transaction->commit();


        } catch (Exception $e) {
            $transaction->rollBack();
           echo Html::tag('p',$e->getMessage()."!",['class'=>'container alert alert-danger']);
            echo $e->getMessage();
        }
        //print_r($nice);

         //return $this->redirect(['/site/printorder']);
        echo "nice";echo $nice;
    }

    public function actionDecor($id)
    {
        $decors = Item::find()->where(['type'=>$id])->all();
    
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
        
       // echo $fetchorder->order_id;
      /*  $session=Yii::$app->session;
        $session->open();
        
        $var=$session['cart'];  */     
        
        $f=$fetchorder['order_id'];
        
        $itemsinorder = OrderItem::find()->where(['order_id'=>$f])->all();
        //print_r($itemsinorder);
        return $this->render('printorder',['fetchorder'=>$fetchorder,'accountuser'=>$accountuser,
            'itemsinorder'=>$itemsinorder]);
    }

    public function actionOrder()
    {
        $cuser= Yii::$app->user->getId();
        echo 'user-id'.$cuser.'<br>';
        $fetchorder=Orders::find()->where(['user_id'=>$cuser])->all();
        /*foreach($fetchorder as $order)
        /*print_r($order);*/
        
        /*foreach($fetchorder as $order)
        {
            echo ' order-id :'.$order->order_id.'<br>';
            $orderitems=OrderItem::find()->where(['order_id'=>$order->order_id])->all();
                foreach($orderitems as $orderitem)
                {
                    echo 'item_id : '.$orderitem->item_id.'<br>';
                }
                echo '<br>';
        } */

        $session=Yii::$app->session;
        $session->open();
        /*if($session->isActive)
        {
            echo 'hello';
        } */
        /*print_r($session['cart']);*/ //displaying array
        $var=$session['cart'];//displaying array
        $fetchpreviousorder=DeleteOrdersLog::find()->where(['user_id'=>$cuser])->all();
        
        //echo count($var);
         
        //$var = Item::find()->where(['item_id'=>$var])->all();
        //$carts = Item::find()->where(['item_id'=>$session['cart']])->all();
        //$cartimages = Image::find()->where(['item_id'=>$session['cart']])->distinct()->all();

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
