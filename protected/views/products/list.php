<div class="container">
    <div class="block block-breadcrumbs">
        <ul>
            <li class="home">
                <a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
                <span></span>
            </li>
            <li>Teklif Detayı</li>
        </ul>
    </div>
    <div class="main-page">
        <h1 class="page-title">Teklif Detayı</h1>
        <div class="page-content checkout-page">
            <div class="box-border">

        <div class="row">
            <div id="no-more-tables">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'products-grid',
                    'dataProvider'=>$model->search(),
                    'filter'=>$model,
                    'cssFile' => Yii::app()->request->baseUrl."/front/css/gridview/styles.css",
                    'itemsCssClass' => 'col-md-12 table-bordered table-striped table-condensed cf',
                    'columns'=>array(
                        array(
                            "type"=>"raw",
                            'name'=>'code',
                            'value'=>'$data->code',
                        ),
                        'name',

                        array(
                            "type"=>"raw",
                            'name'=>'status',
                            'value'=>'Params::getParams_("product_status",$data->status)',
                            'filter'=>Params::getParams("product_status"),
                        ),
                        array(
                            "type"=>"raw",
                            'name'=>'lastshowdates',
                            'value'=>'date("d-m-Y H:i",strtotime($data->lastshowdates))',
                            'filter'=>Params::getParams("product_viewed"),

                        ),
                        array(
                            "type"=>"raw",
                            'name'=>'viewok',
                            'value'=>'Func::isProductDisplay($data->viewok,$data->lastshowdates)',
                            'filter'=>Params::getParams("product_viewed"),
                        ),
                        array(
                            "type"=>"raw",
                            'name'=>'updatedateadd',
                            'value'=>'date("d-m-Y H:i",strtotime($data->updatedateadd))',
                        ),

                        array(
                            'class'=>'CButtonColumn',
                            'htmlOptions'=>array('width'=>'170px'),
                            'template' => '{view}{update}{delete}',
                            'buttons' => array(
                                'view' => array(
                                    'imageUrl' => Yii::app()->request->baseUrl."/frontadmin/img/view.png",
                                    'options' => array(
                                        'class'=> 'view btn btn-default bttns',
                                    ),
                                ),
                                'update' => array(
                                    'imageUrl' => Yii::app()->request->baseUrl."/frontadmin/img/update.png",
                                    'options' => array(
                                        'class'=> 'update btn btn-default bttns',
                                    ),
                                    'url'=>'Yii::app()->createUrl("products/customize",array(\'id\'=>$data->code))',
                                ),
                                'delete' => array(
                                    'imageUrl' => Yii::app()->request->baseUrl."/frontadmin/img/delete.png",
                                    'options' => array(
                                        'class'=> 'delete btn btn-default bttns',
                                    ),
                                    'url'=>'Yii::app()->createUrl("products/delete",array(\'id\'=>$data->code))',
                                ),
                            )
                        ),
                    ),
                )); ?>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

