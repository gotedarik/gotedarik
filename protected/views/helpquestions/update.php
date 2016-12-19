<?php
/* @var $this HelpQuestionsController */
/* @var $model HelpQuestions */

$this->breadcrumbs=array(
	'Help Questions'=>array('index'),
	$model->question_id=>array('view','id'=>$model->question_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HelpQuestions', 'url'=>array('index')),
	array('label'=>'Create HelpQuestions', 'url'=>array('create')),
	array('label'=>'View HelpQuestions', 'url'=>array('view', 'id'=>$model->question_id)),
	array('label'=>'Manage HelpQuestions', 'url'=>array('admin')),
);
?>

<h1>Yardım Sorusu Güncelle <?php echo $model->question_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>