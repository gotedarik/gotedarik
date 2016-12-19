<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->products_id), array('view', 'id'=>$data->products_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productgroup_id')); ?>:</b>
	<?php echo CHtml::encode($data->productgroup_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
	<?php echo CHtml::encode($data->deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admindeleted')); ?>:</b>
	<?php echo CHtml::encode($data->admindeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateadd')); ?>:</b>
	<?php echo CHtml::encode($data->dateadd); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtitle')); ?>:</b>
	<?php echo CHtml::encode($data->subtitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salestype')); ?>:</b>
	<?php echo CHtml::encode($data->salestype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastshowdates')); ?>:</b>
	<?php echo CHtml::encode($data->lastshowdates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargopricetype')); ?>:</b>
	<?php echo CHtml::encode($data->cargopricetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargoprice')); ?>:</b>
	<?php echo CHtml::encode($data->cargoprice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastshowday')); ?>:</b>
	<?php echo CHtml::encode($data->lastshowday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastbidday')); ?>:</b>
	<?php echo CHtml::encode($data->lastbidday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('piece')); ?>:</b>
	<?php echo CHtml::encode($data->piece); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startingprice')); ?>:</b>
	<?php echo CHtml::encode($data->startingprice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewed')); ?>:</b>
	<?php echo CHtml::encode($data->viewed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedateadd')); ?>:</b>
	<?php echo CHtml::encode($data->updatedateadd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalpoint')); ?>:</b>
	<?php echo CHtml::encode($data->totalpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uservotecount')); ?>:</b>
	<?php echo CHtml::encode($data->uservotecount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewok')); ?>:</b>
	<?php echo CHtml::encode($data->viewok); ?>
	<br />

	*/ ?>

</div>