<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Image;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadsForm;
use yii\web\UploadedFile;

/**
 * ImageController implements the CRUD actions for AdressUser model.
 */
class ImageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdressUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $upload_image = new UploadsForm();
        $warning = null; 
        $dataProvider = new ActiveDataProvider([
            'query' => Image::find()->orderBy(['id'=>SORT_DESC]),
        ]);
        if( Yii::$app->request->isPost )
        {
            $data_image = UploadedFile::getInstances($upload_image, 'files');
            $data_directory = Yii::$app->request->post();
            $result = $upload_image->upload_image($data_image, $data_directory['UploadsForm']['directory']);
            
            if($result[1] == 'no')
            {
                $warning = $result[0];
                return $this->render('index', ['upload_image' => $upload_image,'warning' => $warning,
                    'dataProvider' => $dataProvider,
                ]);
            }
            else
            {
                $warning = null;
            }
            //debug($warning);
            //die();
            //die();
            //die();
        }
       

        return $this->render('index', ['upload_image' => $upload_image,'warning' => $warning,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdressUser model.
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
     * Creates a new AdressUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AdressUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AdressUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $path = $this->findModel($id);
        //debug($path['path']);
        $Im = new Image();
        $Im->unlink_image($path);
        //die();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AdressUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdressUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}