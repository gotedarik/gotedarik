<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Takip Listesi</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Takip Ettiğiniz Şirketler</h1>
            <div class="page-content checkout-page">
                <div class="box-border">

                        <table class="table table-bordered table-responsive cart_summary">
                            <thead>
                            <tr>
                                <th width="150"></th>
                                <th>Şirket Logosu</th>
                                <th>Şirket Adı</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php


                            if(Func::getFollowcompanycount() == 0){
                                echo "<tr><td style='text-align: center;' colspan='3'>Henüz hiçbir şirketi takip etmiyorsunuz</td></tr>";
                            }

                            ?>
                            <?php foreach ($model as $key => $value) : ?>

                                <tr id="<?=$value->company_id?>">
                                    <td class="profile-userbuttons_<?=$value->company_id?>">
                                        <a onclick="followcompany(<?=$value->company_id?>)" id="flw_<?=$value->company_id?>" type="button" class="btn btn-danger btn-sm"><?=Func::checkFollow($value->company_id,Yii::app()->user->getState("user_id")) == 0?"Takip Et":"Takibi bırak"?></a>
                                    </td>
                                    <td class="cart_product">
                                        <a target="_blank" href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($value->code,$value->companyname)))?>"><img src="<?=$value->companyImg?>" alt="Product"></a>
                                    </td>
                                    <td class="cart_description">
                                        <p class="product-name">
                                            <a href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($value->code,$value->companyname)))?>" target="_blank"><b><?=$value->companyname?></b></a>
                                        </p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>


                        </table>
                    <nav>
                        <?php

                        $this->widget('CLinkPager', array(
                            'currentPage'=>$pages->getCurrentPage(),
                            'itemCount'=>$item_count,
                            'pageSize'=>$page_size,
                            'maxButtonCount'=>5,
                            //'nextPageLabel'=>'My text >',
                            'header'=>'',
                            'htmlOptions'=>array('class'=>'pagination'),
                            'selectedPageCssClass' => 'active',
                        ));


                        ?>
                    </nav>

                </div>
            </div>
        </div>
    </div>

</div>

