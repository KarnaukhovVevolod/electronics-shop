<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Notebook;
use app\models\Tablet;
use app\models\Audio;
use app\models\Camera;
use app\models\Tv;
use app\models\Smartiphone;
use app\models\VideoCamera;
use yii\data\Pagination;
use yii\db\Query;


class ModelDatabase extends ActiveRecord {
    
    public function readDatabase($data,$limit){
        
        $where = [];
        $i = 0;
        $count = count($data['FiltersForm'])-1;
        foreach($data['FiltersForm'] as $filt )
        {
            if($filt != null && $i>1 && $i != $count)
            {
                $where[array_search($filt, $data['FiltersForm'])] = $filt;
            } 
            $i++;
        }
        //debug($data['FiltersForm']['category']);
        //die();
        //debug($where);
        //debug($data['FiltersForm']);
        //die();
        switch ($data['FiltersForm']['category']) {
            case 'notebook':
                /*
                $query = Notebook::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                */
                 $query = (new Query())->from('notebook')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                //$product = Notebook::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                //    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC'])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();

                break;
            
            case 'tablets':
                /*
                $query = Tablet::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                */
                $query = (new Query())->from('tablet')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                
                break;
            case 'audio':
                /*
                $query = Audio::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                    */
                $query = (new Query())->from('audio')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
                
            
            case 'camera':
                /*
                $query = Camera::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);*/
                $query = (new Query())->from('camera')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'tv':
                /*
                $query = Tv::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                 * 
                 */
                $query = (new Query())->from('tv')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'smartiphone':
                /*
                $query = Smartiphone::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                 * 
                 */
                $query = (new Query())->from('smartiphone')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                
                break;
            case 'videocamera':
                /*
                $query = VideoCamera::find()->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                */
                $query = (new Query())->from('videocamera')->where($where)->andWhere([ "AND" ,['>=','price_sort', $data['FiltersForm']['price_min']],
                    ['<=','price_sort',$data['FiltersForm']['price_max']]])->orderBy(['price_sort'=>'ASC']);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                
                break;
            
            default:
                break;
        }
        //debug($product);
        //debug($where);
        //die();
        
        return [$product, $pages];
    }
}
