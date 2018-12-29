<?php
    namespace  backend\controllers\coupon;
    use Yii;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use yii\data\Pagination;
    use backend\models\coupon\Coupon;
    //use backend\models\coupon\CouponForm;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    use backend\controllers\AdminController;
    use yii\db\Query;
    use backend\models\sass\Sass;

     /**
     * coupon controller
     */
    class CouponController extends AdminController
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
                            'actions' => ['lists','add','addsass','fenxi','importexcel'],
                            'allow' => true,
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
	public function actionFenxi()
	{
		return $this->render('/fenxi/index.php');
	}
        public function actionLists()
        {

//	$phpExcel =  new IOFactory();
//	$excelReader = IOFactory::createReader('Xlsx');
//	$excelSheet = $excelReader->load('/tmp/abc.xlsx');
//	$currentSheet = $excelSheet->getActiveSheet();
//	$rowNum = $currentSheet->getHighestRow();

//	var_dump($rowNum);die;
	
//	var_dump($nt);die;
  //       var_dump($ok);die;


            $query = Coupon::find();
            $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $query->count(),
            ]);

            $res = $query->orderBy('product_id')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            $coupons = [];
            if(!empty($res)){
                $nt ;
                foreach($res as $couponItem){
                    $coupon['product_id'] = $couponItem['product_id'];
                    $coupon['name'] = $couponItem['name'];
                    $coupon['mainpic'] = $couponItem['mainpic'];
                    $coupon['itemUrl'] = $couponItem['itemUrl'];
                    $coupon['cate'] = $couponItem['cate'];
                    $coupon['price'] = $couponItem['price'];
                    $coupon['tbkUrl'] = $couponItem['tbkUrl'];
                    $coupon['couponPrice'] = $couponItem['couponPrice'];
                    $coupon['sale'] = $couponItem['sale'];
                    $coupon['storeId'] = $couponItem['storeId'];
                    $coupon['storeName'] = $couponItem['storeName'];
                    $coupon['couponId'] = $couponItem['couponId'];
                    $coupon['sass'] = '天猫';
                    $nt = $coupon;
                }
                for($i =0;$i<5;$i++){
                    $coupons[] = $nt;
                }
           }
            return $this->render('/coupon/index', [
                'coupons' => json_encode($coupons,JSON_UNESCAPED_UNICODE ),
                'data'=>999,
                'pagination' => $pagination,
            ]);
        }
        public function actionAdd()
        {
            $vars = Yii::$app->request->post();
	    $sassQuery  = new Query;
	    $sassRes = $sassQuery->select(['id','name'])->from('sass')->where(['status'=>1])->orderBy('id')->all();
	    //var_dump($sassRes);die; 
            return $this->render('/coupon/addCoupon', 
				[
				//'model' => $model,
				 'sass'=>json_encode($sassRes,JSON_UNESCAPED_UNICODE)
				]
				);
        }

        public function action()
        {
            return $this->render('/coupon/addSass');
        }
        public function actionT()
        {
            $sassName = Yii::$app->request->post('name');
            if(!empty($sassName)){
                $sass = new Sass();
                $sass->name = $sassName;
                $sass->save();
            }
            $response = new Response();
            $response->send();
        }
	public function actionAddsass()
	{
		$coupon = new coupon;
		$couponInfo = Yii::$app->request->post('couponinfo');
        $couponInfo = json_decode($couponInfo,true);
		$coupon->price = $couponInfo['price']?? 0;
        $coupon->sale = $couponInfo['sale_price']?? 0;
        $coupon->couponBgtime  = !empty($couponInfo['start_date'])? strtotime($couponInfo['start_date']): 0;
        $coupon->couponEndtime  = !empty($couponInfo['end_date'])? strtotime($couponInfo['end_date']): 0;
        $coupon->sass = $couponInfo['sass']?? 0;
		$coupon->product_id = rand(1,1000000);
		$coupon->name = $couponInfo['name']?? '';
		$coupon->mainpic = $couponInfo['mainpic']?? '';
		$coupon->couponPushUrl = $couponInfo['backurl']?? '';
		$coupon->save();
	}
	public function actionImportexcel($type)
	{	
	    
		$excelReader = IOFactory::createReader('Xls');
		$excelSheet = $excelReader->load('/tmp/ddd.xls');
		$currentSheet = $excelSheet->getActiveSheet();
		$rowNum = $currentSheet->getHighestRow();
		var_dump($rowNum);die;
	
	}





    }
