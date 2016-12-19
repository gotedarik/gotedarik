<div class="row">
    <?php


    $actions = Yii::app()->controller->action->id;

    ?>
    <div class="buttonshead">
        <a class="<?php if($actions == 'index') { echo 'btnaktif'; } ?>" href="<?=Yii::app()->createUrl("yardim/index")?>">Yardım Anasayfa</a>
        <a class="<?php if($actions == 'musterihizmetleri') { echo 'btnaktif'; } ?>" href="<?=Yii::app()->createUrl("yardim/musterihizmetleri")?>" >Müşteri Hizmetleri</a>
        <div class="clearfix"></div>
    </div>
</div>
