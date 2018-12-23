<?php

use backend\assets\AppAsset;

$this->title = 'Sass lists';
?>
<style>
    /*body {overflow-y: scroll;}*/
</style>
<div id="app" class="layout"  style="margin-left:10px;">
    <Layout>
        <Content>
            <i-button type="success" style="margin:10px 5px 0 10px;" v-on:click="addsass()">新增sass记录</i-button>
            <div style="margin-top:10px;">
                <i-table style=" width:100%; margin-bottom: 15px;" border :columns="columns1" :data="data1" ></i-table>
            </div>
        </Content>
<!--        <div style="margin-top:-20px;" id="pager"></div>-->
    </Layout>
</div>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            value1: '',
            value2: '',
            value3: '',
            columns1: [
                {
                    title: 'ID',
                    key: 'id',
                    width:100
                },
                {
                    title: 'sass名称',
                    key: 'name',
                    width:200
                },
                {
                    title: 'logo',
                    key: 'logo',
                    width:200,
                    render:function (h,param) {
                        var imgUrl = param.row.logo;
                        return h('img',
                            {
//                                style:{
//                                    width:"32px",
//                                    height:"32px"
//                                },
                                attrs: {
                                    src: imgUrl,
                                    style: 'width: 16px;height: 16px;border-radius: 2px;'
                                }
                            },);
                    }
                },
                {
                    title: '状态',
                    key:'status',
                    render:function (h,param) {
                        var dstatus = param.row.status;
			var currentColor ='';
                        if(dstatus ==1 ){
                           status = '启用';
			   currentColor = 'green';
                        }else{
                            status = '禁用';
		            currentColor = 'red';		
                        }
                        return h('span',
				{
				 style:{
					color:currentColor
					}
				},
				status);
                    }
                },
                {
                    title:"操作",
                    render:function (h,param) {
                       var sass_id = param.row.id ;
		       var status = param.row.status;
		       var optionStatus = '';
		       if(status == 0){
		            optionName = '启用';	  
					optionColor = 'green';
					optionStatus = 1;
				}else{
		            optionName = '禁用';		
		            optionColor = 'red';
			        optionStatus = 0;
				}
					
                       var opt = [
					    h('span',{
                               style:{
                                   color:optionColor,
                               },
                               on: {
                                   click: function(){
                                       app.updateStatus(sass_id,optionStatus)
                                   }
                               }
                                },optionName),
						h('span',{
								style:{
										color:'red',	
										margin:'10px',
									},		
								on:{
									click:function(){
										app.updateStatus(sass_id,-1)
									}
								}	
										
								 },'删除')	
                       	    ];
                       return h('a',opt)
                    }
                }
            ],
            data1: <?=$sass?>
        },
        methods:{
            addsass: function () {
                window.location = 'index.php?r=sass/sass/add';
            },
            updateStatus:function(sassId,status){
		console.log(status);
                $.post('/index.php?r=sass/sass/updatestatus',{sass_id:sassId,status:status},function(res){
		    if(true){
			app.$Modal.success({
			     title:' ',
			     content:'操作成功!',
			     onOk:() => {
				   window.location.reload();
				}
			})
		    }else{
			app.$Modal.error({
			    title:'操作提示',
			    content: '操作失败'
			})
		     }
                })

            }
        }
    })
</script>
