<div id="content" class="site-content" tabindex="-1">
    <div class="container">
         <form class="woocommerce-ordering" method="get">
        <nav class="woocommerce-breadcrumb" ></nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">


                <header class="page-header">
                    <h1 class="page-title">Arama Sonuçları</h1>
                    <p class="woocommerce-result-count"><?=$item_count?> üründen <?=$curret_itemcount?> tane gösteriliyor</p>
                </header>

                <div class="shop-control-bar">
                    <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                    </ul>
                   
                        <select name="orderby" class="orderby" onchange="this.form.submit()">
                            <option value="smart">Akıllı Sıralama</option>
                            <option <?php if(isset($_GET["orderby"]) && trim($_GET["orderby"])=="popularity"){?>selected<?php }?> value="popularity">Popüler Olanlar</option>
                            <option <?php if(isset($_GET["orderby"]) && trim($_GET["orderby"])=="price"){?>selected<?php }?> value="price" >Fiyat Artan</option>
                            <option <?php if(isset($_GET["orderby"]) && trim($_GET["orderby"])=="price-desc"){?>selected<?php }?> value="price-desc" >Fiyat Azalan</option>
                            <option <?php if(isset($_GET["orderby"]) && trim($_GET["orderby"])=="date-desc"){?>selected<?php }?> value="date-desc" >Tarih Azalan (En yeni ürünler)</option>
                            <option <?php if(isset($_GET["orderby"]) && trim($_GET["orderby"])=="date"){?>selected<?php }?> value="date" >Tarih Artan</option>
                        </select>
                        
                        <?=CHtml::dropdownlist("pagesize",$pagesize,Params::getParams("search_pagesize"),array('onchange'=>'this.form.submit()','class'=>'electro-wc-wppp-select c-select'))?>
                       
                   
                 
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">

                        <ul class="products columns-3">

                        <?php foreach($products as $key=>$value):
                        if($key==0)
                         {
                            $ck="first";
                         }else if(($key+1)%3==1)
                         {
                            $ck="first";
                         }else if(($key+1)%3==2)
                         {
                            $ck="end";
                         }else{
                            $ck="";
                         }
                         ?>
                            <li class="product <?=$ck?>">
                                <div class="product-outer1">


                                    <div class="product-inner">

                                        <?php if(!empty($value->discount)):?>
                                        <div class="discount-container pull-right">
                                                <div class="green_color">
                                                    <div class="discount-detail ">
                                                        <span class="percentage">%</span>
                                                        <span class="rate"><?=$value->discount?></span>
                                                        <span class="indirim">İndirim</span>
                                                    </div>
                                                </div>
                                         </div>
                                      <?php endif;?>

                                        <span class="loop-product-categories"><a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->name)))?>" rel="tag"><?=$value->productgroup_name?></a></span>
                                        <a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->name)))?>">
                                            <h3><?=$value->name?></h3>
                                            <div class="product-thumbnail">

                                                <img src="<?=Yii::app()->params["cdn"].$value->imageS?>" alt="">

                                            </div>
                                        </a>

                                        <?php if($value->salestype==2):?>
                                            <div class="price-add-to-cart">


                                                        </div><!-- /.price-add-to-cart -->
                                                        <div class="deal-countdown-timer">
                                                            <div id="deal-countdown1" class="countdown">
                                                                <span data-value="1" class="days"><span class="value SearchProductBid_day_<?=$value->code?>">0</span><b>GÜN</b></span>
                                                                <span class="hours"><span class="value SearchProductBid_hour_<?=$value->code?>">0</span><b>Saat</b></span>
                                                                <span class="minutes"><span class="value SearchProductBid_min_<?=$value->code?>">0</span><b>Dakika</b></span>
                                                                <span class="seconds"><span class="value SearchProductBid_sec_<?=$value->code?>">0</span><b>Saniye</b></span>
                                                            </div>
                                                        </div>

                                                       <script>

                                                         showTimerRemaining(<?=(int)(string)$value->lastshowdates/1000?>,$(".SearchProductBid_day_<?=$value->code?>"),$(".SearchProductBid_hour_<?=$value->code?>"),$(".SearchProductBid_min_<?=$value->code?>"),$(".SearchProductBid_sec_<?=$value->code?>"));
                                                         </script>
                                        <?php else:?>
                                            <?php if(!empty($value->discount)):?>
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        <ins><span class="amount"> <?= number_format($value->price,2)?> <?=Params::getParams_("currency",$value->currency)?></span></ins>
                                                        <del><span class="amount"><?=Func::inidianCalculation($value->price,$value->discount,2)?> <?=Params::getParams_("currency",$value->currency)?></span></del>
                                                        <span class="amount"> </span>
                                                    </span>
                                                </span>
                                            </div><!-- /.price-add-to-cart -->

                                        <?php else:?>
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        <ins><span class="amount"> </span></ins>
                                                        <span class="amount"> <?= number_format($value->price,2)?> <?=Params::getParams_("currency",$value->currency)?></span>
                                                    </span>
                                                </span>

                                            </div><!-- /.price-add-to-cart -->
                                            <?php endif;?>
                                        <?php endif;?>

                                        <?php if(!empty(Yii::app()->user->getState("user_id"))):?>
                                            <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <?php $supplier_id =Yii::app()->user->getState("supplier_id"); if(!isset($supplier_id)) : $style = "style='text-align: center; float: none;'";?>
                                                            <a onclick="addcomparelist(<?=$value->code?>)" class="add-to-compare-link">Karşılaştır</a>
                                                        <?php endif; ?>
                                                        <a <?=$style?> rel="nofollow" onclick="addfollowlist(<?=$value->code?>)" class="add_to_wishlist">Listene Ekle</a>
                                                    </div>
                                             </div>
                                        <?php endif;?>
                                    </div>
                                    <!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                           
                           <?php endforeach?>

                        </ul>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
                        <ul class="products columns-3">

                         <?php foreach($products as $key=>$value):?>
                            <li class="product list-view">
                                <div class="media">


                                    <div class="media-left">

                                        <a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->name)))?>">
                                            <img class="wp-post-image"  src="<?=Yii::app()->params["cdn"].$value->imageS?>" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">

                                        <div class="row">

                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="javascript:;"><?=$value->productgroup_name?></a></span><a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->name)))?>"><h3><?=$value->name?></h3>
                                                    <a rel="tag" href="javascript:;" style="color:#333"><?=$value->subtitle?></a>
                                                    <hr>


                                                    <?php if($value->salestype==2):?>
                                                    <div class="deal-countdown-timer">
                                                        <div id="deal-countdown1" class="countdown">
                                                             <span data-value="1" class="days"><span class="value 2SearchProductBid_day_<?=$value->code?>">0</span><b>GÜN</b></span>
                                                            <span class="hours"><span class="value 2SearchProductBid_hour_<?=$value->code?>">0</span><b>Saat</b></span>
                                                            <span class="minutes"><span class="value 2SearchProductBid_min_<?=$value->code?>">0</span><b>Dakika</b></span>
                                                            <span class="seconds"><span class="value 2SearchProductBid_sec_<?=$value->code?>">0</span><b>Saniye</b></span>
                                                        </div>
                                                         <script>

                                                         showTimerRemaining(<?=(int)(string)$value->lastshowdates/1000?>,$(".2SearchProductBid_day_<?=$value->code?>"),$(".2SearchProductBid_hour_<?=$value->code?>"),$(".2SearchProductBid_min_<?=$value->code?>"),$(".2SearchProductBid_sec_<?=$value->code?>"));
                                                         </script>
                                                    </div>
                                                     <?php endif;?>

                                                </a>
                                            </div>
                                        
                                            <div class="col-xs-12">

                                                <?php if($value->salestype==2):?>
                                                <div class="price-add-to-cart">
                                                    <div class="price">
                                                        <div class="electro-price">
                                                            <div class="ibf">
                                                                <span style="font-size: 12px; word-wrap: break-word!important;">İhale Başlangıç Fiyatı</span><br>
                                                                <ins><span> <?=number_format($value->startingprice,2)?> <?=Params::getParams_("currency",$value->currency)?></span></ins>
                                                            </div>
                                                            <div class="stf">
                                                                <span style="font-size: 12px;">Son Teklif Fiyatı</span><br>
                                                                <ins><span> <?=!empty($value->lastbidprice)?number_format($value->lastbidprice,2)." ".Params::getParams_("currency",$value->currency):"Yok"?></span></ins>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div><!-- /.price-add-to-cart -->
                                            <?php endif;?>

                                              <?php if(!empty(Yii::app()->user->getState("user_id"))):?>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" onclick="addfollowlist(<?=$value->code?>)" rel="nofollow" href="javascript:;">Listene Ekle</a>


                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <aonclick="addcomparelist(<?=$value->code?>)" class="add-to-compare-link" href="javascript:;">Karşılaştır</a>
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        <?php endforeach;?>
                   
                        </ul>
                    </div>
                </div>
                <div class="shop-control-bar-bottom">
                  
                   
                    <nav class="woocommerce-pagination">
                           <?php

                        $this->widget('CLinkPager', array(
                            'currentPage'=>$current_page,
                            'itemCount'=>$item_count,
                            'pageSize'=>$pagesize,
                            'maxButtonCount'=>5,
                            //'nextPageLabel'=>'My text >',
                            'header'=>'',
                            'htmlOptions'=>array('class'=>'page-numbers'),
                            'selectedPageCssClass' => 'page-numbers current',
                        ));


                        ?>
                    </nav>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar" role="complementary">
            <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                <ul class="product-categories category-single">
                    <li class="product_cat">
                        <ul class="show-all-cat">
                            <li class="product_cat"><span class="show-all-cat-dropdown">Tüm Kategorileri Göster</span>

                                <ul>

                                    
                                     <?php

                                      foreach($productgrouptree as $key=>$value):?>

                                        <?php if(isset($value["is"]) && $value["is"]==0):?>

                                        <li class="cat-item current-cat ccat"><a href="javascript:;" onclick="buildsearch({'productgroup':'<?=$value["pgID"]?>'})"><?=$value["name"]?></a> <span class="count">(<?=$value["is"]?>)</span>
                                            <ul class='children cihe' style="display: none! important;">
                                                <?php foreach($value["subs"] as $key2=>$value2):?>
                                                    <li class="cat-item"><a href="javascript:;" onclick="buildsearch({'productgroup':'<?=$value2["pgID"]?>'})"><?=$value2["name"]?></a> <span class="count">(<?=$value2["is"]?>)</span></li>
                                                    
                                                <?php endforeach?>
                                            </ul>
                                        </li>

                                     <?php endif;?>

                                    <?php endforeach?>
                                   
                                </ul>
                            </li>
                        </ul>

                        <ul>



                            <?php foreach($productgrouptree as $key=>$value):?>

                                <?php if(isset($value["is"]) && $value["is"]>0):?>

                                <li class="cat-item current-cat" style="font-weight: 700"><span style="cursor:pointer;" onclick="buildsearch({'productgroup':'<?=$value["pgID"]?>'})"><?=$value["name"]?></span> <span class="count">(<?=$value["is"]?>)</span>
                                    <ul class='children'>
                                        <?php foreach($value["subs"] as $key2=>$value2):?>
                                             <?php if(isset($value2["is"]) && $value2["is"]>0):?>
                                            <li class="cat-item" style="font-weight: 500"><a href="javascript:;" onclick="buildsearch({'productgroup':'<?=$value2["pgID"]?>'})"><?=$value2["name"]?></a> <span class="count">(<?=$value2["is"]?>)</span></li>
                                            <?php endif;?>
                                        <?php endforeach?>
                                    </ul>
                                </li>

                             <?php endif;?>

                            <?php endforeach?>


                        </ul>
                     

                    </li>
                </ul>
            </aside>

            <aside class="widget woocommerce widget_layered_nav marginbottom20">
                <h3 class="widget-title">Fiyat Aralığı</h3>
                <ul class="searchprc">
                    <li><input value="<?=isset($_GET["pricestart"])?$_GET["pricestart"]:""?>" id="pricestart" type="number" style="padding: 10px;" type="text" placeholder="En düşük"> </li>
                    <li>- <input value="<?=isset($_GET["priceend"])?$_GET["priceend"]:""?>" id="priceend" type="number" style="padding: 10px;" type="text" placeholder="En yüksek"></li>
                    <li><button onclick="buildsearch({'pricestart':$('#pricestart').val(),'priceend':$('#priceend').val()})"><i class="fa fa-search"></i></button></li>
                </ul>
            </aside>

            <div class="clearfix"></div>
            <br><br>

            <aside class="widget widget_electro_products_filter">
                <h3 class="widget-title">Filtreler</h3>
                <aside class="widget woocommerce widget_layered_nav">
                    <h3 class="widget-title">Satış Türü</h3>
                    <!--
                    <ul>
                        <li style=""><a href="#">Sabit Fiyat</a> <span class="count">(4)</span></li>
                        <li style=""><a href="#">İhale</a> <span class="count">(2)</span></li>

                    </ul>

                    -->
                    <ul>
                        <li><input <?php if(isset($_GET["salestype"]) && $_GET["salestype"]==1){?>checked<?php }?> onclick="$(this).prop('checked')?buildsearch({'salestype':1}):buildsearch({'salestype':false})" type="checkbox">&nbsp; Sabit Fiyat</li>
                        <li><input <?php if(isset($_GET["salestype"]) && $_GET["salestype"]==2){?>checked<?php }?> onclick="$(this).prop('checked')?buildsearch({'salestype':2}):buildsearch({'salestype':false})" type="checkbox">&nbsp; İhale</li>
                    </ul>
                   
                </aside>

                <aside class="widget woocommerce widget_layered_nav">
                    <h3 class="widget-title">Kargo</h3>
                     
                     <ul>
                        <li><input <?php if(isset($_GET["cargopricetype"]) && $_GET["cargopricetype"]==2){?>checked<?php }?> onclick="$(this).prop('checked')?buildsearch({'cargopricetype':2}):buildsearch({'cargopricetype':false})" type="checkbox">&nbsp; Ücretsiz Kargo</li>
                        <li><input <?php if(isset($_GET["cargopricetype"]) && $_GET["cargopricetype"]==1){?>checked<?php }?> onclick="$(this).prop('checked')?buildsearch({'cargopricetype':1}):buildsearch({'cargopricetype':false})" type="checkbox">&nbsp; Diğer</li>
                    </ul>

                </aside>


            </aside>

        </div>
      </form>
    </div><!-- .container -->
</div><!-- #content -->




<script type="text/javascript">

 
function buildsearch(carr)
{

        <?php 
        $params=array();
        if(isset($_GET) && count($_GET)>0){
            
            foreach($_GET as $key=>$value)
            {
                $params[$key]=$value;
            }

        }
        ?>

        var params=<?= json_encode($params)?>;
        
        for(i in carr)
        {
            if(carr[i]!=null && carr[i]!="")
            {

                 params[i]=carr[i];
            }else if(carr[i]==false)
            {
                if(params[i]!=null)
                {
                    delete params[i];
                }
            }

        }
       
        var data={
            "params":params
        };

        var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

        $.ajax({
         type: "POST",
         dataType:'json',  
         url: "<?=Yii::app()->createUrl("urun/searchbuild")?>", 
         data: dataString,
         timeout: 30000,
         success: function(data)
         {

            
            window.location=data.url;

            
         }
        });
    
}
</script>