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
                </div>


                <div class="category-products">
                    <ul class="products row">
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p11.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p12.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p13.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p14.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p15.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p16.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p17.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p18.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p19.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p20.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p21.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product col-xs-12 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="inner">
                                    <div class="product-left">
                                        <div class="product-thumb">
                                            <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p22.jpg" alt="Product"></a>
                                        </div>
                                    </div>
                                    <div class="product-right">
                                        <div class="product-name">
                                            <a href="#">Cotton Lycra Leggings</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">$139.98</span>
                                            <span class="product-price-old">$169.00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="product-button">
                                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                            <a class="button-radius btn-add-cart" title="Add to Cart" href="#">İncele<span class="icon"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

</div>
</div>