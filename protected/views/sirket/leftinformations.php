<div class="col-md-12">
    <div style="margin-bottom: 10px;" class="deger">
        <div class="inftitle">Bu mağaza son 12 ayda <span class="text-info"><b>1698</b></span> değerlendirmede <span class="text-success"><b>%99</b></span> olumlu puan aldı.</div>
    </div>
</div>
<div class="clearfix"></div>

<div style="margin: 0; padding: 0" class="col-md-12">
    <div class="col-md-3">

        <div style="border: 1px solid #e5e5e5; border-radius: 3px;" class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="magazalogo">
                <a href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($modelsupplier->code,$modelsupplier->name)))?>">
                    <img class="center-block img-responsive" src="<?=$modelcompany->logos3url?>" alt="">
                </a>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="magazatitle">
                <?=$modelcompany->name?> <i class="fa fa-mobile" aria-hidden="true"></i> <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <hr>
            <div class="minfor">
                <p><b>Kayıt Tarihi : </b> <?=date("d-m-Y",strtotime($modelsupplier->dateadd) )?></p>
                <p><b>Email Adresi : </b> <?=$modelsupplier->email?></p>
                <?php if(!empty(Yii::app()->user->getState("user_id")) || !empty(Yii::app()->user->getState("supplier_id"))) :  ?>
                <p><b>Telefon No : </b>  <?=$modelsupplier->phone?></p>
                <p><b>Fax No : </b> <?=$modelsupplier->fax?></p>
                <?php else: ?>
                    <hr>
                <p class="text-info">Fax ve Telefon numarası için lütfen üye olunuz</p>
                    <hr>
                <?php endif; ?>
                <p><b>Adres :</b></p>
                <p><?=$modelcompany->address?></p>

            </div>
            <hr>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons profile-userbuttons_<?=$modelcompany->supplierscompany_id?>">
                <?php $getsup = Yii::app()->user->getState("supplier_id"); if(empty($getsup)) : ?>
                <a href="<?=Yii::app()->createUrl("sirket/mesajyaz",array("id" => Func::buildId($modelsupplier->code,$modelcompany->name)))?>" class="ubtn btn-success btn-sm">Mesaj Yaz</a>
                <?php
                    $checkfollow = Func::checkFollow($modelcompany->supplierscompany_id,Yii::app()->user->getState("user_id"));
                ?>
                <a onclick="followcompany(<?=$modelcompany->supplierscompany_id?>)" id="flw_<?=$modelcompany->supplierscompany_id?>" type="button" class="ubtn btn-danger btn-sm"><?=$checkfollow == 0?"Takip Et":"Takibi bırak"?></a>

                <?php endif; ?>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
        </div>
        <div class="clearfix"></div>


    </div>
    <div class='modal fade' id='modal' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal'>&times;</button><h4 class='modal-title'>Mesaj</h4></div><div class='modal-body'><p id="parag"></p></div><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Kapat</button></div></div></div></div>
