<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Ürün Karşılaştır</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Ürünleri Karşılaştır</h1>
            <div class="page-content">
                <table class="table table-bordered table-compare">
                    <tbody>
                    <tr>
                        <td class="compare-label">Ürün Resmi</td>
                        <?php foreach ($model as $key=>$value) : ?>
                        <td class="text-center <?=$value->code?>_li">
                            <a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->product_name)))?>"><img src="<?=$value->product_imageS?>" alt="Product"></a>
                        </td>
                        <?php endforeach; ?>

                    </tr>
                    <tr>
                        <td class="compare-label">Ürün Adı</td>
                        <?php foreach ($model as $key=>$value) : ?>
                            <td class="text-center <?=$value->code?>_li">
                                <a href="<?=Yii::app()->createUrl('urun/view',array("id"=>Func::buildId($value->code,$value->product_name)))?>"><?=$value->product_name?></a>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td class="compare-label">Fiyat</td>
                        <?php foreach ($model as $key=>$value) : ?>
                            <td class="price <?=$value->code?>_li"><?=number_format($value->product_price,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></td>
                        <?php endforeach; ?>

                    </tr>
                    <tr>
                        <td class="compare-label"></td>
                        <?php foreach ($model as $key=>$value) : ?>
                        <td class="action <?=$value->code?>_li">
                            <a onclick="addofferlist(<?=$value->code;?>)" class="add-cart button button-sm">Teklif Sepetine Ekle</a>
                            <a onclick="addfollowlist(<?=$value->code?>)" style="cursor: pointer;" class="button button-sm"><i class="fa fa-heart-o"></i></a>
                            <a onclick="deletecompareitem(<?=$value->code;?>)" style="cursor: pointer;" class="button button-sm"><i class="fa fa-close"></i></a>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    </tbody></table>
            </div>
        </div>
    </div>

</div>