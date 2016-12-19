<div class="clearfix"></div>

<div class="openmblmenu">
    Menü
</div>

<div class="seller1">
    <ul class="seller1ul">
        <?php

          $actions = Yii::app()->controller->action->id;

        ?>
        <li class="<?php if($actions == 'urunler') { echo 'btnaktif'; } ?>"><a href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($modelsupplier->code,$modelcompany->name)))?>">Mağaza Anasayfa</a></li>
        <li class="<?php if($actions == 'dokuman') { echo 'btnaktif'; } ?>"><a href="<?=Yii::app()->createUrl("sirket/dokuman",array("id"=>Func::buildId($modelsupplier->code,$modelcompany->name)));?>">Mağaza Belgeleri</a></li>
        <li class="<?php if($actions == 'magazadegerlendirmeleri') { echo 'btnaktif'; } ?>"><a href="<?=Yii::app()->createUrl("sirket/magazadegerlendirmeleri",array("id"=>Func::buildId($modelsupplier->code,$modelcompany->name)));?>">Mağaza Değerlendirmeleri</a></li>
        <li class="<?php if($actions == 'iletisim') { echo 'btnaktif'; } ?>"><a href="<?=Yii::app()->createUrl("sirket/iletisim",array("id"=>Func::buildId($modelsupplier->code,$modelcompany->name)));?>">İletişim</a></li>
    </ul>

    <div class="clearfix"></div>

</div>
