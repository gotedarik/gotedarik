<div class="container">
    <nav class="woocommerce-breadcrumb">
        <a href="<?=Yii::app()->baseUrl;?>">OrganizeTedarik</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
        <a href="<?=Yii::app()->createUrl('help/index');?>">Yardım</a>

    </nav><!-- /.woocommerce-breadcrumb -->
</div>
<div class="electro-tabs electro-tabs-wrapper wc-tabs-wrapper">
    <div class="electro-tab" id="tab-profil">
        <div style="padding: 20px;" class="container">
            <h3>Organizetedarik Yardım</h3>
            <hr>
            <?php $this->renderPartial("menu"); ?>

            <div class="advanced-review row helpbox1">
                <div class="col-xs-12 col-md-12">
                    <h4>Arama Sonuçlarınız</h4>
                    <hr>
                    <?php if(count($model) > 0) : ?>
                    <?php foreach ($model as $key => $value):?>
                        <p style="font-size: 14px;"><a href="<?=Yii::app()->createUrl('yardim/musterihizmetleri',array("id"=>Func::buildId($value["qid"],$value["question"])))?>"><?=$value["question"]?></a></p>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p style="font-size: 14px">Sonuç bulunamadı </p>
                    <?php endif; ?>


                </div><!-- /.col -->
                <div class="clearfix"></div>

            </div>

        </div>
    </div>
</div>