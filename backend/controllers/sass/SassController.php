<?php
    namespace  backend\controllers\sass;

    use Yii;
    use yii\db\Query;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use backend\models\sass\Sass;
    use yii\web\User;
    use backend\controllers\AdminController;

     /**
     * coupon controller
     */
    class SassController extends AdminController
    {
        public $enableCsrfValidation = false;
        public $layout_user;
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
                            'actions' => ['lists','add','addsass','importexcel','updatestatus'],
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
         //   $this->layout_user = Yii::$app->user->identity->username;
	        $query = new Query;
            $res = $query->select(['id', 'name','status'])
                        ->from('sass')
						->where(['status'=>[0,1]])
                        ->orderBy('id')
                        ->all();
            return $this->render('/sass/lists',['sass'=>json_encode($res,JSON_UNESCAPED_UNICODE )]);
        }
        public function actionAdd()
        {
            return $this->render('/sass/addSass');
        }

        public function actionAddsass()
        {
            $sassName = Yii::$app->request->post('name');
            $logo = Yii::$app->request->post('logo');
            if(!empty($sassName)){
                $sass = new Sass();
                $sass->name = $sassName;
                $sass->logo = $logo;
                $sass->save();
            }	
        }
	public function actionUpdatestatus()
	{
	   $sassId = Yii::$app->request->post("sass_id");
	   $status = Yii::$app->request->post('status');
	   if(Yii::$app->request->post('sass_id')){
	        $sass = Sass::findOne($sassId);
		$sass->status = $status;
	        $sass->update();
	  }
	 // Yii::$app->response->sedFile('abc',22);
	}
    }
