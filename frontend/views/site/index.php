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
        background-color: red;
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
        background-color: green;
    }
    .coupon-bottom {
        position:relative;
        width:230px;
        height:45px;
        background-color: green;
    }
    .title{
        position: relative;
        width:230px;
        height:45px;
        background-color: yellow;
    }
    .price {
        position: relative;
        float:left;
        width:100px;
        height:45px;
        background-color: #3c763d;
    }
    .logo {
        position: relative;
        float:right;
        margin-top:10px;
        margin-right:10px;
        width:16px;
        height:16px;
        background-color:chartreuse;
    }
    .num {
        position: relative;
        text-align:center;
        padding-top:15px;
        display:inline-block;
        float:left;
        width:80px;
        height:45px;
        background-color: chocolate;
    }
</style>

<div id="app" >
        <el-row :gutter="2" >
            <template v-for="item in showData" :data="showData">
                <el-col :span="3.5">
                <div class="grid-content bg-purple">
                    <div class="image"><img src="/img/pic.jpg"></div>
                    <div class="coupon-info">
                        <div class="title">{{item.name}}</div>
                        <div class="coupon-bottom">
                            <div class ="price">19<em>.6</em></div>
                            <div class ="num">已售{{item.num}}</div>
<!--                            <div class="logo"><img :src = {{item.logo}}</div>-->
                        </div>
                    </div>
                </div>
            </el-col>
            </template>
    </el-row>

    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
    <!--        <el-col :span="3.5"><div class="grid-content bg-purple"></div></el-col>-->
<!--        --><?php
//             for($i=1;$i<=24;$i++){
//        ?>
<!--        <div class="product_box">-->
<!--            <img src="https://img.alicdn.com/tfscom/i3/475437642/TB2aKlitpmWBuNjSspdXXbugXXa_!!475437642.jpg_230x230.jpg" class="img">-->
<!--            <div class="coupon_info">-->
<!---->
<!--                <span class= "coupon_name" name="coupon_name">冬季兔毛大衣冬季兔毛大衣</span>-->
<!--                <span class="coupon_desc">-->
<!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit-->
<!--                </span>-->
<!--                <div class="money_info">-->
<!--                    <div class="left">-->
<!--                        <span class="color_red">￥</span>-->
<!--                        <span class="coupon_price">19<em>.6</em></span>-->
<!--                    </div>-->
<!--                    <div class=" midle">-->
<!--                        <span>券后价</span>-->
<!--                    </div>-->
<!--                    <div class= "right">-->
<!--                        <span>已售5335</span>-->
<!--                        <img src = "https://l2.51fanli.net/shop/ico/c086f236fabf61d6.png?1405671048" class="logo">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <input type="hidden" value="-->
<!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
<!--                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut-->
<!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
<!--                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut-->
<!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
<!--                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut">-->
<!--            </div>-->
<!--        </div>-->
<!--        --><?php
//        }
//        ?>
</div>
<script>
    var vm = new Vue({
        el: '#app',
        data(){
            return {
                message: '111111111111111111111111111111111111111111111111111111',
                showData:<?=$this->context->coupons?>,
            }
        }

    })
</script>

