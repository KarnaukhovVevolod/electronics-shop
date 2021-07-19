<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ManagerShop;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManagershopController implements the CRUD actions for AdressUser model.
 */
class ManagershopController extends Controller
{
    /**
     * {@inheritdoc}
     */
    
    //public $URL;
    
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
            'query' => ManagerShop::find()->orderBy(['id'=>SORT_DESC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionOrder()
    {
        //Читаем данные по связи
        $Shop = new ManagerShop(); 
        $url = Yii::$app->request->url;
        //debug($url);
        //die();
        
        $data = $Shop->mypagination($url);
        //debug($data) ;
        
        
        $url_where = explode('&', $url);
        //debug($url_where);
        $count_url_where = count($url_where);
        $data['count_url'] = $count_url_where; 
        
        if( $count_url_where == 3 ){
            $data_order = ManagerShop::find()->with('productshop')->orderBy(['id'=>SORT_DESC])->offset($data['start_product'])->limit($data['limit'])->where(['status_order'=>$url_where[2]])->all();
            $data['start_product'] = $data['start_product'].'&'.$url_where[2];
            $data['prev'] = $data['prev'].'&'.$url_where[2];
            $data['next'] = $data['next'].'&'.$url_where[2];
            $data['last_n'] = $data['last_n'].'&'.$url_where[2];
            
            $data['count_url_1'] = $url_where[2];
        }else{
            $data_order = ManagerShop::find()->with('productshop')->orderBy(['id'=>SORT_DESC])->offset($data['start_product'])->limit($data['limit'])->all();
        }
        //debug($data);
        //die();
        Yii::$app->session->set('url_main', $url);
        //debug(Yii::$app->session->get('url_main'));
        
        return $this->render('order', compact('data_order','data'));
    }
    
    /**
     * Displays a single AdressUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //$url = $_SERVER['HTTP_REFERER'];

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
        $model = new ManagerShop();

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
        //$url = $_SERVER['HTTP_REFERER'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$_SERVER['HTTP_REFERER'] = $url_old;
            $post_data = Yii::$app->request->post();
            //debug($post_data);
            
            if($post_data['ManagerShop']['login'] != null){
                //$ro = (new \yii\db\Query())->from('historory_user_product')->where(['login'=>'admin']);
                //debug($ro->createCommand()->getRawSql());//die();
                Yii::$app->db->createCommand('UPDATE history_user_product SET status_order = '.$post_data['ManagerShop']['status_order'].
                        ' WHERE login = "'.$post_data['ManagerShop']['login'].'"' .' AND '.'order_number = "'.$post_data['ManagerShop']['order_number'].'"')->execute();
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
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
        if (($model = ManagerShop::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}