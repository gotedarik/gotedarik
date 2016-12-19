<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->news_id),
	'Update',
);


?>

<div class="x_panel">
	<div class="x_content">
			<h1>Haber Güncelle</h1>
		</div>
</div>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>