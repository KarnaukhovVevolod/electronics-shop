<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\EditinginfoForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Audio;
use yii\db\Query;

/**
 * EditinginfoController implements the CRUD actions for AdressUser model.
 */
class EditinginfoController extends Controller
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
                    //'delete' => ['POST'], //запрещает метод на странице (ошибка 405)
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
        switch($section){
            case('about'):
                $query_1 = new Query();
                $about = $query_1->from(['about_company'])
                    ->orderBy(['id'=>SORT_ASC]);
            break;
            
            case('employee'):
                $query_1 = new Query();
                $employee = $query_1->from(['employee_serial_number']);
                $query_2 = new Query();
                $facebook = $query_2->from(['facebook']);
                $query_3 = new Query();
                $instagram = $query_3->from('instagram');
                $query_4 = new Query();
                $name_employee = $query_4->from('name_employee');
                
                $query_5 = new Query();
                $ok = $query_5->from('ok');
                $query_6 = new Query();
                $surname_employee = $query_6->from('surname_employee');
                $query_7 = new Query();
                $twitter = $query_7->from('twitter');
                $query_8 = new Query();
                $vk = $query_8->from('vk');
                
                $query_9 = new Query();
                $position_employee = $query_9->from('position_employee');
                $query_10 = new Query();
                $position_em = $query_10->from('position_em');
                
                //data_provider
                $dataProvider_1 = new ActiveDataProvider([
                'query' => $employee,]);
                $dataProvider_2 = new ActiveDataProvider([
                'query' => $facebook,]);
                $dataProvider_3 = new ActiveDataProvider([
                'query' => $instagram,]);
                $dataProvider_4 = new ActiveDataProvider([
                'query' => $name_employee,]);
                
                $dataProvider_5 = new ActiveDataProvider([
                'query' => $ok,]);
                $dataProvider_6 = new ActiveDataProvider([
                'query' => $surname_employee,
                    'pagination'=>[
                        'pageSize'=>15,
                    ]]);
                $dataProvider_7 = new ActiveDataProvider([
                'query' => $twitter,]);
                $dataProvider_8 = new ActiveDataProvider([
                'query' => $vk,]);
                
                $dataProvider_9 = new ActiveDataProvider([
                'query' => $position_employee,]);
                $dataProvider_10 = new ActiveDataProvider([
                'query' => $position_em,]);
                
                return $this->render('index', [
            'dataProvider_1' => $dataProvider_1,'section'=>$section,'dataProvider_2' => $dataProvider_2,'dataProvider_3' => $dataProvider_3,
                    'dataProvider_4' => $dataProvider_4,'dataProvider_5' => $dataProvider_5,'dataProvider_6' => $dataProvider_6,'dataProvider_7' => $dataProvider_7,
                    'dataProvider_8' => $dataProvider_8,'dataProvider_9' => $dataProvider_9,'dataProvider_10' => $dataProvider_10,
            ]);
                
            break;        
            
        }
        $dataProvider = new ActiveDataProvider([
                'query' => $about,
            ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,'section'=>$section
        ]);
    }

    
    public function actionView($id,$section)
    {
        return $this->render('view', [
            'model' => $this->findModel($id,$section),
            'section' => $section,
        ]);
    }

    /**
     * Creates a new AdressUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($section)
    {
        $model = new EditinginfoForm();
        $model_query = null;
        
        switch($section)
        {
            case('about'):
                $model->section='about';
                $model_query['id'] = null; $model_query['heading'] = null;
                $model_query['path'] = null; $model_query['adress_photo'] = null;
                $model_query['show_'] = null; $model_query['text'] = null; $model_query['adress_text']  = null;
                $model_query['name_company'] = null; $model_query['telephone_company'] = null; $model_query['street_company'] = null; $model_query['item_company'] = null;
                $model_query['region_company'] = null; $model_query['post_code'] = null;
                $model->section = 'about';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('about_company',
                    ['heading' => $post['heading'] ,'text' => $post['text'],
                        'path' => $post['path'],'show_' => $post['show_'],
                        'adress_photo' => $post['adress_photo'],'adress_text' => $post['adress_text'],
                        'name_company' => $post['name_company'],'telephone_company' => $post['telephone_company'],
                        'street_company' => $post['street_company'], 'item_company'=>$post['item_company'],
                        'region_company' => $post['region_company'],'post_code' => $post['post_code']])
                            ->execute();
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            
            case('employee_serial_number'):
                $model->section = 'employee_serial_number';
                $model_query['id'] = null; $model_query['number_employee'] = null;
                $model_query['id_name'] = null; $model_query['id_surname'] = null;
                $model_query['position'] = null; $model_query['id_link_vk'] = null; $model_query['id_link_twitter']  = null;
                $model_query['id_link_facebook'] = null; $model_query['id_link_ok'] = null;
                $model_query['id_link_instagram'] = null; $model_query['id_path'] = null;
                $model->section = 'employee_serial_number';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                { 
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('employee_serial_number',
                    ['number_employee' => $post['number_employee'] ,'id_name' => $post['id_name'],
                        'id_surname' => $post['id_surname'],'position' => $post['position'],
                        'id_link_vk' => $post['id_link_vk'],'id_link_twitter' => $post['id_link_twitter'],
                        'id_link_facebook' => $post['id_link_facebook'],'id_link_ok' => $post['id_link_ok'],
                        'id_link_instagram' => $post['id_link_instagram'],'id_path' => $post['id_path'],
                        ])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('facebook'):
                $model_query['id'] = null; $model_query['facebook'] = null;
                $model->section = 'facebook';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('facebook',
                    ['facebook' => $post['facebook']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('instagram'):
                $model_query['id'] = null; $model_query['instagram'] = null;
                $model->section = 'instagram';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    
                    Yii::$app->db->createCommand()->insert('instagram',
                    ['instagram' => $post['instagram']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    
                    return $this->redirect(['view', 'id' => $id,'section' => $section] );
                }
                
            break;
            case('name_employee'):
                $model_query['id'] = null; $model_query['name'] = null;
                $model->section = 'name_employee';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('name_employee',
                    ['name' => $post['name']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('ok'):
                $model_query['id'] = null; $model_query['ok'] = null;
                $model->section = 'ok';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('ok',
                    ['ok' => $post['ok']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('surname_employee'):
                $model_query['id'] = null; $model_query['surname'] = null;
                $model->section = 'surname_employee';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('surname_employee',
                    ['surname' => $post['surname']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('twitter'):
                $model_query['id'] = null; $model_query['twitter'] = null;
                $model->section = 'twitter';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('twitter',
                    ['twitter' => $post['twitter']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('vk'):
                $model_query['id'] = null; $model_query['vk'] = null;
                $model->section = 'vk';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('vk',
                    ['vk' => $post['vk']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('position_employee'):
                $model_query['id'] = null; $model_query['position'] = null;
                $model->section = 'position_employee';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('position_employee',
                    ['position' => $post['position']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
            case('position_em'):
                $model_query['position_id'] = null; $model_query['employee_position'] = null;
                $model_query['id'] = null;
                $model->section = 'position_em';
                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->insert('position_em',
                    ['position_id' => $post['position_id'],
                        'employee_position' => $post['employee_position']])->execute();
                    
                    $id = Yii::$app->db->getLastInsertID();
                    return $this->redirect(['view', 'id' => $id, 'section' => $section]);
                }
                
            break;
        }
        
        
        return $this->render('create', [
            'model' => $model,'model_query' => $model_query,
            'section'=>$section,
        ]);
    }

    /**
     * Updates an existing AdressUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$section)
    {
        $model_query = $this->findModel($id,$section);
        $model = new EditinginfoForm();
        switch($section){
            case('about'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    //$url = Yii::$app->request->url;

                    Yii::$app->db->createCommand()->update('about_company',
                    ['id' => $post['id'],'heading' => $post['heading'] ,'text' => $post['text'],
                        'path'=>$post['path'],'show_'=>$post['show_'],
                        'adress_photo'=>$post['adress_photo'],'adress_text' =>$post['adress_text'],
                        'name_company' => $post['name_company'],'telephone_company' => $post['telephone_company'],
                        'street_company' => $post['street_company'], 'item_company'=>$post['item_company'],
                        'region_company' => $post['region_company'], 'post_code' => $post['post_code']],"id=$id")
                            ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'about';
            break;
            case('employee_serial_number'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    $url = Yii::$app->request->url;

                    Yii::$app->db->createCommand()->update('employee_serial_number',
                    ['id' => $post['id'],'number_employee' => $post['number_employee'] ,'id_name' => $post['id_name'],
                        'id_surname'=>$post['id_surname'],'position'=>$post['position'],
                        'id_link_vk'=>$post['id_link_vk'],'id_link_twitter' =>$post['id_link_twitter']
                            ,'id_link_facebook' =>$post['id_link_facebook'],'id_link_ok' =>$post['id_link_ok'],
                        'id_link_instagram' =>$post['id_link_instagram'],'id_path' =>$post['id_path']],"id=$id")
                            ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'employee_serial_number';
            break;
            case('facebook'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->update('facebook',
                    ['id' => $post['id'],'facebook' => $post['facebook']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id'=>$data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'facebook';
            break;
            case('instagram'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];

                    Yii::$app->db->createCommand()->update('instagram',
                    ['id' => $post['id'],'instagram' => $post['instagram']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'instagram';
            break;
            case('name_employee'):
                $model->section = 'name_employee';
                //debug('name 1');
                //die();
                if ($model->load(Yii::$app->request->post()) && $model->validate())
                //if(Yii::$app->request->isPost)    
                {
                    //debug('name');
                    //die();
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('name_employee',
                    ['id' => $post['id'],'name' => $post['name']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                elseif($model->load(Yii::$app->request->post())){
                    $model_query['name'] = $model->name;
                }
            break;
            case('ok'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('ok',
                    ['id' => $post['id'],'ok' => $post['ok']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'ok';
            break;
            case('surname_employee'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('surname_employee',
                    ['id' => $post['id'],'surname' => $post['surname']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'surname_employee';
            break;
            case('twitter'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('twitter',
                    ['id' => $post['id'],'twitter' => $post['twitter']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'twitter';
            break;
            case('vk'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('vk',
                    ['id' => $post['id'],'vk' => $post['vk']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'vk';
            break;
            case('position_employee'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('position_employee',
                    ['id' => $post['id'],'position' => $post['position']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'position_employee';
            break;
            case('position_em'):
                if (Yii::$app->request->isPost)
                {
                    $data = Yii::$app->request->post();
                    $post = $data['EditinginfoForm'];
                    Yii::$app->db->createCommand()->update('position_em',
                    ['id' => $post['id'], 'position_id' => $post['position_id'],'employee_position' => $post['employee_position']],"id=$id")
                    ->execute();

                    return $this->redirect(['view', 'id' => $data['EditinginfoForm']['id'], 'section' => $section]);
                }
                $model->section = 'vk';
            break;
        }
        //debug('end');debug($model_query);//die();
        
        return $this->render('update', [
            'model' => $model,'model_query' => $model_query,
            'section' => $section
        ]);
    }

    /**
     * Deletes an existing AdressUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$section)
    {
        switch($section)
        {
            case('about'):
                Yii::$app->db->createCommand()->delete('about_company',"id = $id")->execute();
                return $this->redirect(['index','section'=>'about']);
            break;
            case('employee_serial_number'):
                Yii::$app->db->createCommand()->delete('employee_serial_number',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('facebook'):
                Yii::$app->db->createCommand()->delete('facebook',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('instagram'):
                Yii::$app->db->createCommand()->delete('instagram',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('name_employee'):
                Yii::$app->db->createCommand()->delete('name_employee',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('ok'):
                Yii::$app->db->createCommand()->delete('ok',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('surname_employee'):
                Yii::$app->db->createCommand()->delete('surname_employee',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('twitter'):
                Yii::$app->db->createCommand()->delete('twitter',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('vk'):
                Yii::$app->db->createCommand()->delete('vk',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('position_employee'):
                Yii::$app->db->createCommand()->delete('position_employee',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            case('position_em'):
                Yii::$app->db->createCommand()->delete('position_em',"id = $id")->execute();
                return $this->redirect(['index','section'=>'employee']);
            break;
            
        }
        //Yii::$app->db->createCommand()->delete('about_company',"id = $id")->execute();
        return $this->redirect(['index','section'=>'about']);
    }

    /**
     * Finds the AdressUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdressUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id,$section)
    {
        $query_1 = new Query();
        $model = null;
        switch($section)
        {
            case('about'):
                $model = $query_1->from(['about_company'])
                ->where(['id' => $id])->one();
                break;
            case ('employee_serial_number'):
                $model = $query_1->from(['employee_serial_number'])
                ->where(['id' => $id])->one();
            break;
            case ('facebook'):
                $model = $query_1->from(['facebook'])
                ->where(['id' => $id])->one();
            break;
            case ('instagram'):
                $model = $query_1->from(['instagram'])
                ->where(['id' => $id])->one();
            break;
            case ('name_employee'):
                $model = $query_1->from(['name_employee'])
                ->where(['id' => $id])->one();
            break;
            case ('surname_employee'):
                $model = $query_1->from(['surname_employee'])
                ->where(['id' => $id])->one();
            break;
            case ('twitter'):
                $model = $query_1->from(['twitter'])
                ->where(['id' => $id])->one();
            break;
            case ('vk'):
                $model = $query_1->from(['vk'])
                ->where(['id' => $id])->one();
            break;
            case ('ok'):
                $model = $query_1->from(['ok'])
                ->where(['id' => $id])->one();
            break;
            case ('position_employee'):
                $model = $query_1->from(['position_employee'])
                ->where(['id' => $id])->one();
            break;
            case ('position_em'):
                $model = $query_1->from(['position_em'])
                ->where(['id' => $id])->one();
            break;
            default :
                $model = null;
            break;    
            
        }
        
        if ($model !== null) {
            return $model;
        }
        

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}