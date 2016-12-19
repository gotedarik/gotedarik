<?php
/* @var $this HelpQuestionsController */
/* @var $model HelpQuestions */

$this->breadcrumbs=array(
	'Help Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HelpQuestions', 'url'=>array('index')),
	array('label'=>'Manage HelpQuestions', 'url'=>array('admin')),
);
?>

<h1>Yardım Sorusu Oluştur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>