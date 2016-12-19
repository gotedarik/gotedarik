<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb"></nav>

        <div id="primary" class="content-area">
            <main style="border: 1px solid #dddddd;padding: 20px;border-radius: 2px;" id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    
                    <section class="home-v1-recently-viewed-products-carousel section-products-carousel animate-in-view fadeIn animated" data-animation="fadeIn">
                        <header>
                            <h2 style="margin-right: 5px;" class="h1"><a href="<?=Yii::app()->createUrl("mesajlar/gelenkutusu")?>"> <i class="fa fa-inbox" aria-hidden="true"></i>
                                    | Mesajlarım</a></h2>
                           
                        </header>
                    </section>

                    <form>
<pre>
    <?=print_r($model);?>
</pre>
                        <table class="shop_table shop_table_responsive table-hover cart">

                            <thead>
                                <tr>
                                    <th class="product-price"></th>
                                    <th class="product-price">Konu</th>
                                    <th class="product-price">Tarih</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="allbasket">
                            <?php  if(count($model) == 0)echo "<td colspan='4' class='product-quantity' style='text-align: center'>Gelen kutunuz boş</td>"?>
                            <?php foreach ($model as $key => $value) : ?>
                            <tr>
                                <td class="product-quantity">
                                    <?php
                                    if(!empty(Yii::app()->user->getState("user_id"))){
                                        $uid = Yii::app()->user->getState("user_id");
                                    }elseif(!empty(Yii::app()->user->getState("supplier_id"))){
                                        $uid = Yii::app()->user->getState("supplier_id");
                                    }

                                    if($value["read_status"] == 0 && $value["sender"]  != $uid){
                                        $color = "green";
                                    }elseif($value["read_status"] == 0 && $value["sender"]  == $uid){
                                        $color = "red";
                                    }elseif($value["read_status"] == 1){
                                        $color = "red";
                                    }



                                    ?>
                                    <i style="color:<?=$color?>" class="fa fa-circle" aria-hidden="true"></i>
                                <td class="product-quantity"><?=$value["subject"]?></td>
                                <td class="product-quantity"><?=date("d-m-Y H:i:s",strtotime($value["dateadd"]))?></td>
                                <td class="product-quantity">
                                    <a href="<?=Yii::app()->createUrl("mesajlar/mesajoku",array(
                                        "id" => $value["message_code"]
                                    ))?>" class="ubtn ubtn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        Mesajı Oku</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- #content -->
