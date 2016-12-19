<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>İhaleler</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">İhaleye girdiğiniz ürünler</h1>
            <div class="page-content checkout-page">
                <div class="box-border">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Ürün Resmi</th>
                            <th>Ürün Adı</th>
                            <th>Teklif Başlangıç Fiyatı</th>
                            <th>En Yüksek Fiyat</th>
                            <th>Benim Teklifim</th>
                            <th>İhale Durumu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model as $key => $value): ?>

                        <tr>
                            <td class="cart_product">
                                <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->productcode,$value->productname)))?>"><img src="<?=$value->prdImgS3url?>" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->productcode,$value->productname)))?>"><?=$value->productname?> </a></p>

                            </td>
                            <td class="price"><span><?=number_format($value->productprice,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></span></td>
                            <td class="price">
                                <?=number_format(UrunController::findmax($value->products_id),2)?><?=Params::getParams_("currency",$value->currency)?>
                            </td>
                            <td class="price">
                                <span><?=number_format($value->price,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></span>
                            </td>
                            <?php
                            $time = date('Y-m-d H:i:s');
                            if($time < $value->lastdate){
                                $text = "İhale Devam Ediyor";
                                $cls = "label-success";
                            }else{
                                $text = "İhale Bitti";
                                $cls = "label-danger";
                            }

                            ?>
                            <td class="cart_avail"><span class="label <?=$cls?>">
                                   <?=$text?>
                                </span></td>

                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav>
                        <?php

                        $this->widget('CLinkPager', array(
                            'currentPage'=>$pages->getCurrentPage(),
                            'itemCount'=>$item_count,
                            'pageSize'=>$page_size,
                            'maxButtonCount'=>5,
                            //'nextPageLabel'=>'My text >',
                            'header'=>'',
                            'htmlOptions'=>array('class'=>'pagination'),
                            'selectedPageCssClass' => 'active',
                        ));


                        ?>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</div>

