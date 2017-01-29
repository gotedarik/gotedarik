<?php

$this->renderPartial("head");

?>

<form role="form">

    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="tabs-block">
                    <div class="products-carousel-tabs">
                        Ürün Özellikleriniz
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-products-11" role="tabpanel">
                            <div class="row padding10">
                                
                                <?php

                                    $this->renderPartial("productinformations/productimages",array(
                                        "arr2images"=>$arr2images,
                                        "arr1images"=>$arr1images,
                                    ));

                                ?>

                                <div class="col-md-7">


                                    <div id="billing_last_name_field" class="form-row form-row">
                                        <label class="" for="billing_last_name">Ürün Başlığı <abbr title="required" class="required">*</abbr></label>
                                        <input type="text" value="<?=$modelProduct->name?>" maxlength="255" placeholder="Ürün Başlığı : " id="product_name" name="billing_last_name" class="input-text ">
                                        <p id="product_name_error" class="error_system"></p>

                                    </div>
                                    <div class="clear"></div>

                                    <div id="billing_last_name_field" class="form-row form-row">
                                        <label class="" for="billing_last_name">Ürün Alt Başlığı <abbr title="required" class="required">*</abbr></label>
                                        <input type="text" value="<?=$modelProduct->subtitle?>" maxlength="255" placeholder="Ürün Alt Başlığı : " id="product_subtitle" name="billing_last_name" class="input-text ">
                                        <p id="product_subtitle_error" class="error_system"></p>

                                    </div>
                                    <div class="clear"></div>


                                    <div id="billing_last_name_field" class="form-row form-row">
                                        <div class="clear"></div>
                                        <div class="sagcount">

                                            <!--
                                            <p style="font-size: 14px;">Satacağınız Üründen Elinizde Kaç Adet Var ?</p>
                                            <div id="CountSelect">

                                                <ul>
                                                    <li class="adeText"><span>Adet</span></li>
                                                    <li style="padding: 0; margin: 0;"><input onkeypress="return isNumber(event)" id="product_count" type="text" value="<?= !empty($modelProduct->piece)?$modelProduct->piece:1?>"></li>
                                                    <li class="adeText"><a href="javascript:;" onclick="countPlus()">+</a></li>
                                                    <li><a onclick="countPlus(true)" href="javascript:;">-</a></li>
                                                </ul>

                                                 <p id="product_count_error" class="error_system"></p>
                                            </div>
                                            <hr>
                                            -->

                                            <div class="p_price">
                                                <p style="font-size: 14px;">Ürün Fiyatı</p>
                                                    <table style="overflow-y: hidden" class="table table-responsive">
                                                        <tbody>
                                                       

                                                         <tr>
                                                            <td style="position: relative;top: 10px;"><b>Para birimi</b></td><td><?= CHtml::dropDownList('product_currency', $modelProduct->currency, Params::getParams("currency"),array("class" => "select-input"))?></td>
                                                        </tr>
                                                        <?php if(Yii::app()->user->getState("salestype")!=1):?>
                                                            <tr>
                                                                <td style="position: relative;top: 10px;"><b>Başlangıç Fiyatı</b></td><td><input id="product_startingprice" class="textright" type="text" placeholder="0" value="<?=!empty($modelProduct->startingprice)?number_format($modelProduct->startingprice,2):""?>"></td>
                                                            </tr>
                                                        <?php endif?>
                                                        <tr>
                                                            <td style="position: relative;top: 10px;"><b>Fiyatı</b></td><td><input id="product_price" class="textright" type="text" placeholder="0" value="<?=!empty($modelProduct->price)?number_format($modelProduct->price,2):""?>"></td>
                                                        </tr>
                                                        </tbody>


                                                    </table>


                                                    <p id="product_price_error" class="error_system"></p>
                                            </div>

                                            <div class="p_price">
                                                <p style="font-size: 14px;">Ürün İndirimi</p>
                                                    <table style="overflow-y: hidden" class="table table-responsive">
                                                        <tbody>
                                                       
                                                        <tr>
                                                            <td style="position: relative;top: 10px;"><b>İndirim</b></td><td>
                                                                <?php

                                                                 $arrdiscount=array();
                                                                 for($i=0;$i<100;$i=$i+5)
                                                                 {
                                                                    $arrdiscount[$i]="%".$i;
                                                                 }
                                                                 echo CHtml::dropDownList('product_discount', $modelProduct->discount, $arrdiscount,array("class" => "select-input")
                                                               );
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        </tbody>


                                                    </table>


                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                </div>
                            </div>
                            <hr>
                            <div class="row padding10">
                                <div class="col-md-12 mar1">
                                    <p id="order_comments_field" class="form-row form-row notes">
                                        <label class="" for="order_comments">Ürün Açıklaması</label>
                                        <textarea cols="5" rows="10" placeholder="Ürün Açıklaması" 
                                        id="product_comments" class="input-text "><?=$modelProduct->text?></textarea>
                                    </p>

                                </div>
                            </div>
                            <hr>

                            <?php if($modelProduct->salestype==1):?>
                            <div class="row padding10">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <i style="color: #00abc5; margin-right: 10px;" class="fa fa-calendar fa-3x"></i><label style="position: relative; top: -10px;">Ürününüz Kaç Gün Satışta Kalsın ?</label>
                                        <div class="clear"></div>
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="calendardays">
                                         

                                                <li>
                                                    <button onclick="lastshowday=3" type="button" class="<?=  $modelProduct->lastshowday==3?"active1":""?> btn btn-default btn-radio2">3 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=5" type="button" class="<?=  $modelProduct->lastshowday==5?"active1":""?> btn btn-default btn-radio2">5 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=7"  type="button" class="<?=  $modelProduct->lastshowday==7?"active1":""?> btn btn-default btn-radio2">7 <br> Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=10"  type="button" class="<?=  $modelProduct->lastshowday==10?"active1":""?> btn btn-default btn-radio2">10 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=30"  type="button" class="<?=  $modelProduct->lastshowday==30?"active1":""?> btn btn-default btn-radio2">1 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=60"  type="button" class="<?=  $modelProduct->lastshowday==60?"active1":""?> btn btn-default btn-radio2">2 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=90"  type="button" class="<?=  $modelProduct->lastshowday==90?"active1":""?> btn btn-default btn-radio2"> 3 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>
                                                <li>
                                                    <button onclick="lastshowday=120"  type="button" class="<?=  $modelProduct->lastshowday==120?"active1":""?> btn btn-default btn-radio2">4 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=180"  type="button" class="<?=  $modelProduct->lastshowday==180?"active1":""?> btn btn-default btn-radio2">6 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                 <li>
                                                    <button onclick="lastshowday=240"  type="button" class="<?=  $modelProduct->lastshowday==240?"active1":""?> btn btn-default btn-radio2">8 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                 <li>
                                                    <button onclick="lastshowday=300"  type="button" class="<?=  $modelProduct->lastshowday==300?"active1":""?> btn btn-default btn-radio2">10 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>


                                                 <li>
                                                    <button onclick="lastshowday=360"  type="button" class="<?=  $modelProduct->lastshowday==360?"active1":""?> btn btn-default btn-radio2">1 <br>  Yıl</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=360*2"  type="button" class="<?= $modelProduct->lastshowday==360*2?"active1":""?> btn btn-default btn-radio2">2 <br>  Yıl</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastshowday=360*3"  type="button" class="<?=  $modelProduct->lastshowday==360*3?"active1":""?> btn btn-default btn-radio2">3 <br>  Yıl</button>
                                                    <input type="checkbox" checked="checked" id="left-item" hidden="hidden">
                                                </li>

                                            </ul>
                                            <div class="clear"></div>
                                            <p id="product_lastshowday_error" class="error_system"></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <?php else:?>
                             <div class="row padding10">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <div class="col-lg-12 col-md-12">
                                        <i style="color: #00abc5; margin-right: 10px;" class="fa fa-calendar fa-3x"></i><label style="position: relative; top: -10px;">Ürününüz Kaç Gün İhalede Kalsın ?</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="calendardays">
                                         

                                                <li>
                                                    <button onclick="lastbidday=3" type="button" class="<?=  $modelProduct->lastbidday==3?"active1":""?> btn btn-default btn-radio2">3 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastbidday=5" type="button" class="<?=  $modelProduct->lastbidday==5?"active1":""?> btn btn-default btn-radio2">5 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastbidday=7"  type="button" class="<?=  $modelProduct->lastbidday==7?"active1":""?> btn btn-default btn-radio2">1 <br> Hafta</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastbidday=10"  type="button" class="<?=  $modelProduct->lastbidday==10?"active1":""?> btn btn-default btn-radio2">10 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastbidday=14"  type="button" class="<?=  $modelProduct->lastbidday==14?"active1":""?> btn btn-default btn-radio2">2 <br>  Hafta</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>


                                                <li>
                                                    <button onclick="lastbidday=21"  type="button" class="<?=  $modelProduct->lastbidday==21?"active1":""?> btn btn-default btn-radio2">3 <br>  Hafta</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button onclick="lastbidday=30"  type="button" class="<?=  $modelProduct->lastbidday==30?"active1":""?> btn btn-default btn-radio2">1 <br>  Ay</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>


                                            </ul>
                                            <div class="clear"></div>
                                            <p id="product_lastshowday_error" class="error_system"></p>
                                        </div>

                                    </div>

                                </div>
                            </div>    
                            <?php endif;?>
                            <!--
                            <hr>
                            
                            <div class="row padding10">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <i style="color: #00abc5; margin-right: 10px;" class="fa fa-truck fa-3x"></i><label style="position: relative; top: -10px;">Kargo Ücretini Kim Ödeyecek ?</label>
                                        <div class="clear"></div>
                                        <div class="col-lg-6 col-md-12">
                                            <button onclick="cargoOpen(1)" type="button" class="<?=$modelProduct->cargopricetype==1?"active1":""?> btn btn-default btn-radio">Satıcı Öder (Ücretsiz Kargo)</button>
                                            <input type="checkbox" id="left-item" hidden="hidden">
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <button onclick="cargoOpen(2)" type="button" class="<?=$modelProduct->cargopricetype==2?"active1":""?>  btn btn-default btn-radio">Alıcı Öder</button>
                                            <input type="checkbox" id="left-item" hidden="hidden">
                                        </div>
                                    </div>

                                </div>  
                            </div>
                            

                             <div class="row padding10 <?=$modelProduct->cargopricetype==2?"":"hides"?>" id="cargopricediv">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <label style="position: relative; top: -10px;">Kargo Ücreti</label>
                                        <div class="clear"></div>
                                      
                                         <input id="cargo_price" class="textright" type="text" placeholder="0" value="<?=!empty($modelProduct->cargoprice)?number_format($modelProduct->cargoprice,2):""?>">
                                    </div>

                                </div>  
                            </div>

                            <p id="product_cargo_price_error" class="error_system"></p>
                            -->
                        <hr>
                    </div>
                </div>
                <a href="<?=Yii::app()->createUrl('products/newproduct')?>" class="btn btn-primary nextBtn btn-lg pull-left" type="button" >Geri Git</a>
                <a href="javascript:;" onclick="productinformationsUpdate()" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Önizleme ve Onay</a>            </div>
        </div>
    </div>

</form>
</div>
</div>


<script type="text/javascript">
initEditor('product_comments');

function masMonk()
{
    $("#product_price").maskMoney({thousands:'', decimal:'.', allowZero:true, suffix: $('#product_currency option:selected').text()});
    $("#product_startingprice").maskMoney({thousands:'', decimal:'.', allowZero:true,  suffix:$('#product_currency option:selected').text()});
}

$('#product_currency').change(function(){
   
    masMonk();
});
masMonk();
//$("#cargo_price").maskMoney({thousands:'', decimal:'.', allowZero:true, suffix: ' TL'});

var salestype=<?=Yii::app()->user->getState("salestype")?>;
var lastshowday=<?=!empty($modelProduct->lastshowday)?$modelProduct->lastshowday:0?>;
var lastbidday=<?=!empty($modelProduct->lastbidday)?$modelProduct->lastbidday:0?>;
/*
<?php if(!empty($modelProduct->cargopricetype)):?>

    var iscargoprice=<?=$modelProduct->cargopricetype?>;
<?php else:?>
    var iscargoprice;
<?php endif;?>
*/
/*
function cargoOpen(ck)
{
    iscargoprice=ck;

    if(ck==2)
      $('#cargopricediv').show();
    else
      $('#cargopricediv').hide(); 

  $('#product_cargo_price_error').html("");
}
*/
/*
function countPlus(n){

    if($('#product_count').val()=="")
    {
        $('#product_count').val(1);
    }else if(!isInt(parseInt($('#product_count').val()))){

        $('#product_count').val(1);
    }else{

        if(n==true)
        {
            if(parseInt( $('#product_count').val())>1)
            {

             $('#product_count').val(parseInt( $('#product_count').val())-1);     
            }

        }else{

             $('#product_count').val(parseInt( $('#product_count').val())+1);
        }
    }
}


$('#product_count').blur(function(){
    if(parseInt( $('#product_count').val())<1)
    {

     $('#product_count').val(1);     
    }else if(!isInt(parseInt($('#product_count').val()))){

        $('#product_count').val(1);
    }
});

*/

function productinformationsUpdate()
{
    var control=true;

    console.log(lastshowday);
    
    $('#product_name_error').html("");
    $('#product_subtitle_error').html("");
   // $('#product_count_error').html("");
    $('#product_price_error').html("");
    $('#product_lastshowday_error').html("");
   // $('#product_cargo_price_error').html("");

    if($('#product_name').val().trim()=="")
    {
        $('#product_name_error').html("Ürün başlığı boş olamaz.");
        errorGoto($('#product_name'));

        control=false;
    }else if($('#product_name').val().trim().length<6)
    {
        $('#product_name_error').html("Ürün başlığı kısa olamaz");
        errorGoto($('#product_name'));
        control=false;
    }


    if($('#product_subtitle').val().trim()=="")
    {
        $('#product_subtitle_error').html("Ürün alt başlığı boş olamaz.");
        errorGoto($('#product_subtitle'));
        control=false;
    }else if($('#product_subtitle').val().trim().length<6)
    {
        $('#product_subtitle_error').html("Ürün alt başlığı kısa olamaz");
        errorGoto($('#product_subtitle'));
        control=false;
    }

    /*
    if($('#product_count').val().trim()=="")
    {
        $('#product_count_error').html("Ürün adeti boş olamaz.");
        errorGoto($('#product_count'));
        control=false;
    }else if(!isInt(parseInt($('#product_count').val())))
    {
        $('#product_count_error').html("Ürün adeti belirtiniz.");
        errorGoto($('#product_count'));
        control=false;
    }
    */


    if(salestype==1)
    {
        var product_price=$('#product_price').maskMoney('unmasked')[0];

        if(product_price=="")
        {
            $('#product_price_error').html("Ürün fiyatını belirtiniz..");
            errorGoto($('#product_price'));
            control=false;
        }else if(product_price==0)
        {
            $('#product_price_error').html("Ürün fiyatını belirtiniz..");
            errorGoto($('#product_price'));
            control=false;
        }
    }


    if(salestype==2)
    {

        var product_startingprice=$('#product_startingprice').maskMoney('unmasked')[0];

        if(product_startingprice=="")
        {
            $('#product_price_error').html("Ürün başlangıç fiyatını belirtiniz..");
            errorGoto($('#product_price'));
            control=false;
        }else if(product_price==0)
        {
            $('#product_price_error').html("Ürün başlangıç fiyatını belirtiniz..");
            errorGoto($('#product_price'));
            control=false;
        }

    }

    if(salestype==1)
    {
        if(lastshowday==0)
        {
            $('#product_lastshowday_error').html("Ürün kaç gün satışta kalsın belirtiniz..");
            errorGoto($('#product_lastshowday_error'));
            control=false;
        }
    }else
    {
        if(lastbidday==0)
        {
            $('#product_lastshowday_error').html("Ürün kaç gün ihalede kalsın belirtiniz..");
            errorGoto($('#product_lastshowday_error'));
            control=false;
        }
    }
    
    /*
    var cargo_price=$("#cargo_price").maskMoney('unmasked')[0];

    if(iscargoprice==2)
    {
          
        if(cargo_price=="")
        {
            $('#product_cargo_price_error').html("Kargo fiyatı belirtiniz..");
            errorGoto($('#product_cargo_price_error'));
            control=false;
        }
        
    }else if(iscargoprice==null)
    {
         $('#product_cargo_price_error').html("Kargo durumunu belirtiniz..");
        errorGoto($('#product_cargo_price_error'));
        control=false;
    }
    */
    
    if((product_price!=null && product_price>0) || (product_startingprice!=null &&product_startingprice>0))
    {

        if($('#product_currency').val()=="")
        {
            $('#product_price_error').html("Fiyatın para birimi belirtiniz...");
            errorGoto($('#product_currency'));
            control=false; 
        }
       
            
    }
    if(control==true)
    {
            var data={
                "name":$('#product_name').val().trim(),
                "subtitle":$('#product_subtitle').val().trim(),
               //"piece":parseInt($('#product_count').val().trim()),
                "price":product_price,
                "lastshowday":lastshowday,
                "lastbidday":lastbidday,
                "startingprice":product_startingprice,
                "currency":$('#product_currency').val(),
               // "cargopricetype":iscargoprice,
               // "cargoprice":cargo_price,
              
                "discount":$('#product_discount').val().trim()
             
            };

            var text=CKEDITOR.instances.product_comments.getData();
            
       
            var dataString = 'data='+encodeURIComponent(JSON.stringify(data))+'&text='+encodeURIComponent(text);

            $.ajax({
             type: "POST",
             dataType:'json',  
             url: params.site+"/products/productinformationsave", 
             data: dataString,
             timeout: 30000,
                 success: function(data)
                 {

                    if(data.sonuc==1)
                    {

                        window.location=params.site+"/products/productreview";

                    }else if(data.sonuc==2)
                    {

                        $('#product_images_error').html("Lütfen Büyük Resim yükleyiniz.");
                        errorGoto($('#product_images_error'));
                    }else{

                        alert("Hata oluştu lütfen tekrar deneyiniz.");
                    } 
                 },error: function (xhr, ajaxOptions, thrownError) {
                       alert("Hata oluştu lütfen tekrar deneyiniz.");
                 }
            });
    }
}



</script>