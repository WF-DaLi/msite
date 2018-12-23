<?php
    namespace  backend\controllers\admin;

    use Yii;
    use yii\db\Query;
    use backend\controllers\AdminController;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use common\models\User;

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
                            'actions' => ['lists','add','addsass','importexcel'],
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
	        $query = new Query;//Sass::find();
            $res = $query->select(['id', 'username','email','userimg','created_at','updated_at','status','userstatus'])
                        ->from('user')
                        ->orderBy('id')
                        ->all();
//            var_($res);die;
            return $this->render('/sass/lists',['sass'=>json_encode($res,JSON_UNESCAPED_UNICODE )]);
        }
        public function actionAdd()
        {
            return $this->render('/sass/addSass');
        }

        public function actionAddsass()
        {
            $sassName = Yii::$app->request->post('name');
            if(!empty($sassName)){
                $sass = new Sass();
                $sass->name = $sassName;
                $sass->save();
            }
        }
    }
