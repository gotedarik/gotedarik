<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

?>

<div class="x_panel">
	<div class="x_content">
			<h1>Haber Ekle</h1>
		</div>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>