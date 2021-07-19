<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Notebook;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Image;
use app\models\UpdateForm;

/**
 * NotebookController implements the CRUD actions for AdressUser model.
 */
class NotebookController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Notebook::find()->orderBy(['id'=>SORT_DESC]),
        ]);
        $update_form = new UpdateForm();
        if($update_form->load(Yii::$app->request->post()) && $update_form->validate())
        {
            $data_post = Yii::$app->request->post();
            $update_form->update_table($data_post['UpdateForm']);
        }
        $image = Image::find()->where(['category'=>'Notebook'])->orderBy(['id'=>SORT_DESC])->all();
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,'image' => $image,
            'update_form' => $update_form,
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
        $model = new Notebook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $image = Image::find()->where(['category'=>'Notebook'])->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('create', [
            'model' => $model, 'image' => $image,
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
        //if
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $image = Image::find()->where(['category'=>'Notebook'])->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('update', [
            'model' => $model,'image' => $image,
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
        if (($model = Notebook::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}