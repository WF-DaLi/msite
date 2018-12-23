<?php

use backend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '用户列表';
?>

<style>
  .form-group {
		margin-bottom:20px;
	      }
</style>
<div id="app" class="layout"  style="margin-left:10px;">
    <Layout>
        <Content>
            <i-button type="success" style="margin:10px 5px 0 10px;" v-on:click="adduser()">新增用户</i-button>
            <div style="margin-top:10px;">
                <i-table style=" width:100%; margin-bottom: 15px;" border :columns="users_column" :data="users" ></i-table>
            </div>
        </Content>
<!--        <div style="margin-top:-20px;" id="pager"></div>-->
    </Layout>

    <Modal
     v-model="isShow"
     title="添加用户"
     width="800"
     height = "800"
     @on-ok='ok'
     @on-cancel='cancel'
     :mask-closable="false"
    >
    <div class="form-group has-success">
        <label class="col-sm-3">name:</label>
        <div class="col-sm-8 required has-success" style="margin-left:-20px;height:10px;">
            <i-input id='username' v-validate:username="{required:true}" v-model="username" type="text" @on-blur="testName" placeholder='username'>
        </div>
    </div><br>
        <div class="form-group">
            <label class="col-sm-3">pwd:</label>
            <div class="col-sm-8" style="margin-left:-20px;boder-color:#green;">
                <i-input v-model="password" type="text" value="" placeholder='passwd'>
            </div>
        </div><br>

        <div class="form-group">
            <label class="col-sm-3">confirm:</label>
            <div class="col-sm-8 has_success" style="margin-left:-20px;">
                <i-input type="text" value="" placeholder='passwd confirmed'>
            </div>
        </div><br>
	<div class="form-group">
	   <label class="col-sm-3">email:</label>
	   <div class = "col-sm-8" style="margin-left:-20px;">
		<i-input v-model="email" type="text" placeholder ="user@mlab.com">
	   </div>
	</div><br>
        <div class="form-group">
            <label class="col-sm-3">role:</label>
            <div class="col-sm-8" style="margin-left:-20px;">
                <i-select v-model="role">
                    <i-option v-for="item in roles" :value="item.id">{{item.name}}</i-option>
                </i-select>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-3">status:</label>
            <div class="col-sm-8" style="margin-left:-20px;">
               <i-select v-model="currentStatus">
                   <i-option v-for="item in userstatus" :value="item.id">{{item.name}}</i-option>
               </i-select>
            </div>
        </div><br>
    </Modal>
</div>


<script>
    const app = new Vue({
        el: '#app',
        data: {
	    actionType : 'add',
        isShow:false,
	    role:'',
        roles:<?=$role?>,
	    currentStatus:'',
	    username:'',
	    password:'',
	    email:'',
	    uid:'',
	    userstatus:[{"id":1,"name":"启用"},{"id":0,"name":"禁用"}],	
        users_column: [
                {
                    title: 'ID',
                    key: 'id',
                    width:100
                },
                {
                    title: '用户名',
                    key: 'username',
                    width:200
                },
                {
                    title: '角色',
                    key: 'status',
                    render:function (h,param) {
                        var dstatus = param.row.status;
                        if(dstatus == 2){
                            status = '管理员';
                        }else{
                            status = '普通';
                        }
                        return h('span',status);
                    }
                },
                {
                    title: '状态',
                    key:'userstatus',
                    render:function (h,param) {
                        var dstatus = param.row.userstatus;
                        if(dstatus == '1' ){
                           status = '正常';
                           color = 'green';
                        }else{
                           status = '禁用';
                           color = 'red';
                        }
                        return h('span',{
                            style:{
                                marginLeft:"10px",
                                color:color,
                            }
                        },status);
                    }
                },
                {
                    title:"操作",
                    render:function (h,param) {
                       var uid = param.row.id;
		       var index = param.index;
	               var status =param.row.userstatus;
		       var optStatus = 1;
		       var statusName = '启用';
		       var statusColor = 'green';
			if(status ==1 ){
			    statusName = '禁用'
			    statusColor = 'red';
			    optStatus = 0;
			}
                       var opt = [
                            h('a',{
                            attrs:{
                                "href":"#",
                            },
			      on:{
                      click:function(){
                        app.updateUser(index);
                        }
				   }
                            },'编辑'),
                            h('a',{
                                on:{
                                    click:function(){
                                         app.updatestatus(uid,optStatus);
                                    }
                                },
                                style:{
                                    marginLeft:"10px",
				                    color:statusColor,
                                }
                            },statusName)
                        ];
                       return h('span',opt)
                    }
                }
            ],
        users: <?=$users?>
        },
        methods:{
	    updateUser:function(index){
                var currentUser = this.users[index];
                this.uid = currentUser.id;
                this.email = currentUser.email;
                this.username = currentUser.username;
                this.currentStatus = parseInt(currentUser.userstatus);
                this.role = parseInt(currentUser.status);
                this.actionType = 'update';
                this.isShow = true;
		},
        adduser: function () {
                this.isShow = true;
	            this.currentStatus = 1;
                this.role = 2;
                this.actionType = 'add';
            },
	    dealPost:function (type){
	         if(type == 'add'){
	           $.post('index.php?r=admin/user/adduser',
			  {'username':this.username,
			   'password':this.password,
			   'role':this.role,
		       'status':this.currentStatus,
               'email':this.email},
               function(res){
                             app.$Modal.success({
                                        title:'操作提示',
                                            content:'操作成功',
                                    onOk:()=>{
                                     window.location.reload();
                                 }
                             });
			   })
		   }else if(type == 'update') {
		    $.post('index.php?r=admin/user/updateuser',
			   {
			    'username':this.username,
			    'uid':this.uid,
			    'password':this.password,
			    'role' : this.role,
			    'status': this.currentStatus,
			    'email':this.email},
			   function(res){
                   app.$Modal.success({
                       title:'操作提示',
                       content:'操作成功',
                       onOk:()=>{
                       window.location.reload();
                         }
                     });
			  });
		 }
	    },
	    ok: function(){
		    app.dealPost(this.actionType);
	   },
	    cancel: function(){
	   },
	    updatestatus:function(uid,status){
            $.post('index.php?r=admin/user/updatestatus',{'uid':uid,'status':status},function(res){
               app.$Modal.success({
                    title:'操作提示',
                    content:'操作成功',
                    onOk:()=>{
                      window.location.reload();
                    }
                })
            });
	    },
	    testName: function(){
		$.post('index.php?r=admin/user/checkuserexist',{'uname':this.username},function(res){
		   if(res == 1){
                       $('#username input').attr('style','border-color:red');		
		    }else{
                       $('#username input').attr('style','border-color:green');		
		    }	   
                });
	  }
        }
    })
</script>
