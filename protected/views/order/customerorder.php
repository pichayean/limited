
<div class="page-header">
  <h1>Customer Order List<small>(รายการสั่งซื้อของลูกค้า)</small></h1>
</div>
<?php $send ="send"; 
$this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider' => $model,
	'columns' =>array(
		'code',
		array(
			'name' => 'name',
			'value' => 'Orders::getName($data->member_id)',
			'htmlOptions' => array(
				'width'=> '300'
			)
		),
		
		array(
			'name' => 'Email',
			'value' => 'Orders::getEmail($data->member_id)',
			'htmlOptions' => array(
				'width'=> '200'
			)
		),
		array(
			'name' => 'status',
			'value' => 'Orders::getStatus($data->status)',
			'htmlOptions' => array(
				'width'=> '150'
			)
		),
		'created',
		array(
			'header' => 'option',
			'class' => 'CButtonColumn',
			'template' => '{view} {cancel}',
			'buttons' => array(
				'view' => array(
						'label' => 'view',
						'url' => 'Yii::app()->createUrl("order/bill",array("id"=>$data->id))',
						'imageUrl' => 'css/images/24/Eye.png',
						'options' => array('id'=>'imgLink')
				),
				'cancel' => array(
						'label' => 'cancel',
						'url' => 'Yii::app()->createUrl("order/cancelbycustomer",array("id"=>$data->id))',
						'imageUrl' => 'css/images/24/Close.png',
						'options' => array('id'=>'imgLink'),
						'visible'=>'$data->status=="wait"?TRUE:FALSE'
				)
			),
			'htmlOptions' => array(
				'width'=> '20'
			)
		),
		
		
	)
)); ?>
<style type="text/css">
	#imgLink img {
		width:16px;
	}
</style>