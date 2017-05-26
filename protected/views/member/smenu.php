<div class="block block-sidebar">
    <div class="block-head">
        <h5 class="widget-title">Hesabım</h5>
    </div>
    <div class="block-inner">
        <div class="block-list-category">
            <ul class="tree-menu">
                <li class="plus">
                    <a href="#">Durum</a>
                    <ul style="display: none;">
                        <li><span></span><a href="<?=Yii::app()->createUrl("products/list");?>">Ürünler</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('products/create')?>">Satış Yap</a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('mesajlar/gelenkutusu')?>">Mesajlar </a><span style="float: right;margin-top: 3px;" class="badge"><?=Func::getumessages();?>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('listem/tekliflerim')?>">Teklifler </a><span style="float: right;margin-top: 3px;" class="badge"><?=Func::nonofferspro();?></span>
                </li>
                <li class="plus">
                    <a href="#">Bilgilerim / Ayarlarım</a>
                    <ul style="display: none;">
                        <li><a href="<?=Yii::app()->createUrl("member/updatesupplier");?>">Bilgileri Düzenle</a></li>
                        <li><span></span><a href="<?=Yii::app()->createUrl("member/changepassword");?>">Şifre Değiştir</a></li>
                    </ul>
                </li>
                <li class="plus">
                    <a href="#">Şirket Bilgilerim</a>
                    <ul style="display: none;">
                        <li><span></span><a href="<?=Yii::app()->createUrl("supplierscompany/update");?>"> Şirket Bilgisi</a></li>
                        <li><span></span><a href="<?=Yii::app()->createUrl("member/companylogo");?>"> Şirket Logosu</a></li>
                        <li><span></span><a href="<?=Yii::app()->createUrl("member/suppliercompanydocuments");?>"> Şirket Belgeleri</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
