<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use backend\models\Item;
use backend\models\Image;
use yii\data\ActiveDataProvider;


/**
 * Site controller
 */
class ItemController extends Controller
{
    /**
     * @inheritdoc
     */

    public function actionIndex($id)
    {
        $item = Item::findOne($id);
        $itemimages=Image::find()->where(['item_id'=>$id])->all();
        /*$items = new ActiveDataProvider([
        'query'=> Item::find(),
        'pagination'=>['pageSize' => 3,
        ],
    ]);*/

        return $this->render('index',['item'=>$item,'itemimages'=>$itemimages]);

    }
    

    
    

    
    
    
}
