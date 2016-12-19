<?php

$this->renderPartial("head");

?>

<form role="form">

    <div class="row setup-content" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> 1. Adım</h3>
                <hr>

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
                                    <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Örnek : Samsung Galaxy S6"  />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <label class="control-label">Adım Adım Kategorinizi Bulun <i style="font-size: 14px;" class="fa fa-caret-right"></i></label>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="form-group">
                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <a href="<?=Yii::app()->createUrl('createproduct/productreview')?>" class="btn btn-primary nextBtn btn-lg pull-left" type="button" >Geri Git</a>

                <a class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Tamamla</a>

            </div>

        </div>

    </div>

</form>
</div>
