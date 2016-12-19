<div class="container">
    <nav class="woocommerce-breadcrumb">
        <a href="<?=Yii::app()->baseUrl;?>">OrganizeTedarik</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
        <a href="<?=Yii::app()->createUrl('yardim/index');?>">Yardım</a>

    </nav><!-- /.woocommerce-breadcrumb -->
</div>
<div class="electro-tabs electro-tabs-wrapper wc-tabs-wrapper">
    <div class="electro-tab" id="tab-profil">
        <div style="padding: 20px;" class="container">
            <h3>Organizetedarik Yardım</h3>
            <hr>
            <?php $this->renderPartial("menu"); ?>
            <div class="advanced-review row helpbox">
                
                <?php $this->renderPartial("solmenu"); ?>
                <?php $this->renderPartial("sagmenu",array("modelquestion" => $modelquestion)); ?>


            </div>

        </div>
    </div>
</div>
