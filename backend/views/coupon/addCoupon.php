<?php

/* @var $this yii\web\View */

$this->title = '添加券';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div id="app" >
    <div class="m-title">
        添加券
    </div>
    <div class="col-lg-6 " style="margin-top:10px;width:100%;">
        <i-form :model="couponinfo" :label-width="80">
            <Form-item label="名称">
                <i-input style="width: 780px;"  v-model="couponinfo.name" placeholder="输入券名字"></i-input>
            </Form-item>
            <Form-item label="描述">
                <i-input v-model="couponinfo.desc" style="width: 780px;" type="textarea" :autosize="{minRows: 3,maxRows: 5}" placeholder="券描述..."></i-input>
            </Form-item>
            <Form-item label="回调url">
                <i-input v-model="couponinfo.backurl" style="width: 780px;" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder="回调url..."></i-input>
            </Form-item>
            <Form-item label="设置有效期" >
                <Row style="width:800px;float:left;">
                    <Col span="11" >
                    <Date-Picker type="date" format="yyyy-MM-dd" placeholder="选择开始日期" v-model="couponinfo.start_date" @on-change="pick_start_date"></Date-Picker>
                    <Time-Picker type="time" placeholder="开始时间" @on-change="start_time"></Time-Picker>
                    </Col> --
                    <Col span = "11">
                    <Date-Picker type="date" format="yyyy-MM-dd" placeholder="选择结束日期" v-model="couponinfo.end_date" @on-change="pick_end_date"></Date-Picker>
                    <Time-Picker type="time" placeholder="结束时间" @on-change="end_time"></Time-Picker>
                    </Col>
                </Row>
            </Form-item>
            <Form-item label="价格" style="float:left;width:500px;">
                <i-input style="width:100px;" v-model="couponinfo.price" ></i-input>
            </Form-item>
            <Form-item label="折扣价格" style="margin:-60px 0 0 180px;float:left;width:150px;">
                <i-input style="width:100px;" v-model="couponinfo.sale_price"></i-input>
            </Form-item>
            <Form-item label="选择来源" style="margin-top:80px;height:50px;" >
                <i-select
                        v-model="couponinfo.sass"
                        @on-change="sass"
                        style="width:100px;"
                >
                    <i-option v-for="item in select" :value="item.id"  >{{ item.name }}</i-option>
                </i-select>
            </Form-item>
	    <Form-item label="上传图片" >
		    <Upload
                    :on-success="upload_sussess"
                    action="/index.php?r=common/common/upload"
            >
        		<i-button icon="ios-cloud-upload-outline">上传文件</i-button>
   	 	    </Upload>
	    </Form-item><br>
        <Form-item >
            <i-button type="primary" @click="addItem()">提交</i-button>
            <i-button style="margin-left: 8px">取消</i-button>
        </Form-item>
        </i-form>
    </div>
</div>
<div>
</div>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            select: <?=$sass?>,
            couponinfo: {
                name: '',
				backurl:'',
				desc:'',
                sass:'',
                start_date: '',
				end_date:'',
                mainpic: ''
            }
        },
        methods:{
            checkForm: function (e) {
                if (this.name && this.age) {
                    return true;
                }

                this.errors = [];

                if (!this.name) {
                    this.errors.push('Name required.');
                }
                if (!this.age) {
                    this.errors.push('Age required.');
                }

                e.preventDefault();
            },
            pick_start_date:function(start_date){
                this.couponinfo.start_date = start_date;
            },
            sass:function(sass_id){
                this.couponinfo.sass = sass_id;
            },
            pick_end_date:function(end_date){
                this.couponinfo.end_date = end_date;
            },
            start_time:function(time){
                this.couponinfo.start_date = this.couponinfo.start_date+' '+time;
            },
            end_time:function(time){
               this.couponinfo.end_date = this.couponinfo.end_date+' '+time;
            },
            upload_sussess:function(res){
                this.couponinfo.mainpic = res;
            },
            addItem:function(){
				var param = '';
				param = JSON.stringify(this.couponinfo);
                $.post('/index.php?r=coupon/coupon/addsass',{'couponinfo':param},function(res){
//					alert(res);
				});
            }
        }
    })
</script>
