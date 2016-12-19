<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Teklif Detayı</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Teklif Detayı</h1>
            <div class="page-content checkout-page">
                <div class="box-border">

                        <table class="table table-bordered table-responsive cart_summary">
                            <thead>
                            <tr>
                                <th colspan="5" class="cart_product">
                                    <b>Teklif No: </b><?=Yii::app()->request->getQuery('id');?>
                                </th>
                                <th>
                                    <a style="margin: 0;" href="<?=Yii::app()->createUrl("listem/liste");?>"class="button pull-right" >Teklif Listelerim</a>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2"></th>
                                <th>Ürün</th>
                                <th>Birim Fiyatı</th>
                                <th>Adet</th>
                                <th>Toplam Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($model as $key => $value) : ?>
                            <tr id="">
                                    <td id="td<?=$value->offers_id?>">
                                        <?php if($value->approval == 0) : ?>
                                            <a target="_blank" class='btn btn-success' onclick='approveoffer(<?=$value->offers_id?>)' id='approve_<?=$value->offers_id?>'>Onayla <i class='fa fa-check'></i></a>
                                        <?php endif; ?>
                                        <?php if($value->approval == 1 ): ?>
                                            <a target="_blank" class='btn btn-danger' onclick='canceloffer(<?=$value->offers_id?>)' id='cancel_<?=$value->offers_id?>'>İptal Et <i class='fa fa-times'></i></a>
                                        <?php endif; ?>

                                    </td>
                                    <td class="cart_product">
                                        <a target="_blank" href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>"><img src="<?=$value->product_imageS?>" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <p class="product-name">
                                            <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>" target="_blank"><?=$value->product_name?></a>
                                        </p>
                                        <small class="cart_ref">Ürün Kodu : #<?=$value->code?></small><br>
                                    </td>

                                <td>
                                    <?php

                                    if(!empty($value->offerunitprice))
                                        echo number_format($value->offerunitprice,2)." ".Params::getParams_("currency",$value->currency);
                                    else
                                        echo "Bekliyor";
                                    ?>
                                </td>
                                <td>
                                    <strong><?=$value->piece?></strong>
                                </td>
                                <td>
                                    <?php

                                    if(!empty($value->offerunitprice))
                                        echo number_format($value->offerunitprice * $value->piece,2)." ".Params::getParams_("currency",$value->currency);
                                    else
                                        echo "Bekliyor";
                                    ?>
                                </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>

</div>
