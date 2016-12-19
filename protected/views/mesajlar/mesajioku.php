<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb"></nav>

        <div id="primary" class="content-area">
            <main style="border: 1px solid #dddddd;padding: 20px;border-radius: 2px;" id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    
                    <section class="home-v1-recently-viewed-products-carousel section-products-carousel animate-in-view fadeIn animated" data-animation="fadeIn">
                        <header>
                            <h2 class="h1"> <i class="fa fa-inbox" aria-hidden="true"></i>
                                 | Mesajı Oku</h2>
                           
                        </header>
                    </section>
                    <a href="<?=Yii::app()->createUrl("mesajlar/gelenkutusu")?>" class="ubtn ubtn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Gelen Kutusu'na Dön</a>
                    <a href="<?=Yii::app()->createUrl("mesajlar/mesajyaz",array("id"=>Func::buildId($mcode,$msub)))?>" class="ubtn ubtn-success pull-md-right"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Cevap Yaz</a>
                        <div style="margin-top: 10px;">
                            <?php foreach ($model as $key => $value) :?>
                            <table class="table">

                            <tbody>
                            <tr>
                                <td class="borders"><strong>
                                       Konu
                                    </strong>
                                </td>
                                <td class="borders">
                                    <?=$value->subject?>
                                </td>

                                <td class="borders"><strong>Gönderilme Tarihi</strong></td>
                                <td class="borders"><?=Func::datefunc($value->dateadd) ?></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="borders"><strong>
                                        Mesaj -
                                    </strong>
                                     (Gönderen : <i> <?php
                                        if($value->sender == $value->user_id){
                                            echo "<a target='_blank' href='".Yii::app()->createUrl("uye/iletisim",array("id"=>Func::buildId($value->user_id,$value->username)))."'>".$value->username."</a>";
                                        }else if($value->sender == $value->supplier_id){
                                            ;
                                            echo "<a target='_blank' href='".Yii::app()->createUrl("sirket/urunler",array("id"=>Func::buildId($value->scode,$value->suppliername)))."'>".$value->suppliername."</a>";

                                        }
                                        ?>)
                                    </i>
                                </td>
                            </tr>

                            <tr>
                                <td class="borders" colspan="4">
                                    <?=$value->message?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php endforeach; ?>

                        </div>


                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- #content -->
