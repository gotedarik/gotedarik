    <?php

        $this->renderPartial("head");

    ?>

    <form role="form">

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
                                    <div   style="padding: 0!important;margin-right: 2px;margin-bottom: 5px;" class="col-lg-3">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item active">
                                                Cras justo odio <i class="fa fa-caret-right pull-right"></i>
                                            </a>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in <i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Morbi leo risus <i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac <i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Vestibulum at eros <i class="fa fa-caret-right pull-right"></i></a>
                                        </div>
                                    </div>
                                    <div  style="padding: 0!important;margin-right: 2px;margin-bottom: 5px;" class="col-lg-3">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item">
                                                Cras justo odio <i class="fa fa-caret-right pull-right"></i>
                                            </a>
                                            <a href="#" class="list-group-item  active">
                                                apibus ac facilisis in <i class="fa fa-caret-right pull-right"></i>
                                            </a>
                                            <a href="#" class="list-group-item">Morbi leo risus<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Vestibulum at eros<i class="fa fa-caret-right pull-right"></i></a>
                                        </div>
                                    </div>
                                    <div  style="padding: 0!important;margin-right: 2px;margin-bottom: 5px;" class="col-lg-2">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item">
                                                Cras justo odio <i class="fa fa-caret-right pull-right"></i>
                                            </a>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Morbi leo risus<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item active">Porta ac consectetur ac<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Vestibulum at eros<i class="fa fa-caret-right pull-right"></i></a>
                                        </div>
                                    </div>
                                    <div  style="padding: 0!important;margin-right: 2px;margin-bottom: 5px;" class="col-lg-2">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item active">
                                                Cras justo odio <i class="fa fa-caret-right pull-right"></i>
                                            </a>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Morbi leo risus<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Vestibulum at eros<i class="fa fa-caret-right pull-right"></i></a>
                                        </div>
                                    </div>
                                    <div  style="padding: 0!important;margin-bottom: 5px;" class="col-lg-2">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item active">
                                                Cras justo odio <i class="fa fa-caret-right pull-right"></i>
                                            </a>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Morbi leo risus<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac<i class="fa fa-caret-right pull-right"></i></a>
                                            <a href="#" class="list-group-item">Vestibulum at eros<i class="fa fa-caret-right pull-right"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <a href="<?=Yii::app()->createUrl('createproduct/productdescription') ?>" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</a>

                </div>

            </div>

        </div>
        
    </form>
</div>
