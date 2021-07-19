<?php
namespace app\controllers;

use Yii;
use app\models\ManagerForm;
use app\models\ManagerShop;

class MoneyController extends AppController{
    
    public function actionOplata(){
        $manage_form = new ManagerForm();
        
        if( $manage_form->load(Yii::$app->request->post()) && $manage_form->validate() )
        {
            if(Yii::$app->session->has('data_product'))
            {
                $data = Yii::$app->request->post();
                
                $session = Yii::$app->session->get('data_product');
                debug($data);
                debug($session);
                $price = end($session['data']);
                debug($price);
                
                //$manage_form->write_order($data['ManagerForm'], $session);
                die();
                $number_order = Yii::$app->db->getLastInsertID();
                debug($number_order);
                //$price = $data[1]; $number_order = $data[2];
                $oplata = $manage_form->Oplata($price, $number_order);
                //Yii::$app->session->setFlash('purchase_of_goods',"Покупка совершена");
                $mrh_login = $oplata[0]; $out_summ = $oplata[3]; $inv_id = $number_order; $inv_desc = $oplata[2]; $crc = $oplata[7];
                $shp_item = $oplata[4]; $in_curr = $oplata[5]; $culture = $oplata[6];
                return $this->render('oplata',compact('mrh_login','out_summ','inv_id','inv_desc', 'crc',
                        'shp_item','in_curr','culture'));
            }
            
            
        }
        
    }
    
    public function actionResult()
    {
        $manage_form = new ManagerForm();
        $manage_form->result_pay();
        return $this->goHome();
    }
    
    public function actionSuccess()
    {
        $manage_form = new ManagerForm();
        $manage_form->success();
        
        return $this->goHome();
    }
    
    public function actionFail()
    {
        $inv_id = Yii::$app->request->post('InvId');//$_REQUEST["InvId"];
        echo "Вы отказались от оплаты. Заказ# $inv_id\n";
        //echo "You have refused payment. Order# $inv_id\n";
        $model = ManagerShop:: findOne(['id'=>$inv_id]);
        $model->pay_order = "Отказ оплаты";
        $model->save();
        return $this->goHome();
        
    }
}
