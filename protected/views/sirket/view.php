<style type="text/css">
    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/


    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
</style>

<div class="container">

    <div class="row profile">
        <?php

        $this->renderPartial("leftinformations",array(
            'modelcompany' => $modelcompany,
            'modelsupplier' => $modelsupplier));

        ?>

            <div class="col-md-9">
                <div role="tabpanel" class="tab-pane active">
                    <?php

                    $this->renderPartial("menu",array(
                        'modelsupplier' => $modelsupplier,
                        'modelcompany' => $modelcompany,
                    ));

                    ?>


                    <ul class="products columns-4">
                        <?php

                            foreach ($products as $key=>$value) :
                                if($key==0 || $key %4 == 0){
                                    $cls="first";
                                }else if($key % 4 == 3){
                                    $cls = "last";
                                }else if($key % 4 == 2){
                                    $cls = "";
                                }else{
                                $cls = "";
                                }

                        ?>
                        <li class="product <?=$cls?>">
                            <div class="product-outer">
                                <div class="product-inner">
                                    <?php if(!empty($value->discount)) : ?>
                                        <div class="discount-container pull-right">
                                            <div class="green_color">
                                                <div class="discount-detail ">
                                                    <span class="percentage">%</span>
                                                    <span class="rate"><?=$value->discount?></span>
                                                    <span class="indirim">İndirim</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <span class="loop-product-categories"><a href="product-category.html" rel="tag"><?=$value->productgroup_name?></a></span>
                                    <a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->name)))?>">
                                        <h3><?=$value->name?></h3>
                                        <div class="product-thumbnail">

                                            <img style="max-height: 142px!important;" class="center-block" src="<?=$value->imageS?>" alt="">

                                        </div>
                                    </a>

                                    <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <?php if(!empty($value->discount)) : ?>

                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> <?= number_format($value->price,2)?> <?=Params::getParams_("currency",$value->currency)?></span></ins>
                                                                    <del><span class="amount"><?=Func::inidianCalculation($value->price,$value->discount,2)?> <?=Params::getParams_("currency",$value->currency)?></span></del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <?php endif; ?>
                                                                <?php if(empty($value->discount)) : ?>
                                                                    <span class="electro-price">
                                                                        <ins><span class="amount"> </span></ins>
                                                                        <span class="amount"> <?= number_format($value->price,2)?> <?=Params::getParams_("currency",$value->currency)?></span>
                                                                    </span>
                                                                <?php endif; ?>

                                                            </span>
                                    </div><!-- /.price-add-to-cart -->

                                    <div class="hover-area">
                                        <div class="action-buttons">
                                            <a style="cursor: pointer" onclick="addfollowlist(<?=$value->code?>)" class="add_to_wishlist">Listene Ekle</a>
                                            <a style="cursor: pointer" onclick="addcomparelist(<?=$value->code?>)" class="add-to-compare-link">Karşılaştır</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.product-inner -->
                            </div><!-- /.product-outer -->
                        </li>

                        <?php endforeach; ?>

                    </ul>
                </div>

            </div>
        </div>

</div>
</div>