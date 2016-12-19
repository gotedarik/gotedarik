<div class="clearfix"></div>

<div class="openmblmenu">
    Menü
</div>

<div class="seller1">
    <ul class="seller1ul">
        <?php

          $actions = Yii::app()->controller->action->id;

        ?>
        <li class="<?php if($actions == 'iletisim') { echo 'btnaktif'; } ?>"><a href="<?=Yii::app()->createUrl("uye/iletisim",array("id"=>Func::buildId($modeluser->users_id,$modelcompany->name)));?>">İletişim</a></li>
    </ul>

    <div class="clearfix"></div>

</div>
