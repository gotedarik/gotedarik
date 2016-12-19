<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Teklif Listem</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Teklif Listem</h1>
            <div class="page-content checkout-page">
                <div class="box-border">
                    <?php foreach ($model as $key => $value) :

                    $get=ListemController::getListProduct($value->filo_id);

                    $products=$get["products"];
                    $totalproductscount=$get["totalproductscount"];
                    $productofferprice=$get["productofferprice"];
                    $productread = $get["productofferread"];

                    ?>
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th colspan="2" class="cart_product"><b>Teklif No : </b><?=$value->filo_id?></th>
                            <th><b>Teklif Veriliş Tarihi : </b><?=date("d-m-Y H:i:s",strtotime($value->dateadd))?></th>
                            <th>
                               <b><?= $productread=1?$productread."</b> fiyat belirtildi":"Hiç bir üründe henüz fiyat belirtilmemiş"?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $key2=>$value2) :?>
                        <tr id="<?=$value->code;?>">
                        <td class="cart_product">
                                <a href="#"><img src="<?=$value2->product_imageS?>" alt="Product"></a>
                            </td>
                            <td colspan="3" class="cart_description">
                                <p class="product-name"><a href="#"><?=$value2->product_name?> </a></p>
                                <small class="cart_ref">SKU : #123654999</small><br>
                                <small><a href="#">Color : Beige</a></small><br>
                                <small><a href="#">Size : S</a></small>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="3">Toplam <b><?=count($products)?></b> üründen <b><?=$totalproductscount?></b> ürün gösteriliyor</td>
                                <td>
                                    <a style="margin: 0;" href="<?=Yii::app()->createUrl("listem/listedetay",array("id" => $value->filo_id));?>" class="button pull-right" >Teklif Detayı</a>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                    <?php endforeach; ?>
                    <nav>
                        <?php

                        $this->widget('CLinkPager', array(
                            'currentPage'=>$pages->getCurrentPage(),
                            'itemCount'=>$item_count,
                            'pageSize'=>$page_size,
                            'maxButtonCount'=>5,
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
