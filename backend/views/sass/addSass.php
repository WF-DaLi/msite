<?php

/* @var $this yii\web\View */

$this->title = 'add sass';
use yii\helpers\Html;
?>
<?= Html::csrfMetaTags() ?>

<div id="app" >
    <div class="m-title">
        添加 sass 来源
    </div>
    <div class="col-lg-6 " style="margin-top:10px;">
        <i-form :model="sassName" :label-width="80">
            <Form-item label="name">
                <i-input v-model="sassName" placeholder="sass 来源..." id="sass_name" ></i-input>
            </Form-item>
            <Form-item label="上传logo">
                <Upload
                        :on-success = "success"
                        action="/index.php?r=/common/upload/upload"
                        :format="['jpg','jpeg','png','bmp']"
                        :max-size="1024"
                        name="file">
                    <i-button icon="ios-cloud-upload-outline">上传文件</i-button><div style="margin-left:110px;margin-top:-30px;">(文件宽高限制16*16)</div>

                </Upload>
            </Form-item>
            <Form-item>
                <i-button type="primary" v-on:click="addsass()">提交</i-button>
            </Form-item>
        </i-form>
    </div>
</div>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            sassName:'',
            filePath:''
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
                e.preventDefault();
            },
            success:function(res){
                this.filePath = res;
                alert(res);
            },
            addsass:function(){

                var sassName = this.sassName;
                if(sassName != ''){
                    $.post('index.php?r=sass/sass/addsass',{name:sassName,logo:this.filePath},function(){
                        layui.use(['layer'], function(){
                            var layer = layui.layer;
                            layer.confirm(
                                '操作成功',
                                 {
                                     title:'提示',
                                     btn:['确定'],
                                     closeBtn: 0,
                                     icon:1
                                 },
                                 function(){
                                    window.location = 'index.php?r=sass/sass/lists';
                                 })
                        });
                    });
                }
                },
            }
    })
</script>

