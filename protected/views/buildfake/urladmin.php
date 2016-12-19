<?php
/* @var $this BuildfakeController */
/* @var $model Fakeproducts */

$this->breadcrumbs=array(
    'Fakeproducts'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Fakeproducts', 'url'=>array('index')),
    array('label'=>'Create Fakeproducts', 'url'=>array('create')),
);

?>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <h1>Fake Ürünleri Yönet</h1>
                <div class="row">
                    <div class="col-sm-12">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'fakeproducts-grid',
    'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
    'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'supplier_id',
        'url',
        array(
            'class'=>'CButtonColumn',
            'htmlOptions' => array('style'=>'width:170px'),
            'template'=>'{update}{delete}',
            'buttons' => array(
                'update' => array
                (
                    'imageUrl'=>Yii::app()->request->baseUrl.'/frontadmin/img/update.png',
                    'options' => array(
                        'class'=> 'update btn btn-default',
                    ),
                    'url'=>'Yii::app()->createUrl("buildfake/urladminupdate",array(\'id\'=>$data->fakeproducts_id))',
                ),
                'delete' => array
                (
                    'imageUrl'=>Yii::app()->request->baseUrl.'/frontadmin/img/delete.png',
                    'options' => array(
                        'class'=> 'delete btn btn-default',
                    ),
                    'url'=>'Yii::app()->createUrl("buildfake/urldelete",array(\'id\'=>$data->fakeproducts_id))',

                ),
            ),
        ),
    ),
)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
