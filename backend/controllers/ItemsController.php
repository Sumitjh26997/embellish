<?php

namespace backend\controllers;

use Yii;
use backend\models\Items;
use backend\models\ItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Image;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller
{
    /**
     * @inheritdoc
     */
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],            
        ];
    }


    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Items();

        if ($model->load(Yii::$app->request->post())) {

            $imageName = $model->name.'_'.uniqid();
            $model->file = UploadedFile::getInstance($model,'file');
            //change the path to your frontend/images/product-details 
            $model->file->saveAs('/var/www/html/yii2_advanced/images/product-details/'.$imageName.'.'.$model->file->extension);

            //saving path in db
            $model->image = $imageName.'.'.$model->file->extension;

            $model->save();
            return $this->redirect(['view', 'id' => $model->item_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionMultiple()
    {
        $upload = new Image();
        $item = Items::find()->orderBy(['item_id' => SORT_DESC])->all();

        if($upload->load(Yii::$app->request->post()))
        {
            $upload->image = UploadedFile::getInstances($upload,'image');
            if($upload->image && $upload->validate())
            {
                $path = '/var/www/html/yii2_advanced/images/product-details/';
                foreach ($upload->image as $image) {
                    $model = new Image();
                    $model->item_id = $upload->item_id;
                    //$imgname = $model->item_id.'_'.uniqid().rand(100,999).'.'.$image->extension;
                    $model->image = $model->item_id.'_'.uniqid().rand(100,999).'.'.$image->extension;
                    if($model->save(false))
                    {
                        $image->saveAs($path.$model->image);
                    }
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('multiple',['upload'=>$upload,'item'=>ArrayHelper::map($item,'item_id','name','item_id')]);
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->item_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Items model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
