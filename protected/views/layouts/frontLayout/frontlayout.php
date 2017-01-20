<?php
$func = new Func;
if (!empty(Yii::app()->user->getState("user_id"))){
    $products_basket = $func->offerbasket();
    $say = count($products_basket);
}else{
    $cookie = CookieBasket::getAll();
    $say = count($cookie);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=Yii::app()->params["site_title"]?></title>
    <meta name="title" content="<?=Yii::app()->params["site_title"]?>">
    <meta property="og:title"  content="<?=Yii::app()->params["site_title"]?>">
    <meta name="description" content="<?=Yii::app()->params["site_description"]?>">
    <meta property="og:description" content="<?=Yii::app()->params["site_description"]?>">
    <meta name="keywords" content="<?=Yii::app()->params["site_keywords"]?>">
    <meta property="og:keywords" content="<?=Yii::app()->params["site_keywords"]?>">
    <meta name="image" content="<?=Yii::app()->params["site_image"]?>" />
    <meta property="og:image"  content="<?=Yii::app()->params["site_image"]?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?=Yii::app()->params["site_title"]?>" />
    <meta name="twitter:description" content="<?=Yii::app()->params["site_description"]?>" />
    <meta name="twitter:image" content="<?=Yii::app()->params["site_image"]?>" />

    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/lib/easyzoom/easyzoom.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/global.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/option3.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/front/css/custom.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

    <script src="<?=Yii::app()->baseUrl?>/front/js/system/facebooklogin.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/front/js/system/org.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/front/js/jquery.fileupload.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/frontpartner/ckeditor/ckeditor.js"></script>

    <script src="<?=Yii::app()->baseUrl?>/frontpartner/js/system/org.js"></script>
    <script>
        params.site="<?=Yii::app()->baseUrl?>";
        if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
            CKEDITOR.tools.enableHtml5Elements( document );
        // The trick to keep the editor in the sample quite small
        // unless user specified own height.
        CKEDITOR.config.height = 350;
        CKEDITOR.config.width = 'auto';
        CKEDITOR.config.language = 'tr';
        CKEDITOR.config.toolbar = [
            { name: 'document', items: [ 'Source'] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike'] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'PageBreak', 'Iframe' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize' ] },
        ];
    </script>
</head>
<body class="option3">
<!-- header -->
<header id="header">
    <!-- Top bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">

                <ul class="top-bar-link top-bar-link-left">
                    <li> Gotedarik'e Hoşgeldiniz</li>
                    <li><i class="fa fa-phone"></i> Bizi Arayın: 090 456 7823</li>
                </ul>
                <ul class="top-bar-link top-bar-link-right dot">
                    <?php if (empty(Yii::app()->user->getState("supplier_id")) && empty(Yii::app()->user->getState("user_id"))) :?>
                        <li><a title="Üye Ol" href="<?=Yii::app()->createUrl("site/uyeol")?>">Üye Ol</a></li>
                    <?php endif;?>

                    <?php if (empty(Yii::app()->user->getState("user_id"))) :?>
                        <li><a title="Üye Girişi" href="<?=Yii::app()->createUrl("site/giris")?>">Üye Girişi</a></li>
                    <?php else:?>
                        <li><a href="<?=Yii::app()->createUrl("member/uaccount")?>"><?=Yii::app()->user->getState("name")?></a></li>
                        <li><a title="Çıkış Yap" href="<?=Yii::app()->createUrl("site/logout")?>">Çıkış Yap</a></li>
                    <?php endif;?>

                    <?php if (empty(Yii::app()->user->getState("supplier_id"))) :?>
                        <li><a title="Tedarikçi Girişi" href="<?=Yii::app()->createUrl("site/tedarikcigirisi")?>">Tedarikçi Girişi</a></li>
                    <?php else:?>
                        <li><a href="<?=Yii::app()->createUrl("member/saccount")?>"><?=Yii::app()->user->getState("name")?></a></li>
                        <li><a title="Çıkış Yap" href="<?=Yii::app()->createUrl("site/logout")?>"></i>Çıkış Yap</a></li>
                    <?php endif;?>


                </ul>
            </div>
        </div>
    </div>
    <!-- Top bar -->
    <div class="container">
        <!-- main header -->
        <div class="row">
            <div class="main-header">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="logo">
                            <a href="<?=Yii::app()->createUrl("site/index")?>"><img style="height:50px;" src="<?=Yii::app()->request->baseUrl;?>/front/data/logo.png" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-7">
                        <div class="advanced-search box-radius">
                            <form class="form-inline">
                                <div class="form-group search-category">
                                    <select id="category-select" class="search-category-select">
                                        <option value="1">Tüm Kategoriler</option>
                                        <option value="2">Erkek</option>
                                        <option value="3">Kadın</option>
                                    </select>
                                </div>
                                <div class="form-group search-input">
                                    <input type="text" placeholder="Ne aramıştınız?">
                                </div>
                                <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-4 col-lg-3">
                        <div class="wrap-block-cl">
                            <div class="inner-cl box-radius">
                                <div class="dropdown user-info">
                                    <a data-toggle="dropdown" role="button"><i class="fa fa-user"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if (empty(Yii::app()->user->getState("supplier_id")) && empty(Yii::app()->user->getState("user_id"))) :?>
                                            <li><a href="<?=Yii::app()->createUrl("site/uyeol");?>"><i class="fa fa-user"></i> Hesabım</a></li>
                                        <?php endif; ?>
                                        <?php if (!empty(Yii::app()->user->getState("supplier_id"))):?>
                                            <li><a href="<?=Yii::app()->createUrl("member/saccount");?>"><i class="fa fa-user"></i> Hesabım</a></li>
                                        <?php endif; ?>
                                        <?php if (!empty(Yii::app()->user->getState("user_id"))):?>
                                            <li><a href="<?=Yii::app()->createUrl("member/uaccount");?>"><i class="fa fa-user"></i> Hesabım</a></li>
                                        <?php endif; ?>
                                        <?php if(!empty(Yii::app()->user->getState("user_id"))) : ?>
                                            <li><a href="<?=Yii::app()->createUrl("urun/takiplistesi")?>"><i class="fa fa-heart-o"></i> Takip Listem</a></li>
                                            <li><a href="<?=Yii::app()->createUrl("urun/urunkarsilastir")?>""><i class="fa fa-exchange"></i> Karşılaştırma Listem</a></li>
                                            <li><a href="<?=Yii::app()->createUrl("urun/teklifsepetim")?>""><i class="fa fa-arrow-circle-right"></i> Sepetim</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="dropdown language">
                                    <a data-toggle="dropdown" role="button"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/tr.png" alt="languae1"> Türkçe</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/en.jpg" alt="languae2">İngilizce</a></li>
                                        <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/tr.png" alt="languae3">Türkçe</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown currency">
                                    <a data-toggle="dropdown" role="button">USD</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">$ USD</a></li>
                                        <li><a href="#">€ EUR</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 cart-mobile">
                        <?php if(!empty(Yii::app()->user->getState("user_id"))) : ?>
                        <div class="block-wrap-cart">
                            <div class="iner-block-cart box-radius">
                                <a href="#">
                                    <span class="total">Sepetim</span>
                                </a>
                            </div>
                            <div class="block-mini-cart">
                                <div class="mini-cart-content">
                                    <h5 class="mini-cart-head">Sepetinizde <?=$say;?> ürün var</h5>
                                    <div class="mini-cart-list">
                                        <ul>
                                            <?php

                                            if($say != 0) {
                                                if(!empty(Yii::app()->user->getState("user_id"))){
                                                    foreach ($products_basket as $key => $value) :
                                                        ?>
                                                        <li class="product-info <?=$value->code;?>">
                                                            <div class="p-left">
                                                                <a onclick="deleteofferitem(<?=$value->code;?>)" title="Ürünü kaldır" class="remove_link"></a>
                                                                <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>">
                                                                    <img class="img-responsive" src="<?=$value->product_imageS?>" alt="Product">
                                                                </a>
                                                            </div>
                                                            <div class="p-right">
                                                                <p class="p-name"><?=$value->product_name?></p>
                                                                <p class="product-price">$139.98</p>
                                                                <p>Qty: <span class="countprice"><?=$value->count_number?></span> x <span class="amount"><?=number_format($value->product_price,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></span></p>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    endforeach;
                                                }else{
                                                    foreach ($cookie as $key => $value) :
                                                        ?>

                                                        <li class="product-info <?=$value["code"];?>">
                                                            <div class="p-left">
                                                                <a onclick="deleteofferitem(<?=$value["code"];?>)" title="Ürünü kaldır" class="remove_link"></a>
                                                                <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value["code"],$value["name"])))?>">
                                                                    <img class="img-responsive" src="<?=$value["img"]?>" alt="Product">
                                                                </a>
                                                            </div>
                                                            <div class="p-right">
                                                                <p class="p-name"><?=$value["name"]?></p>
                                                                <p>Adet: <span class="countprice"><?=$value["params"]["piece"]?></span> × <span class="amount"><?=number_format($value["price"],2)?>&nbsp;<?=Params::getParams_("currency",$value["currency"])?></span></p>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    endforeach;
                                                }
                                            }

                                            ?>


                                        </ul>
                                    </div>

                                    <div class="cart-buttons">
                                        <a href="<?=Yii::app()->createUrl("urun/teklifsepetim")?>" class="button-radius btn-check-out">Sepetim'e Git<span class="icon"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./main header -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- main menu-->
            <div class="main-menu">
                <div class="container">
                    <div class="row">
                        <nav class="navbar" id="main-menu">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <a class="navbar-brand" href="#">MENU</a>
                                </div>
                                <div id="navbar" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="<?=Yii::app()->createUrl("site/index")?>">Anasayfa</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <?php if($supplierid=Yii::app()->user->getState("supplier_id")){ ?>
                                        <li><a style="text-transform: none;" href="<?=Yii::app()->createUrl("products/create")?>">Satış Yap</a></li>
                                        <?php }  ?>
                                        <?php if(!empty(Yii::app()->user->getState("user_id"))) : ?>
                                        <li>
                                            <div class="block-wrap-cart">
                                                <div class="iner-block-cart">
                                                    <a href="#">
                                                        <span class="total">Sepetim</span>
                                                    </a>
                                                </div>
                                                <div class="block-mini-cart">
                                                    <div class="mini-cart-content">
                                                        <h5 class="mini-cart-head">Sepetinizde <span id="bcount"><?=$say;?></span> ürün var</h5>
                                                        <div class="mini-cart-list">
                                                            <ul id="b_ul">
                                                                <?php

                                                                if($say != 0) {
                                                                    if(!empty(Yii::app()->user->getState("user_id"))){
                                                                        foreach ($products_basket as $key => $value) :
                                                                ?>
                                                                        <li class="product-info <?=$value->code;?>">
                                                                            <div class="p-left">
                                                                                <a style="cursor: pointer" onclick="deleteofferitem(<?=$value->code;?>)" title="Ürünü kaldır" class="remove_link"><i class="fa fa-times"></i></a>
                                                                                <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>">
                                                                                    <img class="img-responsive" src="<?=$value->product_imageS?>" alt="Product">
                                                                                </a>
                                                                            </div>
                                                                            <div class="p-right">
                                                                                <p class="p-name"><?=$value->product_name?></p>
                                                                                <p class="product-price">$139.98</p>
                                                                                <p>Adet: <span class="countprice"><?=$value->count_number?></span> x <span class="amount"><?=number_format($value->product_price,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></span></p>
                                                                            </div>
                                                                        </li>
                                                                <?php
                                                                        endforeach;
                                                                    }else{
                                                                        foreach ($cookie as $key => $value) :
                                                                ?>

                                                                        <li class="product-info <?=$value["code"];?>">
                                                                            <div class="p-left">
                                                                                <a onclick="deleteofferitem(<?=$value["code"];?>)" title="Ürünü kaldır" class="remove_link"></a>
                                                                                <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value["code"],$value["name"])))?>">
                                                                                    <img class="img-responsive" src="<?=$value["img"]?>" alt="Product">
                                                                                </a>
                                                                            </div>
                                                                            <div class="p-right">
                                                                                <p class="p-name"><?=$value["name"]?></p>
                                                                                <p>Qty: <span class="countprice"><?=$value["params"]["piece"]?></span> × <span class="amount"><?=number_format($value["price"],2)?>&nbsp;<?=Params::getParams_("currency",$value["currency"])?></span></p>
                                                                            </div>
                                                                        </li>
                                                                <?php
                                                                    endforeach;
                                                                    }
                                                                }

                                                                ?>


                                                            </ul>
                                                        </div>

                                                        <div class="cart-buttons">
                                                            <a href="<?=Yii::app()->createUrl("urun/teklifsepetim")?>" class="button-radius btn-check-out">Sepetim'e Git<span class="icon"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div><!--/.nav-collapse -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ./main menu-->
        </div>
    </div>
</header>
<!-- ./header -->
<?=$content?>
<!-- footer -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="block footer-block-box">
                            <div class="block-head">
                                <div class="block-title">
                                    <div class="block-icon">
                                        <img src="<?=Yii::app()->request->baseUrl;?>/front/data/location-icon.png" alt="store icon">
                                    </div>
                                    <div class="block-title-text text-sm">Gotedarik'te</div>
                                    <div class="block-title-text text-lg">Bir tedarikçi bul</div>
                                </div>
                            </div>
                            <div class="block-inner">
                                <div class="block-info clearfix">
                                    Yaşadığınız ülkeyi,şehiri yada posta kodunu girin
                                </div>
                                <div class="block-input-box box-radius clearfix">
                                    <input type="text" class="input-box-text" placeholder="Posta Kodu, Şehir, Ülke">
                                    <button class="block-button">Go</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="block footer-block-box">
                            <div class="block-head">
                                <div class="block-title">
                                    <div class="block-icon">
                                        <img src="<?=Yii::app()->request->baseUrl;?>/front/data/email-icon.png" alt="store icon">
                                    </div>
                                    <div class="block-title-text text-sm">Bizi takip edin</div>
                                    <div class="block-title-text text-lg">Email aboneliği</div>
                                </div>
                            </div>
                            <div class="block-inner">
                                <div class="block-info clearfix">
                                    Yeni haberlerde ilk siz bilgilenin!
                                </div>
                                <div class="block-input-box box-radius clearfix">
                                    <input type="text" class="input-box-text" placeholder="Email adresiniz">
                                    <button class="block-button">Go</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="block footer-block-box">
                            <div class="block-head">
                                <div class="block-title">
                                    <div class="block-icon">
                                        <img src="<?=Yii::app()->request->baseUrl;?>/front/data/partners-icon.png" alt="store icon">
                                    </div>
                                    <div class="block-title-text text-sm">İş</div>
                                    <div class="block-title-text text-lg">Ortaklarımız</div>
                                </div>
                            </div>
                            <div class="block-inner">
                                <div class="block-owl">
                                    <ul class="kt-owl-carousel list-partners" data-nav="true" data-autoplay="true" data-loop="true" data-items="1">
                                        <li class="partner"><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/partner1.jpg" alt="partner"></a></li>
                                        <li class="partner"><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/partner2.jpg" alt="partner"></a></li>
                                        <li class="partner"><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/partner3.jpg" alt="partner"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-2 col-sm-4 block-link-wapper">
                        <div class="block-link">
                            <ul class="list-link">
                                <li class="head"><a href="#">Buyer Central</a></li>
                                <li><a href="#">Sign in</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Buyer Protection</a></li>
                                <li><a href="#">Payment Options</a></li>
                                <li><a href="#">EMI Payment</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 block-link-wapper">
                        <div class="block-link">
                            <ul class="list-link">
                                <li class="head"><a href="#">Merchant Central</a></li>
                                <li><a href="#">Merchant Sign In</a></li>
                                <li><a href="#">Merchant Registration</a></li>
                                <li><a href="#">How Does It Work</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Fulfillment by ShopClues</a></li>
                                <li><a href="#">Merchant Tools</a></li>
                                <li><a href="#">Best Practice</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 block-link-wapper">
                        <div class="block-link">
                            <ul class="list-link">
                                <li class="head"><a href="#">Information</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Band of Trust</a></li>
                                <li><a href="#">ShopClues History</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">In the Press</a></li>
                                <li><a href="#">Awards New</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 block-link-wapper">
                        <div class="block-link">
                            <ul>
                                <li class="head"><a href="#">Contact Us</a></li>
                                <li><a href="#">Customer Support</a></li>
                                <li><a href="#">Merchant Support</a></li>
                                <li><a href="#">Merchant Inquiries</a></li>
                                <li><a href="#">Product Reviews</a></li>
                                <li><a href="#">Brand Inquiries</a></li>
                                <li><a href="#">Bulk Orders</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 block-link-wapper">
                        <div class="block-link">
                            <ul class="list-link">
                                <li class="head"><a href="#">help</a></li>
                                <li><a href="#">See all Help</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                            <ul>
                                <li class="head"><a href="#">OTHER SERVICES</a></li>
                                <li><a href="#">Market America Gear</a></li>
                                <li><a href="#">Apply for Market</a></li>
                                <li><a href="#">America Credit Card</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 block-link-wapper">
                        <div class="block-link">
                            <ul class="list-link flag">
                                <li class="head"><a href="#">INTERNATIONAL SHOPPING</a></li>
                                <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/flag1.png" alt="flang">Customer Support</a></li>
                                <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/flag2.png" alt="flang">Canada</a></li>
                                <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/flag3.png" alt="flang">Mexico</a></li>
                                <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/flag4.png" alt="flang">United Kingdom</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-social">
        <div class="container">
            <div class="row">
                <div class="block-social">
                    <ul class="list-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-pied-piper"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
                <div class="block-payment">
                    <ul class="list-logo">
                        <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/payment1.png" alt="Payment Logo"></a></li>
                        <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/payment2.png" alt="Payment Logo"></a></li>
                        <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/payment3.png" alt="Payment Logo"></a></li>
                        <li><a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/payment4.png" alt="Payment Logo"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="block-coppyright">
                    © 2016 Gotedarik. Her hakkı saklıdır.
                </div>
                <div class="block-shop-phone">
                    Shop by phone <strong>1-899-353-2268</strong>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ./footer -->
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/lib/easyzoom/easyzoom.js"></script>
<!-- COUNTDOWN -->
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/lib/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/lib/countdown/jquery.countdown.js"></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/front/js/script.js"></script>
</body>
</html>