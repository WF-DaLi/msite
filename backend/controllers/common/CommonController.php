<?php
namespace backend\controllers\common;

use Yii;
use yii\web\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;
use backend\controllers\AdminController;

class CommonController extends AdminController
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
