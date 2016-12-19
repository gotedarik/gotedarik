<?php
/* @var $this ProductgroupController */
/* @var $model Productgroup */

$this->breadcrumbs=array(
	'Productgroups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Productgroup', 'url'=>array('index')),
	array('label'=>'Create Productgroup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#productgroup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<link rel="stylesheet" href="<?= Yii::app()->baseUrl?>/frontadmin/tree/jquery.treeview.css" />

<script src="<?= Yii::app()->baseUrl?>/frontadmin/tree/jquery.cookie.js" type="text/javascript"></script>
<script src="<?= Yii::app()->baseUrl?>/frontadmin/tree/jquery.treeview.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl?>/frontadmin/tree/demo.js"></script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div id="admins-grid" class="col-sm-12 grid-view">
					<h1>Ürün Gruplarını Yönet</h1>
					<hr>


					
					<ul id="red" class="treeview-red" style="margin-top:15px;">
					        
							<?PHP
						       
						            
						        foreach($modelProductgroups as $key=>$value){
						            
						            $value=(object)$value;
						                    
						            if($value->sub_id==0){
						                ProductgroupController::treeaction($value);
						                unset($modelProductgroups[$key]);
						                ProductgroupController::group_Find_Sub_Cats($modelProductgroups,$value->productgroup_id);	
						            
						            }
						            
						        }
						        
					        
					        ?>
					        </ul>

				</div>
			</div>
		</div>
	</div>
</div>

