<?php
/* @var $this BuildfakeController */
/* @var $model Fakeproducts */

$this->breadcrumbs=array(
    'Fakeproducts'=>array('index'),
    $model->fakeproducts_id=>array('view','id'=>$model->fakeproducts_id),
    'Update',
);

$this->menu=array(
    array('label'=>'List Fakeproducts', 'url'=>array('index')),
    array('label'=>'Create Fakeproducts', 'url'=>array('create')),
    array('label'=>'View Fakeproducts', 'url'=>array('view', 'id'=>$model->fakeproducts_id)),
    array('label'=>'Manage Fakeproducts', 'url'=>array('admin')),
);
?>

    <h1>Fake Tedarikçi Düzenle : <?php echo $model->supplier_id; ?></h1>

<?php $this->renderPartial('_formurl', array('model'=>$model)); ?>