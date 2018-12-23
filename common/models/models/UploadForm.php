<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $imageFiles;
    public $filePath;
    public $fileDir = '/sites/advanced/backend/web/static/img/';

	public function upload()
	{
        move_uploaded_file($_FILES["file"]["tmp_name"],$this->fileDir.$_FILES["file"]["name"]);
        $this->filePath = $this->fileDir.$_FILES["file"]["name"];
        return true;
	}
}
