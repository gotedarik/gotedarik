<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Tekliflerim</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Teklif Detayı</h1>
            <div class="page-content checkout-page">
                <div class="block block-sidebar box-border">

                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="product-thumbnail"></th>
                            <th class="product-name">Ürün</th>
                            <th class="product-price">Birim Fiyatı</th>
                            <th class="product-price">Adet</th>
                            <th style="text-align: center" class="product-price">Teklifiniz</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="allbasket">
                        <?php

                        if(count($model) == 0){
                            echo "<td style='text-align: center;' colspan='7'>Henüz teklif almadınız</td>";
                        }


                        ?>
                        <?php foreach ($model as $key => $value) : ?>
                            <tr id="21<?=$value->offers_id;?>" class="cart_item">
                                <td id="tick<?=$value->offers_id;?>">
                                    <?php if(!empty($value->offerunitprice)) : ?>
                                        <i style='color: #00A000;' class='fa fa-check-circle-o fa-4x' aria-hidden='true'></i>
                                    <?php endif; ?>
                                </td>

                                <td class="product-thumbnail">
                                    <img width="180" height="180" src="<?=$value->product_imageS?>" alt="">
                                </td>

                                <td data-title="Product" class="product-name">
                                    <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>" target="_blank"><?=$value->product_name?></a>
                                    <br><?=$value->approval == 1?"<span class='text-success' style='font-size: 12px;'>(<a target='_blank' href='".Yii::app()->createUrl("uye/iletisim",array("id" =>Func::buildId($value->users_id,$value->usersname)))."'>".$value->usersname."</a>'in Ürünü Onayladı)</span>":"<span class='text-danger' style='font-size: 12px;'>(<a target='_blank' href='".Yii::app()->createUrl("uye/iletisim",array("id" =>Func::buildId($value->users_id,$value->usersname)))."'>".$value->usersname."</a>'in Onayı Bekleniyor)</span>"?>
                                </td>

                                <td data-title="Price" class="product-price">
                                    <span class="amount"><?=number_format($value->product_price,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></span>

                                </td>

                                <td data-title="Quantity" class="product-quantity">
                                    <strong><?=$value->piece?></strong>
                                </td>

                                <td data-title="Quantity" class="product-quantity">

                                    <input id="product_price_<?=$value->offers_id?>" class="textright  productprice_<?=$value->offers_id?>" style="width: 125px!important; padding: 7px;" type="text" placeholder="0" value="<?=!empty($value->offerunitprice)?number_format($value->offerunitprice,2)." ".Params::getParams_("currency",$value->currency):""?>">
                                </td>
                                <td data-title="Quantity" class="product-quantity">
                                    <a onclick="sendofferunitprice(<?=$value->offers_id?>)" class="btn btn-primary">Teklifi Gönder</a>
                                </td>
                            </tr>
                            <script>
                                $(".productprice_<?=$value->offers_id?>").maskMoney({thousands:'', decimal:'.', allowZero:true,  suffix:"<?=Params::getParams_("currency",$value->currency)?>"});
                            </script>
                        <?php endforeach;?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
