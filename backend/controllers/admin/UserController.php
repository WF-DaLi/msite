<?php
    namespace  backend\controllers\admin;

    use Yii;
    use yii\db\Query;
    use backend\controllers\AdminController;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use common\models\User;
    use common\models\UserForm;

     /**
     * coupon controller
     */
    class UserController extends AdminController
    {
        public $enableCsrfValidation = false;
        /**
         * {@inheritdoc}
         */
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['lists','checkuserexist','add','adduser','addsass','importexcel','updatestatus','updateuser'],
                            'allow' => true,
                            'roles' => ['@'],
                        ]
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post'],
                        't' => ['post'],
                    ],
                ],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
            ];
        }

    
        public function actionLists()
        {
		$model = new UserForm();
	        $query = new Query;
            $res = $query->select(['id', 'username','email','userimg','created_at','updated_at','status','userstatus'])
                        ->from('user')
                        ->orderBy('id')
                        ->all();
            return $this->render('/user/lists',
			['users'=>json_encode(array_column($res,null,'uid'),JSON_UNESCAPED_UNICODE),
			 'model'=>$model,
			'role'=>json_encode([['id'=>1,'name'=>'管理员'],['id'=>2,'name'=>'普通用户']],JSON_UNESCAPED_UNICODE)
			]
			);
        }
	
	public function actionAdduser()
	{
	     $user = new UserForm();
	     $user->username = Yii::$app->request->post('username');
	     $user->password = Yii::$app->request->post('password');
             $user->status = Yii::$app->request->post('role');
	     $user->userstatus = Yii::$app->request->post('status');
	     $user->email = Yii::$app->request->post('email');	
	     $user->adduser(false);	
         }
	
	public function actionUpdateuser()
	{
	     $uid = Yii::$app->request->post('uid');
	     if(!empty($uid)){
             $user = User::findOne($uid);
             $user->username = Yii::$app->request->post('username');
             $user->setPassword(Yii::$app->request->post('password'));
             $user->status = Yii::$app->request->post('role');
             $user->userstatus = Yii::$app->request->post('status');
             !empty(Yii::$app->request->post('email'))? $user->email =  Yii::$app->request->post('email'):'';
             $user->save(false);
             return 'ok';
         }else{
             return 'error';
         }
	}

	public function actionUpdatestatus()
	{	
	     $uid = Yii::$app->request->post('uid');	
	     $status = Yii::$app->request->post('status');
	     if($uid > 0 ){
//	        $user = User::findOne($uid);
            $user = User::find()->where(['id' =>$uid])->one();
            $user->userstatus = $status;
	        $user->save();
	     }	
	}		
	public function actionCheckuserexist()
	{
	      $userName = Yii::$app->request->post('uname');
	      $query = new Query();
	      $user = $query->select(['id'])->from('user')->where(['username'=>$userName])->count();
	      if($user > 0){
		 return true;
              }else{
		return false;
	      }
	    
	}	
    }
