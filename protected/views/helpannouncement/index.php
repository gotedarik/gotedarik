<?php
/* @var $this HelpAnnouncementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Help Announcements',
);

$this->menu=array(
	array('label'=>'Create HelpAnnouncement', 'url'=>array('create')),
	array('label'=>'Manage HelpAnnouncement', 'url'=>array('admin')),
);
?>

<h1>Duyurular</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
