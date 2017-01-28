<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Tekkif sepetim</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Teklif sepetim</h1>
            <div class="page-content checkout-page">
                <div class="box-border">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Ürün Resmi</th>
                            <th>Ürün Adı</th>
                            <th>Birim Fiyatı</th>
                            <th>Adet</th>
                            <th class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <tbody id="allbasket">
                        <?php

                        !empty(Yii::app()->user->getState("user_id"))?$say=count(Func::offerbasket()):$say=count(CookieBasket::getAll());

                        if($say == 0)
                            echo "<tr><td style='text-align: center;' colspan='5'>Sepetiniz Boş</td></tr>";

                        ?>

                        <?php
                        if(!empty(Yii::app()->user->getState("user_id"))) {
                            foreach ($model as $key => $value) : ?>

                                <tr id="<?=$value->code;?>">
                                    <td class="cart_product">
                                        <a href="<?= Yii::app()->createUrl("urun/view", array("id" => Func::buildId($value->code, $value->product_name))) ?>" target="_blank"><img src="<?= $value->product_imageS ?>" alt="<?=$value->product_name?>"></a>
                                    </td>
                                    <td class="cart_description">
                                        <p class="product-name"><a href="<?= Yii::app()->createUrl("urun/view", array("id" => Func::buildId($value->code, $value->product_name))) ?>" target="_blank"><?= $value->product_name ?> </a></p>
                                        <small class="cart_ref">Ürün Kodu : <?=$value->code?></small><br>
                                    </td>
                                    <td class="price"><span><?= number_format($value->product_price, 2) ?>
                                            &nbsp;<?= Params::getParams_("currency", $value->currency) ?></span></td>
                                    <td class="qty">
                                        <input id="t_count<?= $value->code; ?>" onchange="changepiece(<?= $value->code; ?>)" class="form-control input-sm" type="text" value="<?= $value->count_number ?>">
                                        <a style="cursor: pointer" onclick="plus(<?= $value->code; ?>);"><i class="fa fa-caret-up plus"></i></a>
                                        <a style="cursor: pointer" onclick="mins(<?= $value->code ?>);"><i class="fa fa-caret-down minus"></i></a>
                                    </td>
                                    <td class="action">
                                        <a style="cursor: pointer;" onclick="deleteofferitem(<?= $value->code ?>)">Delete item</a>
                                    </td>
                                </tr>



                            <?php endforeach; }else{
                            $cookie = CookieBasket::getAll();
                            foreach ($cookie as $key => $value) : ?>

                            <tr id="<?=$value["code"];?>">
                                <td class="cart_product">
                                    <a href="<?= Yii::app()->createUrl("urun/view", array("id" => Func::buildId($value["code"],$value["name"]))) ?>" target="_blank"><img src="<?=$value["img"]?>" alt="<?=$value["name"]?>"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="<?= Yii::app()->createUrl("urun/view", array("id" => Func::buildId($value["code"], $value["name"]))) ?>" target="_blank"><?=$value["name"]?> </a></p>
                                    <small class="cart_ref">Ürün Kodu : <?=$value["code"]?></small><br>
                                </td>
                                <td class="price"><span><?= number_format($value["price"], 2) ?>
                                        &nbsp;<?= Params::getParams_("currency", $value["currency"]) ?></span></td>
                                <td class="qty">
                                    <input id="t_count<?= $value["code"] ?>" onchange="changepiece(<?=$value["code"] ?>)" class="form-control input-sm" type="text" value="<?=$value["params"]["piece"]?>">
                                    <a style="cursor: pointer" onclick="plus(<?= $value["code"] ?>);"><i class="fa fa-caret-up plus"></i></a>
                                    <a style="cursor: pointer" onclick="mins(<?= $value["code"] ?>);"><i class="fa fa-caret-down minus"></i></a>
                                </td>
                                <td class="action">
                                    <a style="cursor: pointer;" onclick="deleteofferitem(<?= $value["code"] ?>)">Delete item</a>
                                </td>
                            </tr>


                            <?php endforeach; } ?>
                        </tbody>

                    </table>
                    <div class="alt_btns">
                        <div class="col-md-6">
                            <a onclick="clearOfferbasket();" style="background: red;color: white" class="button pull-left"><i class="fa fa-trash">&nbsp;&nbsp;</i>Tümünü Temizle</a>
                        </div>
                        <div class="col-md-6">
                            <a class="button pull-right" onclick="sendoffers();">Teklifleri gönder</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>