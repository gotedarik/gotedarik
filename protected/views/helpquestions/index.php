<?php
/* @var $this HelpQuestionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Help Questions',
);

$this->menu=array(
	array('label'=>'Create HelpQuestions', 'url'=>array('create')),
	array('label'=>'Manage HelpQuestions', 'url'=>array('admin')),
);
?>

<h1>Help Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
