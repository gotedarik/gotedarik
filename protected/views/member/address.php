<div style="margin: 10px 0px; font-size: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->renderPartial("umenu",array("active"=>"information")); ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="box-border">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Adres Bilgileri</h3>
                                    <div class="row">
                                        <a class="btn btn-success pull-lg-right" href="<?=Yii::app()->createUrl("member/newaddress")?>">Yeni Adres Ekle</a>
                                    </div>
                                    <br>
                                    <?php

                                        if(count($model) > 0){

                                        ?>
                                            <?php if(isset($_GET["update"]) && $_GET["update"]==1):?>
                                                <div id="alertpassword" class="alert alert-success">
                                                    <strong>Bilgiler Başarılı Bir Şekilde Güncellendi.</strong>
                                                </div>
                                            <?php elseif(isset($_GET["update"]) && $_GET["update"]==2):?>
                                                <div id="alertpassword" class="alert alert-danger">
                                                    <strong>Güncellemede Hata Oluştu. Lüfen Tekrar Deneyiniz Veya iletişime Geçiniz.</strong>
                                                </div>
                                            <?php endif;?>

                                            <?php if(isset($_GET["saved"]) && $_GET["saved"]==1):?>
                                                <div id="alertpassword" class="alert alert-success">
                                                    <strong>Adres Başarılı Bir Şekilde Oluşturuldu.</strong>
                                                </div>
                                            <?php elseif(isset($_GET["saved"]) && $_GET["saved"]==2):?>
                                                <div id="alertpassword" class="alert alert-danger">
                                                    <strong>Adres Oluşturulurken Hata Oluştu. Lüfen Tekrar Deneyiniz Veya iletişime Geçiniz.</strong>
                                                </div>
                                            <?php endif;?>

                                            <?php if(isset($_GET["deleted"]) && $_GET["deleted"]==1):?>
                                                <div id="alertpassword" class="alert alert-success">
                                                    <strong>Adres Başarılı Bir Şekilde Silindi.</strong>
                                                </div>
                                            <?php elseif(isset($_GET["deleted"]) && $_GET["deleted"]==2):?>
                                                <div id="alertpassword" class="alert alert-danger">
                                                    <strong>Adres Silinirken Hata Oluştu. Lüfen Tekrar Deneyiniz Veya iletişime Geçiniz.</strong>
                                                </div>
                                            <?php endif;?>


                                    <div class="row">
                                        <table style="background: #ffffff" class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <td><b>Adres</b></td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        foreach ($model as $key => $value) {
                                            echo "<tr>
                                                    <td style='width: 85.444%'>".substr($value->address,0,50)."</td>
                                                    <td><a class='ubtn ubtn-primary' href='".Yii::app()->createUrl("member/editaddress/{$value->address_id}")."'><i class='fa fa-edit'></i></a>
                                                <a class='ubtn btn-danger' href='".Yii::app()->createUrl("member/deleteaddress/{$value->address_id}")."'><i class='fa fa-trash'></i></a></td>
                                                  </tr>";
                                        }


                                        ?>
                                        </tbody>
                                        </table>
                                        <nav class="navigation pagination">
                                            <h2 class="screen-reader-text">Posts navigation</h2>
                                            <div class="nav-links">
                                                <?php
                                                $this->widget('CLinkPager', array(
                                                    'currentPage'=>$pages->getCurrentPage(),
                                                    'itemCount'=>$item_count,
                                                    'pageSize'=>$page_size,
                                                    'maxButtonCount'=>5,
                                                    //'nextPageLabel'=>'My text >',
                                                    'header'=>'',
                                                    'htmlOptions'=>array('class'=>'page-numbers'),
                                                    'selectedPageCssClass' => 'page-numbers current',
                                                ));
                                                ?>
                                            </div>
                                        </nav>
                                    </div>
                                        <?php }else{
                                            echo "Henüz Hiç Adress Eklemediniz";
                                        } ?>
                                </div>
                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>