<?php

use backend\assets\AppAsset;
$this->title = 'lists';
?>
<style>
    body {overflow-y: scroll;}
</style>
<div id="app" class="layout"  style="margin-left:10px;">
    <Layout>
        <Header>
            <div style="position:relative;margin:10px 0 0 10px;width:200px;">
                <i-input search enter-button="查找" placeholder="input name"  style="width: 250px" /></br>
            </div>
            <div style="margin:-31px 0 0 -32px;">
                <i-button v-on:click="add" type="primary"  style="width: 50px;height:32px;margin-left:300px;" />添加</i-button>
                <i-button v-on:click="imporCoupon" type="primary"  style="width: 80px;height:32px;margin-left:5px;" />批量导入</i-button>
            </div>
        </Header>
        <Content>
            <div style="margin-top:10px;">
                <i-table style=" width:100%; margin-bottom: 15px;" border :columns="columns1" :data="data1" ></i-table>
            </div>
        </Content>
	<div style="width:100%;height:35px;">
        	<Page :total="total" show-total show-elevator show-sizer @on-change="changepage"  style="float:right;margin:-10px 100px 0 0;">
	</div>
    </Layout>


    <Modal v-model="isShow" width="360" :mask-closable="false">
        <p slot="header" style="color:#f60;">
            <Icon type="ios-information-circle"></Icon>
            <span>批量导入数据</span>
        </p>
        <div style="text-align:left">
            <p>选择要导入的excel文件,注意文件格式</p>
            <div>
	    	<Upload action="//jsonplaceholder.typicode.com/posts/">
                 <Button icon="ios-cloud-upload-outline">选择文件</Button>
               </Upload>
	   </div>
        </div>
        <div slot="footer">
            <i-button type="success" size="large"  @click="imporCoupon">开始导入</i-button>
        </div>
    </Modal>

</div>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            isShow: false,
            value2: '',
	    total:100,
            value3: '',
            columns1: [
                {
                    title: 'ID',
                    key: 'product_id',
                    width:100
                },
                {
                    title: '名称',
                    key: 'name',
                    width:200
                },
                {
                    title: '类别',
                    key: 'cate',
                    width:80
                },
                {
                    title: '店铺',
                    key: 'storeName',
                    width:80
                },
                {
                    title: '价格',
                        key:'price',
                    width:60
                },
                {
                    title: '券价格',
                    key:'sale',
                    width:60
                },
                {
                    title: '券价格',
                    key:'couponPrice',
                    width:80
                },{
                    title: 'ID',
                    key: 'product_id',
                    width:100
                },
                {
                    title: '名称',
                    key: 'name',
                    width:100
                },
                {
                    title: '类别',
                    key: 'cate',
                    width:80
                },
                {
                    title: '店铺',
                    key: 'storeName',
                    width:80
                },
                {
                    title: '价格',
                    key:'price',
                    width:60
                },
                {
                    title: '券价格',
                    key:'sale',
                    width:60
                },
                {
                    title: '券价格',
                    key:'couponPrice',
                    width:80
                },{
                    title: 'ID',
                    key: 'product_id',
                    width:100
                },
                {
                    title: '名称',
                    key: 'name',
                    width:100
                },
                {
                    title: '类别',
                    key: 'cate',
                    width:80
                },
                {
                    title: '店铺',
                    key: 'storeName',
                    width:80
                },
                {
                    title: '价格',
                    key:'price',
                    width:60
                },
                {
                    title: '券价格',
                    key:'sale',
                    width:60
                },
                {
                    title: '券价格',
                    key:'couponPrice',
                    width:80
                }
            ],
            data1: <?=$coupons?>
        },
        methods:{
	    changepage: function(index){
		alert(index);		
	     },
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
            add:function(){
                window.location.href = 'index.php?r=coupon/coupon/add';
            },
            imporCoupon:function(){
		this.isShow = true;
            }
        }
    })
</script>

<script>
    layui.use('laypage', function(){
        var laypage = layui.laypage;
        //执行一个laypage实例
        laypage.render({
            elem: 'pager'
            ,count: 100 //数据总数，从服务端得到
            ,limit:10
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });
    });

    $(document).ready(function(){
        $('#clid').click(function(){

            layui.use('layer', function(){
                var layer = layui.layer;

                layer.msg('hello');
            });

        });
    });
</script>
