<?php
/**
 * Created by PhpStorm.
 * User: 222
 * Date: 14.10.2019
 * Time: 14:38
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\Url;
use Yii;


class UploadsForm extends Model
{
    public $files;
    public $directory;
    
    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg,tiff,png,jpeg',
                'maxFiles' => 20],
            [['directory'], 'string', 'max' => 120],
            [['directory'],'required'],
        ];
    }

    public function upload_image($data, $directory)
    {
        //debug($data);
        //debug($directory);
        
        //debug('Сохраняем');
        
        //обрабатываем данные для сохранения
        
        $field = ['path','comment','category'];
        $mass_save = []; $i = 0;
        $search_path = [];
        foreach($data as $image)
        {

            switch($directory)
            {

                case 'audio':
                    $mass_save[$i][0] = 'img/audio/'.$image->name;
                    $search_path[$i]  = 'img/audio/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Audio';

                    break;
                case 'camera':
                    $mass_save[$i][0] = 'img/camera/'.$image->name;
                    $search_path[$i]  = 'img/camera/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Camera';

                    break;
                case 'notebook':
                    $mass_save[$i][0] = 'img/notebook/'.$image->name;
                    $search_path[$i]  = 'img/notebook/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Notebook';

                    break;
                case 'smartiphone':
                    $mass_save[$i][0] = 'img/smartiphone/'.$image->name;
                    $search_path[$i]  = 'img/smartiphone/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Smartiphone';
                    
                    break;
                case 'tablets':
                    $mass_save[$i][0] = 'img/tablets/'.$image->name;
                    $search_path[$i]  = 'img/tablets/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Tablets';
                    
                    break;
                case 'tv':
                    $mass_save[$i][0] = 'img/tv/'.$image->name;
                    $search_path[$i]  = 'img/tv/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Tv';
                    
                    break;
                case 'videocamera':
                    $mass_save[$i][0] = 'img/videocamera/'.$image->name;
                    $search_path[$i]  = 'img/videocamera/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Videocamera';
                    
                    break;
                default:
                    $mass_save[$i][0] = 'img/different_image/'.$image->name;
                    $search_path[$i]  = 'img/different_image/'.$image->name;
                    $mass_save[$i][1] = '';
                    $mass_save[$i][2] = 'Different';
                    break;
            }
            $i++;
        }
        //Проверяем базу данных на наличие новых данных в базе
        
        $search = Image::findAll(['path' => $search_path]);

        if($search != null)
        {
            return [$search,'no'];
        }
        else
        {
            //сохраняем результат в директориях на сервере
            /*
            foreach($mass_save as $path_save)
            {
                $path_save->saveAs($path_save[0]);
            }
            */
            $i = 0;
            foreach($data as $image)
            {
                $image->saveAs($mass_save[$i][0]);
                $i++;
            }
            //Сохраняем в базе данных
            Yii::$app->db->createCommand()->batchInsert(Image::tableName(), $field, $mass_save )->execute();
        }
    
        return [true, 'true'];
    
    }

    

}