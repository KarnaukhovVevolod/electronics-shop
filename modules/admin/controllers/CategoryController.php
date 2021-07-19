<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\Categ_Form;
use app\models\Seosearch_Form;
use app\models\Seosearchtable_Form;

/**
 * CategoryController implements the CRUD actions for AdressUser model.
 */
class CategoryController extends Controller
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
    public function actionIndex($section)
    {
        $category = new Category();
        $category->section = 'category';
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->orderBy(['category'=>'qwewer','subcategory'=>'sdfklbnm'])
               // ->addOrderBy([]),
        ]);
        
        $query_1 = new Query();
        $seo_search = $query_1->from(['seo_search'])
                ->orderBy(['id'=>SORT_DESC]);
        
        $query_2 = new Query();
        $seo_search_category = $query_2->from(['seo_search_category'])
                ->orderBy(['id'=>SORT_DESC]);
        
        $query_3 = new Query();
        $seo_search_subcategory = $query_3->from(['seo_search_subcategory'])
                ->orderBy(['id'=>SORT_DESC]);
        
        $query_4 = new Query();
        $seo_search_type_of_subcategory = $query_4->from(['seo_search_type_of_subcategory'])
                ->orderBy(['id'=>SORT_DESC]);
        
        $dataProvider_1 = new ActiveDataProvider([
            'query'=>$seo_search,]);
        
        $dataProvider_2 = new ActiveDataProvider([
            'query'=>$seo_search_category,]);
        
        $dataProvider_3 = new ActiveDataProvider([
            'query'=>$seo_search_subcategory,]);
        
        $dataProvider_4 = new ActiveDataProvider([
            'query'=>$seo_search_type_of_subcategory,]);
        
        $table_1 = new Categ_Form();
        if($table_1->load(Yii::$app->request->post()) && $table_1->validate())
        {
            //$table_1->valid_categ();
            $data = Yii::$app->request->post();
            $table_1->write_update_delet($data['Categ_Form']);
        }
        
        $table_2 = new Seosearch_Form();
        if($table_2->load(Yii::$app->request->post()) && $table_2->validate())
        {
            //$table_1->valid_categ();
            $data = Yii::$app->request->post();
            $table_2->write_update_delet($data['Seosearch_Form']);
        }
        
        $table_3 = new Seosearchtable_Form();
        if($table_3->load(Yii::$app->request->post()) && $table_3->validate())
        {
            $data = Yii::$app->request->post();
            $table_3->write_update_delet($data['Seosearchtable_Form']);
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,'dataProvider_1' => $dataProvider_1,
            'dataProvider_2' => $dataProvider_2,'dataProvider_3' => $dataProvider_3,
            'dataProvider_4' => $dataProvider_4,
            'section' => $section,
            'table_1' => $table_1,
            'table_2' => $table_2,
            'table_3' => $table_3,
        ]);
    }

    /**
     * Displays a single AdressUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $section, $my_seo_category)
    {
        $my_model = $this->findModel($id, $section, $my_seo_category);
        //debug($my_model);
        //die();
        return $this->render('view', [
            'model' => $my_model,
            'section' => $section,'my_seo_category' => $my_seo_category,
        ]);
    }

    /**
     * Creates a new AdressUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($section,$my_seo_category)
    {
        $model = new Category();
        switch($section){
            
            case 'category':
                $model_query['id']                    = null;
                $model_query['category']              = null;
                $model_query['subcategory']           = null;
                $model_query['category_english']      = null;
                $model_query['type_of_subcategory']   = null;
                $model_query['link_category']         = null;
                $model_query['link_subcategory']      = null;
                $model_query['link_type_subcategory'] = null;
                $model_query['id_seo_search_category']            = null;
                $model_query['id_seo_search_subcategory']         = null;           
                $model_query['id_seo_search_type_of_subcategory'] = null;
                $model->section ='category';
                
                if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id, 'section' => $section,'my_seo_category'=>$my_seo_category]);
                }
            break;
                
            case 'search':
                $model->section = 'search';
                $model_query['id']              = null;
                $model_query['teg_title']       = null;
                $model_query['teg_keywords']    = null;
                $model_query['teg_description'] = null;
                $model_query['my_comment']      = null;
                $model_query['type_category']   = null;
                
                //if( //Yii::$app->request->isPost )
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $post = Yii::$app->request->post();
                    $data = $post['Category'];
                    Yii::$app->db->createCommand()->insert('seo_search',
                            ['teg_title' => $data['teg_title'], 'teg_keywords' => $data['teg_keywords'],
                                'teg_description' => $data['teg_description'], 'my_comment' => $data['my_comment'],
                                'type_category' => $data['type_category']
                                ])->execute();
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section, 'my_seo_category'=>$my_seo_category]);
                }
            break;
            case 'search_category':
                $model->section = 'search_category';
                $model->my_type_category = $my_seo_category;
                $model_query['id']              = null;
                $model_query['teg_title']       = null;
                $model_query['teg_keywords']    = null;
                $model_query['teg_description'] = null;
                $model_query['my_comment']      = null;
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    //return $this->redirect(['view', 'id' => $model->id, 'section' => $section,'my_seo_category'=>$my_seo_category]);
                    
                    $table ='';
                    $post = Yii::$app->request->post();
                    $data = $post['Category'];
                    switch($my_seo_category)
                    {
                        case 'search_category':
                            $table = 'seo_search_category';
                        break;
                        case 'search_subcategory':
                            $table = 'seo_search_subcategory';
                        break;
                        case 'search_type_of_subcategory':
                            $table = 'seo_search_type_of_subcategory';
                        break;
                        default:
                            $table = 'seo_search_category';
                        break;
                    }
                    Yii::$app->db->createCommand()->insert($table,
                            ['teg_title' => $data['teg_title'], 'teg_keywords' => $data['teg_keywords'],
                                'teg_description' => $data['teg_description'], 'my_comment' => $data['my_comment'],
                                ])->execute();
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section, 'my_seo_category'=>$my_seo_category]);
                }
            break;
        
                
        }
        

        return $this->render('create', [
            'model' => $model,'section' => $section,'model_query' => $model_query,'my_seo_category'=>$my_seo_category
        ]);
    }

    /**
     * Updates an existing AdressUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $section, $my_seo_category)
    {
        $model_query = $this->findModel($id, $section, $my_seo_category);
        //debug($model_query);
        //debug($model_query['id']);
        //die();
        $model = new Category();
        //debug('hello');
        //die();
        switch($section){
            case ('category'):
                /*
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    
                    return $this->redirect(['view', 'id' => $model->id]);
                }*/
                $model->section = 'category';
                if( $model->load(Yii::$app->request->post()) /*Yii::$app->request->isPost*/ && $model->validate())
                {
                    //debug($model->validate());
                    //die();
                    $post = Yii::$app->request->post();
                    $data = $post['Category'];
                    Yii::$app->db->createCommand()->update('category', 
                            ['category' => $data['category'], 'subcategory' => $data['subcategory'],
                                'category_english' => $data['category_english'], 'type_of_subcategory' => $data['type_of_subcategory'],
                                 'link_category' => $data['link_category'],'link_subcategory' => $data['link_subcategory'],
                                'link_type_subcategory' => $data['link_type_subcategory'],'id_seo_search_category' => $data['id_seo_search_category'],
                                'id_seo_search_subcategory' => $data['id_seo_search_subcategory'],'id_seo_search_type_of_subcategory' => $data['id_seo_search_type_of_subcategory'],
                                ],"id=$id")->execute();
                    return $this->redirect(['view', 'id' => $data['id'], 'section' => $section,'my_seo_category'=>$my_seo_category]);
                }
                
            break;
            case ('search'):
                $model->section = 'search';
                $post = Yii::$app->request->post();
                //debug($post);
                //debug($model->load(Yii::$app->request->post()));
                //debug($model->validate());
                //die();
                //if(Yii::$app->request->isPost)
                if( $model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $post = Yii::$app->request->post();
                    $data = $post['Category'];
                    Yii::$app->db->createCommand()->update('seo_search', 
                            ['teg_title' => $data['teg_title'], 'teg_keywords' => $data['teg_keywords'],
                                'teg_description' => $data['teg_description'], 'my_comment' => $data['my_comment'],
                                'type_category' => $data['type_category']
                                ],"id=$id")->execute();
                    
                    return $this->redirect(['view', 'id' => $data['id'], 'section' => $section,'my_seo_category'=>$my_seo_category]);
                }
                
            break;
            case('search_category'):
                $model->section = 'search_category';
                if($model->load(Yii::$app->request->post()) && $model->validate()) {
                    //return $this->redirect(['view', 'id' => $model->id, 'section' => $section,'my_seo_category'=>$my_seo_category]);
                    
                    $table ='';
                    $post = Yii::$app->request->post();
                    $data = $post['Category'];
                    
                    switch($my_seo_category)
                    {
                        case 'search_category':
                            $table = 'seo_search_category';
                        break;
                        case 'search_subcategory':
                            $table = 'seo_search_subcategory';
                        break;
                        case 'search_type_of_subcategory':
                            $table = 'seo_search_type_of_subcategory';
                        break;
                        default:
                            $table = 'seo_search_category';
                        break;
                    }
                    Yii::$app->db->createCommand()->update($table,
                            ['teg_title' => $data['teg_title'], 'teg_keywords' => $data['teg_keywords'],
                                'teg_description' => $data['teg_description'], 'my_comment' => $data['my_comment'],
                                ],"id=$id")->execute();
                    //$id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section, 'my_seo_category'=>$my_seo_category]);
                }
                
                break;
        }
        //die();
        return $this->render('update', [
            'model' => $model, 'model_query' => $model_query,
            'section' => $section,'my_seo_category'=>$my_seo_category,
        ]);
    }
    public function actionExperience()
    {
        $category = new \app\models\SeoCategory();
        if(Yii::$app->request->isPost &&
            $category->load(Yii::$app->request->post()) && $category->validate() )
        {
            $data = Yii::$app->request->post();
            debug($data);
            die();
        }
        //debug($category);
        //die();
        return $this->render('experience',compact('category')); 
    }

    /**
     * Deletes an existing AdressUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $section, $my_seo_category)
    {
        switch($section)
        {
            case('category'):
                Yii::$app->db->createCommand()->delete('category',"id = $id")->execute();
                return $this->redirect(['index', 'section'=>'category','my_seo_category'=>null]);
            break;
            case('search'):
                Yii::$app->db->createCommand()->delete('seo_search',"id = $id")->execute();
                return $this->redirect(['index', 'section'=>'category','my_seo_category'=>null]);
            break;
            case('search_category'):
                switch ($my_seo_category)
                {
                    case('search_category'):
                        Yii::$app->db->createCommand()->delete('seo_search_category',"id = $id")->execute();
                        return $this->redirect(['index', 'section'=>'category','my_seo_category'=>null]);
                    break;
                    case('search_subcategory'):
                        Yii::$app->db->createCommand()->delete('seo_search_subcategory',"id = $id")->execute();
                        return $this->redirect(['index', 'section'=>'category','my_seo_category'=>null]);
                    break;
                    case('search_type_of_subcategory'):
                        Yii::$app->db->createCommand()->delete('seo_search_type_of_subcategory',"id = $id")->execute();
                        return $this->redirect(['index', 'section'=>'category','my_seo_category'=>null]);
                    break;
                        
                }
                
                
            break;
        
        }
        
        //$this->findModel($id)->delete();

        return $this->redirect(['index','section'=>$section,'my_seo_category'=>$my_seo_category]);
    }

    /**
     * Finds the AdressUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdressUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $section,$my_seo_category)
    {
        switch($section)
        {
            case('category'):
                /*
                if (($model = Category::findOne($id)) !== null) {
                    return $model;
                }
                 * 
                 */
                $query_1 = new Query();
                $model = $query_1->from(['category'])->where(['id'=>$id])
                        ->one();
            break;
            
            case('search'):
                $query_1 = new Query();
                $model = $query_1->from(['seo_search'])
                ->where(['id'=>$id])->one();
            break;
            case('search_category'):
                switch ($my_seo_category)
                {
                    case('search_category'):
                        $query_1 = new Query();
                        $model = $query_1->from(['seo_search_category'])
                        ->where(['id'=>$id])->one();
                    break;
                    case('search_subcategory'):
                        $query_1 = new Query();
                        $model = $query_1->from(['seo_search_subcategory'])
                        ->where(['id'=>$id])->one();
                    break;
                    case('search_type_of_subcategory'):
                        $query_1 = new Query();
                        $model = $query_1->from(['seo_search_type_of_subcategory'])
                        ->where(['id'=>$id])->one();
                    break;
                        
                }
                
                
            break;
        
            default :
                $model = null;
            break;
        
        }
        if($model !== null){
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}