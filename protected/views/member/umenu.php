<?php
    if(!isset($active))
    {
        $active="";
    }

?>

<div class="block block-sidebar">
    <div class="block-head">
        <h5 class="widget-title">Hesabım</h5>
    </div>
    <div class="block-inner">
        <div class="block-list-category">
            <ul class="tree-menu">
               
                <li>
                    <a href="<?=Yii::app()->createUrl('mesajlar/gelenkutusu')?>">Mesajlar <span class="badge pull-md-right"><?=Func::getumessages();?></a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('listem/liste')?>">Teklif Listelerim <span class="badge pull-md-right"><?=Func::nonreadoffersuser();?></span></a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('sirket/takipedilensirketler')?>">Takip Ettiğiniz Şirketler <span class="badge pull-md-right"><?=Func::getFollowcompanycount();?></span></a>
                </li>
                <!--
                <li>
                    <a href="<?=Yii::app()->createUrl('urun/ihaleler')?>">İhaleler</a>
                </li>
                -->
                <li>
                    <a href="#">Bilgilerim / Ayarlarım</a>
                    <ul style="display: none;">
                        <li><a href="<?=Yii::app()->createUrl("member/updateuser");?>">Bilgileri Düzenle</a></li>
                        <li><span></span><a href="<?=Yii::app()->createUrl("member/address");?>">Adres Ekle</a></li>
                        <li><span></span><a href="<?=Yii::app()->createUrl("member/changepassword");?>">Şifre Değiştir</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Şirket Bilgilerim</a>
                    <ul style="display: none;">
                        <li><span></span><a href="<?=Yii::app()->createUrl("userscompany/update");?>"> Şirket Bilgisi</a></li>
                        <li><span></span><a href="<?=Yii::app()->createUrl("member/companylogo");?>"> Şirket Logosu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
