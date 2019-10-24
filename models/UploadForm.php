<?php


namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
/**
 * @var UploadedFile[]
 */

public $imageFiles;

 public function rules(){
     return[
         [['imageFiles'],'file','skipOnEmpty' => false, 'extensions' => 'png,jpg','maxFiles'=>7],
     ];
 }

 public function upload(){
     //if($this->validate()){
         foreach ($this->imageFiles as $file){
             $file->saveAs('images/gallery/' .$file->baseName .'.'.$file->extension);
         }
      //   return true;
    //}else{
     //   return false;
    // }
 }
}