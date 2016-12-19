<?php
/* @var $this HelpAnnouncementController */
/* @var $model HelpAnnouncement */

$this->breadcrumbs=array(
	'Help Announcements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HelpAnnouncement', 'url'=>array('index')),
	array('label'=>'Manage HelpAnnouncement', 'url'=>array('admin')),
);
?>

<h1>Yeni Duyuru Oluştur</h1>
	<script>
		$(document).ready(function() {
			$(".Editor-editor").html("<?php echo $model->content;?>");
		});
	</script>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>