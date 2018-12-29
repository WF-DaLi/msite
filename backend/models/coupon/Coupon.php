<?php
namespace backend\models\coupon;

use yii\db\ActiveRecord;

class Coupon extends ActiveRecord
{

	public static function tableName()
	{
		return 'coupon';
	}
}
