<?php
namespace backend\controllers\common;

use Yii;
use yii\web\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;

class UploadController extends Controller 
{
	public	function actionUpload()
	{
	   $model = new UploadForm();
       if (Yii::$app->request->isPost) {
            if ($model->upload()) {
                return $model->filePath;
            }
        }
	}							

}
