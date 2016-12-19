

<div style="margin: 0; padding: 0" class="col-md-12">
    <div class="col-md-3">

        <div style="border: 1px solid #e5e5e5; border-radius: 3px;" class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="magazalogo">
                <a href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($modeluser->users_id,$modeluser->name)))?>">
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
                <p><b>Kayıt Tarihi : </b> <?=date("d-m-Y",strtotime($modeluser->dateadd) )?></p>
                <p><b>Email Adresi : </b> <?=$modeluser->email?></p>
                <?php if(!empty(Yii::app()->user->getState("user_id")) || !empty(Yii::app()->user->getState("supplier_id"))) :  ?>
                <p><b>Telefon No : </b>  <?=$modeluser->phone?></p>
                <p><b>Fax No : </b> <?=$modeluser->fax?></p>
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
            <div class="profile-userbuttons profile-userbuttons_<?=$modelcompany->userscompany_id?>">
                <?php $getsup = Yii::app()->user->getState("supplier_id"); if(!empty($getsup)) : ?>
                <a href="<?=Yii::app()->createUrl("sirket/mesajyaz",array("id" => Func::buildId($modeluser->users_id,$modelcompany->name)))?>" class="ubtn btn-success btn-sm">Mesaj Yaz</a>
                <?php
                    $checkfollow = Func::checkFollow($modelcompany->userscompany_id,Yii::app()->user->getState("user_id"));
                ?>

                <?php endif; ?>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
        </div>
        <div class="clearfix"></div>

    </div>
    <div class='modal fade' id='modal' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal'>&times;</button><h4 class='modal-title'>Mesaj</h4></div><div class='modal-body'><p id="parag"></p></div><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Kapat</button></div></div></div></div>
