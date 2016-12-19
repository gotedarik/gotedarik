<?php
/* @var $this HelpAnnouncementController */
/* @var $model HelpAnnouncement */

$this->breadcrumbs=array(
	'Help Announcements'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List HelpAnnouncement', 'url'=>array('index')),
	array('label'=>'Create HelpAnnouncement', 'url'=>array('create')),
	array('label'=>'Update HelpAnnouncement', 'url'=>array('update', 'id'=>$model->announcement_id)),
	array('label'=>'Delete HelpAnnouncement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->announcement_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HelpAnnouncement', 'url'=>array('admin')),
);
?>

<h1>Duyuru Önizleme #<?php echo $model->announcement_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'announcement_id',
		'admin_id',
		'title',
		'content',
		'dateadd',
	),
)); ?>
