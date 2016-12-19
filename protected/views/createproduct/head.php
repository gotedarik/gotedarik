<style type="text/css">
    .stepwizard-step p {
        margin-top: 10px;
        font-weight: bold;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 22px;
        background: #ffffff;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        border: 1px solid #e5e5e5;
        border-radius: 2px;
        height: 9px;

    }
    .control-label{
        cursor: pointer;
        font-size: 16px;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 50px;
        height: 50px;
        text-align: center;
        border: 1px solid #e5e5e5;
        padding: 14px 0;
        font-weight: 800;
        font-size: 14px;
        line-height: 1.428571429;
        border-radius: 25px;
        background: white;
    }

    .mar1{
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .btn-primary{
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btn-lg{
        margin: 10px 5px;
    }
    #CountSelect{
        border: 1px solid #d8d8d8;
        display: inline-block;
        font-weight: 700;
    }
    #buttons{
        display: inline-block;
        font-weight: 700;
        margin: 25px 0 10px 0;
        text-align: center;
    }
    #CountSelect ul{
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    #CountSelect ul li{
        text-align: center;
        display: block;
        float: left;
        font-size: 0.967em;
        height: 40px;
        padding: 5px 5px;
    }
    .adeText{
        border-right: 1px solid #d8d8d8;
    }
    #CountSelect ul li span{
        padding: 0 15px;
        font-size: 1.067em;
        position: relative;
        top: 5px;
    }

    #CountSelect ul li input[type="text"]{
        margin: 0;
        border: none;
        border-radius: 0;
        width: 100px;
        height: 40px;
        border-right: 1px solid #d8d8d8;
    }
    #CountSelect ul li a{
        position: relative;
        padding: 0 12px;
        top:4px;
        color: black;
        font-size: 16px;
    }
    .sagcount{
        position: relative;
    }
    .sagcount p{
        font-weight: bold;
        font-size: 16px;
    }
    .ubtn-default:hover,.ubtn-default:focus{
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .tabs-block .nav .nav-item a{
        font-size: 14px;
    }
    .textright{
        text-align: right;
        max-width: 100px;
    }
    .padding10{
        padding: 10px;
    }
    .img-box1{
        max-width: 300px;
        max-height: 300px;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
    }
    .img-box2{
        max-width: 100%;
        max-height: 100%;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
    }
    .img-box-thumb{
        max-height: 80px;
        max-width: 80px;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
        margin-right: 5px;
        margin-top: 5px;
    }
    .img-box-img1{
        opacity: 0.442;
        width: 100%;
        height: 100%;
    }
    .img-box-img-main{
        width: 50%;
        height: 50%;
        cursor: pointer;
        position: relative;
        top:70px;
        left: 100px;
    }
    .img-box-img-small{
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    .hizala{
        margin-top: -20px;
        position: relative;
        left: 15px;
    }
    .btn-radio,.btn-radio1,.btn-radio2{
        width: 100%;
        margin-bottom: 5px;
    }
    .active1{
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .space-20 {
        margin-top: 20px;
    }
    .calendardays{
        list-style-type: none;
    }
    .calendardays li{
        float: left;
        display: block;
        margin-right: 10px;
        margin-bottom: 5px;

    }
    .list-group-item{
        padding: 5px!important;
    }

    @media (min-width: 850px) and (max-width: 1200px){
        .hizala{
            margin-top: -20px;
            margin-left: -23px;
        }
        .fileuproduct-main{
            outline: none;
            background: red;
            cursor: pointer;
            z-index: 9999;
            width: 215px;
            height: 170px;
            opacity:0;
            margin-left: -60px;
            margin-top: 60px;
        }
        .img-box-img-main{
            opacity: 0.442;
            width: 50%;
            height: 50%;
            cursor: pointer;
            margin-left: -40px;
            margin-top: 60px;
        }
    }
    @media (min-width: 768px) and (max-width: 850px) {
        .fileuproduct-main{
            outline: none;
            background: red;
            cursor: pointer;
            z-index: 9999;
            width: 215px;
            height: 170px;
            opacity:0;
            margin-left: -60px;
            margin-top: 60px;
        }
        .img-box-img-main{
            opacity: 0.442;
            width: 50%;
            height: 50%;
            cursor: pointer;
            margin-left: -40px;
            margin-top: 60px;
        }
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {

                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });


        $('div.setup-panel div a.btn-primary').trigger('click');
/* Checkbox configuration */
            $('.btn-radio').click(function(e) {
                $('.btn-radio').not(this).removeClass('active1')
                    .siblings('input').prop('checked',false);
                $(this).addClass('active1')
                    .siblings('input').prop('checked',true)
            });

        $('.btn-radio1').click(function(e) {
            $('.btn-radio1').not(this).removeClass('active1')
                .siblings('input').prop('checked',false);
            $(this).addClass('active1')
                .siblings('input').prop('checked',true)
        });
        $('.btn-radio2').click(function(e) {
            $('.btn-radio2').not(this).removeClass('active1')
                .siblings('input').prop('checked',false);
            $(this).addClass('active1')
                .siblings('input').prop('checked',true)
        });
/* Checkbox configuration */
    });


</script>
<div class="container border123 mar1">
    <h1 class="mar1">Ürünlerinizi Satın</h1>

    <hr style="color: #e5e5e5;">

    <div class="stepwizard mar1">

        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'choosecategory'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">1</span>";
                }else{
                    echo "<a href=\"#step-1\" type=\"button\" class=\"btn btn-primary btn-circle \">1</a>";
                }

                ?>
                <p>Kategori Seçimi</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productdescription'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">2</span>";
                }else{
                    echo "<a href=\"#step-2\" type=\"button\" class=\"btn btn-primary btn-circle \">2</a>";
                }

                ?>
                <p>Ürün Satış Şekli</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productinformations'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">3</span>";
                }else{
                    echo "<a href=\"#step-3\" type=\"button\" class=\"btn btn-primary btn-circle \">3</a>";
                }

                ?>
                <p>Ürün Detayları</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productreview'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">4</span>";
                }else{
                    echo "<a href=\"#step-4\" type=\"button\" class=\"btn btn-primary btn-circle \">4</a>";
                }

                ?>
                <p>Ön İzleme & Onay</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productpayment'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">5</span>";
                }else{
                    echo "<a href=\"#step-5\" type=\"button\" class=\"btn btn-primary btn-circle \">5</a>";
                }

                ?>
                <p>Ödeme Seçeneği</p>
            </div>

        </div>
    </div>

    <hr style="color: #e5e5e5">