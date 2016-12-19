<?php

$this->renderPartial("head");

?>
<div class="box-border">
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> 2. Adım</h3>
                <hr>
                <div class="tabs-block">
                    <div class="products-carousel-tabs">
                        <ul class="nav nav-inline">
                            <li class="nav-item"><a class="nav-link active" href="#tab-products-1" data-toggle="tab">Satış Şekliniz</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-products-1" role="tabpanel">

                            <div class="row">
                                <div class="col-lg-9 mar1">
                                    <div class="col-xs-12 col-lg-4">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive center-block" alt="">
                                    </div>

                                    <div class="col-xs-12 col-lg-8">
                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <div class="col-lg-6 col-xs-6">
                                                    <button onclick="setSalesType(1)" type="button" class="<?=Yii::app()->user->getState("salestype")==1?"active1":""?> btn btn-default btn-radio">Sabit Fiyat</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </div>

                                                <div class="col-lg-6 col-xs-6">
                                                    <button onclick="setSalesType(2)" type="button" class="<?=Yii::app()->user->getState("salestype")==2?"active1":""?> btn btn-default btn-radio">İhale Usulü</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-3 mar1"></div>
                            </div>

                        </div>
                    </div>
                </div>


                <a href="<?=Yii::app()->createUrl('products/newproduct')?>" class="btn btn-primary nextBtn btn-md pull-left" type="button" >Geri Git</a>
                <a href="javascript:;" onclick="salesTypeBuild()" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Sonraki Adım</a>
            </div>
        </div>
    </div>

</div>

</div>
<script type="text/javascript">
var salestype_;

<?php if(!empty(Yii::app()->user->getState("salestype"))):?>
    salestype_=<?=Yii::app()->user->getState("salestype")?>;
<?php endif;?>

function salesTypeBuild()
{
    if(salestype_==null)
    {
        alert("Lütfen satış türünü seçiniz.");
    }else{

        window.location=params.site+"/products/salestypebuild";

    }
}

function setSalesType(salestype)
{

    var data={
        "salestype":salestype,
       
    };

    
     var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

    $.ajax({
         type: "POST",
         dataType:'json',  
         url: params.site+"/products/salestypeset", 
         data: dataString,
         timeout: 30000,
         success: function(data)
         {

            salestype_=salestype;
         }
     });

}
</script>