<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - OrderList';
$this->breadcrumbs=array(
	'OrderList',
);
?>
<center><h1>OrderList</h1></center>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider' => $model,
	'columns' =>array(
		'code',
		array(
			'name' => 'name',
			'value' => 'Orders::getName($data->member_id)',
			'htmlOptions' => array(
				'width'=> '200'
			)
		),
		
		array(
			'name' => 'Email',
			'value' => 'Orders::getEmail($data->member_id)',
			'htmlOptions' => array(
				'width'=> '130'
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
			'header' => 'Manage Status',
			'class' => 'CButtonColumn',
			'template' => '{view} {send} {cancel}',
			
			'buttons' => array(
				'cancel' => array(
						'label' => 'cancel',
						'url' => 'Yii::app()->createUrl("order/cancel",array("id"=>$data->id))',
						'imageUrl' => 'css/images/24/Close.png',
						'visible'=>'$data->status=="wait"?TRUE:FALSE',
						'options' => array('id'=>'imgLink')
				),
				'pay' => array(
						'label' => 'จ่ายเงินแล้ว',
						'url' => 'Yii::app()->createUrl("order/pay",array("id"=>$data->id))',
						'imageUrl' => 'css/images/24/Thumb-up.png',
						'options' => array('id'=>'imgLink')
				),
				'waitpay' => array(
						'label' => 'รอตรวจสอบการจ่ายเงิน',
						'url' => 'Yii::app()->createUrl("order/waitpay",array("id"=>$data->id))',
						'imageUrl' => 'css/images/24/Uploading.png',
						'options' => array('id'=>'imgLink')
				),
				'send' => array(
 					'label' => 'send',
 					'url' => 'Yii::app()->createUrl("order/send",array("id"=>$data->id))',
 					'imageUrl' => 'css/images/24/Cyclist.png', 					
					'visible'=>'$data->status=="pay"?TRUE:FALSE',
 					'options' => array('id'=>'imgLink')
 				)
			),
			'htmlOptions' => array(
				'width'=> '60'
			)
		),
		
		
	)
)); ?>

<style type="text/css">
	#imgLink img {
		width:16px;
	}
</style>