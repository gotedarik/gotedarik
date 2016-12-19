<?php

$this->renderPartial("head");


?>
<link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/front/css/jquery.fancybox.css">
<script src="<?=Yii::app()->baseUrl;?>/front/js/jquery.elevatezoom.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/front/js/jquery.fancybox.pack.js"></script>

    <div class="row setup-content" id="step-4">

    </div>

</div>


<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <div style="margin-top:40px"></div>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="product">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-product-wrapper">

                                <div class="product-images-wrapper">
                                    <?php if($modelProduct->salestype==2):?>
                                        <span class="onsale">İhale !</span>
                                    <?php endif?>
                                    <div class="images electro-gallery">
                                        <div style="padding: 50px 70px; border: 1px solid #ddd" class="thumbnails-single owl-carousel">
                                            <?php foreach($arrimages as $key=>$value):?>
                                                <img id="zoom_03"  src="<?=$value["imageXL"]?>" data-echo="<?=$value["imageXL"]?>" class="wp-post-image setsizeimg" alt="">
                                            <?php endforeach?>
                                        </div><!-- .thumbnails-single -->

                                        <div id="gallery_01" class="thumbnails-all columns-5 owl-carousel">
                                            <?php foreach($arrimages as $key=>$value):?>
                                                <a href="javascript:;"  style="padding: 10px" data-image="<?=$value["imageXL"]?>" data-zoom-image="<?=$value["imageXL"]?>">
                                                    <img id="zoom_03" style="width: 60px; height: 60px;" class="wp-post-image" src="<?=$value["imageS"]?>" />
                                                </a>
                                            <?php endforeach;?>
                                        </div><!-- .thumbnails-all -->
                                    </div><!-- .electro-gallery -->
                                </div><!-- /.product-images-wrapper -->

                                <div class="summary entry-summary give_height">

                                    <h1 itemprop="name" class="product_title entry-title"><?=$modelProduct->name?></h1>
                                    <h6 style="font-size: 12px;"><?=$modelProduct->subtitle?></h6>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="fiyat pull-lg-left">
                                            <?php if($modelProduct->price > 0) :  ?>
                                                <?=number_format($modelProduct->price,2)?>
                                                <span style="font-size: 16px"><?=Params::getParams_("currency",$modelProduct->currency)?></span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="woocommerce-product-rating pull-lg-right">
                                            <div class="star-rating" title="5 üzderinden toplam puanı <?=$modelProduct->totalpoint?>">
                                                    <span style="width:<?=Func::percentagepoints($modelProduct->totalpoint)?>%">
                                                        <strong itemprop="ratingValue" class="rating"><?=$modelProduct->totalpoint?></strong>
                                                        out of <span itemprop="bestRating">5</span>             üzerinden
                                                        <span itemprop="ratingCount" class="rating"><?=$modelProduct->totalpoint?></span>
                                                        puan aldı
                                                    </span>
                                            </div>

                                            <a href="#reviews" class="woocommerce-review-link">(<span itemprop="reviewCount" class="count"><?=$modelProduct->uservotecount?></span> Kişi Oyladı)</a><br>
                                            <span style="font-weight: bold; font-size: 12px; text-align: center"><a style="color: #484848" href="#">Yorum (300)</a> </span>
                                        </div><!-- .woocommerce-product-rating -->
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if(isset($modelSupplierscompany->name) && !empty($modelSupplierscompany->name)):?>

                                            <div class="seller">Satıcı: <a href="#"><?=$modelSupplierscompany->name?></a> | <a href="#">Satıcının Diğer Ürünleri</a> |
                                                Satıcının Genel Puanı <span style="background-color: #f28b00; color: white; padding: 4px; border-radius: 2px;"><?=!empty($modelSupplierscompany->totalpoint)?$modelSupplierscompany->totalpoint."/10":"-"?></span>
                                            </div>
                                        <?php endif?>

                                    </div>
                                    <div class="clearfix"></div>
                                    <?php if($modelProduct->salestype==2):?>
                                    <hr>
                                    <div  class="col-md-12">
                                        <div class="form-group timer_background">
                                            <label for="inputEmail3" class="control-label">İhale Bitimine Kalan Süre</label>
                                            <div class="col-sm-12">
                                                <div class="deal-countdown-timer center-block ">
                                                    <div id="deal-countdown1" class="countdown">
                                                        <span data-value="1" class="days"><span class="value ncolor" id="pro_day">1</span><b>GÜN</b></span>
                                                        <span class="hours"><span class="value ncolor" id="pro_hour">7</span><b>Saat</b></span>
                                                        <span class="minutes"><span class="value ncolor" id="pro_min">29</span><b>Dakika</b></span>
                                                        <span class="seconds"><span class="value ncolor" id="pro_sec">13</span><b>Saniye</b></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="col-md-12">
                                        <?php if($modelProduct->salestype==2):?>
                                        <div class="ihaleblok">
                                            <?php else:?>
                                            <div class="ihaleblok1">
                                            <?php endif?>
                                            <label class="text-center" for="inputEmail3">Adet</label>
                                            <div class="quantity">
                                                <input style="width: 50%" type="number" name="quantity" value="1" min="1" title="Qty" class="input-text qty text"/>
                                            </div>
                                        </div>
                                        <?php if($modelProduct->salestype==2):?>

                                        <div class="ihaleblok">
                                            <label class="text-center" for="inputEmail3">Teklif ver</label>
                                            <div class="tdinput">
                                                <input type="text">
                                                <select class="select-input1" id="">
                                                    <option selected="selected" value="">00 Kr.</option>
                                                    <option value="">10 Kr.</option>
                                                    <option value="">20 Kr.</option>
                                                    <option value="">30 Kr.</option>
                                                    <option value="">40 Kr.</option>
                                                    <option value="">50 Kr.</option>
                                                    <option value="">60 Kr.</option>
                                                    <option value="">70 Kr.</option>
                                                    <option value="">80 Kr.</option>
                                                    <option value="">90 Kr.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                    <?php if($modelProduct->salestype==2):?>

                                    <button style="width: 100%;" type="submit" class="single_add_to_cart_button button">Teklif Ver
                                    </button>
                                    <?php else: ?>

                               
                                    <button style="width: 100%;" type="submit" class="single_add_to_cart_button button">Teklif Sepetine Ekle
                                    </button>

                                    <?php endif; ?>
                                </div>

                            </div>
                        </div><!-- /.single-product-wrapper -->
                    </div>

                </div>


                <div class="row">
                    <div style="margin-top: -100px;" class="col-lg-12">
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">

                                <li class="nav-item description_tab">
                                    <a href="#tab-description" class="active" data-toggle="tab">Ürün Açıklaması</a>
                                </li>

                                <?php if($modelProduct->salestype==2):?>
                                    <li class="nav-item specification_tab">
                                        <a href="#tab-specification" data-toggle="tab">Teklif Verenler Listesi</a>
                                    </li>
                                <?php endif;?>

                            </ul>

                            <div class="tab-content">


                                <div class="tab-pane active in panel entry-content wc-tab" id="tab-description">
                                    <?=$modelProduct->text?>
                                </div>

                                <?php if($modelProduct->salestype==2):?>
                                    <div class="tab-pane panel entry-content wc-tab" id="tab-specification">
                                       
                                    </div><!-- /.panel -->
                                <?php endif;?>

                            </div>
                        </div><!-- /.woocommerce-tabs -->
                    </div>
                </div>




        </div><!-- /.product -->

        </main><!-- /.site-main -->
    </div><!-- /.content-area -->
        <div style="background: #F8F8F8; border: 1px solid #e5e5e5;" class="col-md-12">

            <a href="<?=Yii::app()->createUrl('products/productinformations')?>" class="btn btn-primary nextBtn btn-lg pull-left" type="button" >Geri Git</a>
            <a onclick="productconfirm()" href="javascript:;" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Onayla ve Yayına Al</a>
        </div>
</div><!-- /.container -->
    <div class="modal fade" id="scmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Başarılı</h4>
                </div>
                <div class="modal-body">
                    <p>Ürün yayına Alındı</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script type="text/javascript">
    $("#zoom_03").elevateZoom({
        gallery:'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true
     });

    $("#zoom_03").bind("click", function(e) {
        var ez =   $('#zoom_03').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });


function productconfirm()
{
      $.ajax({
         type: "POST",
         dataType:'json',  
         url: params.site+"/products/confirm", 
         timeout: 30000,
             success: function(data)
             {

                if(data.sonuc==1)
                {
                    $("#scmodal").modal();
                    window.location=params.site+"/products/list";

                }
             },error: function (xhr, ajaxOptions, thrownError) {
                   alert("Hata oluştu lütfen tekrar deneyiniz.");
             }
        });
}

<?php if($modelProduct->salestype==2):?>
    showTimerRemaining(<?=strtotime($modelProduct->lastshowdates)?>,$("#pro_day"),$("#pro_hour"),$("#pro_min"),$("#pro_sec"));
<?php endif;?>
</script>