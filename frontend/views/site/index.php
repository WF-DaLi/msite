<?php

/* @var $this yii\web\View */

$this->title = '省钱、折扣、帮你省' ;
?>
<?php //echo $this->context->coupons;?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<!-- 引入样式 -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">

<style>
    .el-row {
        margin-bottom: 20px;
    &:last-child {
         margin-bottom: 0;
     }
    }
    .el-col {
        border-radius: 4px;
    }
    .bg-purple-dark {
        background: #99a9bf;
    }
    .bg-purple {
        background: #d3dce6;
    }
    .bg-purple-light {
        background: #e5e9f2;
    }
    .grid-content {
        padding:0px;
        border-radius: 4px;
        min-height: 36px;
        width:230px;
        height:320px;
        margin-top:30px;
        /*background-color: red;*/
        margin-left:40px;

    }
    .row-bg {
        padding: 10px 0;
        background-color: #f9fafc;
    }
    .image {
             width:230px;
             height:230px;
             background-color: blue;
         }
    .coupon-info {
        width:230px;
        height:90px;
        /*background-color: green;*/
    }
    .coupon-bottom {
        position:relative;
        width:230px;
        height:45px;
        /*background-color: green;*/
    }
    .title{
        position: relative;
        width:230px;
        height:45px;
        padding:5px;
        background-color: bisque;
        display: inline-block;
    }
    .price {
        position: relative;
        padding-top:15px;
        margin-left:5px;
        float:left;
        width:90px;
        height:45px;
        text-align: center;
        /*background-color:palevioletred;*/
    }
    .logo {
        position: relative;
        float:right;
        margin-top:10px;
        margin-right:10px;
        width:24px;
        height:24px;
        /*background-color:chartreuse;*/
    }
    .num {
        position: relative;
        text-align:center;
        display:inline-block;
        padding:5px;
        margin-left:5px;
        float:left;
        width:50px;
        height:45px;
        /*background-color: chocolate;*/
    }
    .sheng {
        position: relative;
        float:left;
        margin:15px 0 0 5px;
        width:20px;
        font-weight: bold;
        /*background-color: red;*/
    }
    .discount {
        position: relative;
        float:left;
        margin-top:-5px ;
        width:20px;
        font-size:35px;
        font-weight: bold;
        color:red;
        /*background-color: yellow;*/
    }
</style>

<div id="app" >
        <el-row :gutter="2" >
            <template v-for="item in showData" :data="showData">
                <el-col :span="3.5">
                <div class="grid-content bg-purple">
                    <div class="image"><img :src="item.mainpic"></div>
                    <div class="coupon-info">
                        <div class="title">{{item.name}}</div>
                        <div class="coupon-bottom">
                            <div class ="sheng">省</div>
                            <div class="discount">{{item.price-item.sale}}</div>
                            <div class ="price">原价{{item.price}}</div>
                            <div class ="num">已售{{item.num}}<br>2999</div>
                            <div class="logo"><img :src="item.sass_logo"></div>
                        </div>
                    </div>
                </div>
            </el-col>
            </template>
    </el-row>
</div>
<script>
    var vm = new Vue({
        el: '#app',
        data(){
            return {
                showData:<?=$this->context->coupons?>,
            }
        }

    })
</script>

