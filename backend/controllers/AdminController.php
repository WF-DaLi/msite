<?php
namespace  backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * admin controller
 */
class AdminController extends Controller
{

        public $user = '';
        public $uid = 0 ;

        public function init()
        {
            $this->user = Yii ::$app->user->identity->username?? '';
//            var_dump(Yii::$app->user);
	    //$this->user = 'admin';
        }







}
