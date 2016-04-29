<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);

$this->menu=array(
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Products</h1>

<?php $this->widget('EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'columns' => 3,
	'itemView'=>'_view',
)); ?>

