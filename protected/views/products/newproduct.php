    <?php

        $this->renderPartial("head");

    ?>

    <div class="box-border">

        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <label class="control-label">Kelime Arama İle Ürün Kategorinizi Bulun <i style="font-size: 14px;" class="fa fa-caret-down"></i></label>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="form-group">
                                       
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                            'name'=>'producgroups',
                                            'source'=>$this->createUrl('products/searchgroups'),
                                            // additional javascript options for the autocomplete plugin
                                            'options'=>array(
                                                    'showAnim'=>'fold',
                                                     'select'=>"js:function(event, ui) {
                                                        productgroups_id=ui.item.key
                                                       
                                                      }",
                                            ),
                                            
                                            'htmlOptions'=>array(
                                                'class'=>'form-control',
                                                'placeholder'=>isset($productgroup_idarr[0]["name"])?$productgroup_idarr[0]["name"]:"Örnek : Samsung Galaxy",
                                                'maxlength'=>50
                                            ),
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                          <?php

                            $this->renderPartial("stepproductgroups");

                        ?>

                        
                    </div>

                    <a href="javascript:;" onclick="nextstep()" class="btn btn-primary clear nextBtn btn-md pull-right" type="button" >Sonraki Adım</a>

                </div>

            </div>

        </div>
        
    </div>
</div>

<script type="text/javascript">
var productgroups_id;

<?php if(isset($productgroup_idarr[0]["id"])):?>
    productgroups_id=<?=$productgroup_idarr[0]["id"]?>
<?php endif;?>

function nextstep()
{
    if(productgroups_id==null){
        alert("Lütfen bir grup belirleyiniz.");
        return false;
    } 


    var data={
        "productgroups_id":productgroups_id,
       
    };

     var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

   

    $.ajax({
         type: "POST",
         dataType:'json',  
         url: params.site+"/products/createproduct", 
         data: dataString,
         timeout: 30000,
         success: function(data)
         {

            if(data.sonuc==1)
            {

               window.location=params.site+"/products/productinformations";

            }else{

                alert("Bir hata oluştu lütfen tekrar deneyiniz.")
            } 
         }
        });
}
</script>
