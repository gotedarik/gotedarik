<?php
/* @var $this HelpAnnouncementController */
/* @var $model HelpAnnouncement */

$this->breadcrumbs=array(
	'Help Announcements'=>array('index'),
	$model->title=>array('view','id'=>$model->announcement_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HelpAnnouncement', 'url'=>array('index')),
	array('label'=>'Create HelpAnnouncement', 'url'=>array('create')),
	array('label'=>'View HelpAnnouncement', 'url'=>array('view', 'id'=>$model->announcement_id)),
	array('label'=>'Manage HelpAnnouncement', 'url'=>array('admin')),
);
?>

<h1>Duyuruyu Güncelle <?php echo $model->announcement_id; ?></h1>
	<script>
		$(document).ready(function() {
			$(".Editor-editor").html("<?php echo $model->content;?>");
		});
	</script>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>