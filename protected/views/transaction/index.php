
<div class="page-header">
  <h1>Transaction List<small>(Transaction ที่มีการจ่ายเงินแล้ว)</small></h1>
</div>
<a class="pure-button pure-button-primary" href="<?php echo Yii::app()->createUrl("Transaction/inserttransaction"); ?>">Upload Transction file.</a>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider' => $model,
	'columns' =>array(
		array(
			'name' => 'order_code',
			'value' => '$data->order_code',
			'htmlOptions' => array(
				'width'=> '5%'
			)
		),		
		array(
			'name' => 'PayDate',
			'value' => '$data->created',
			'htmlOptions' => array(
				'width'=> '13%'
			)
		),	
		array(
			'name' => 'name',
			'value' => '$data->name',
			'htmlOptions' => array(
				'width'=> '17%'
			)
		),

		array(
			'name' => 'Email',
			'value' => '$data->email',
			'htmlOptions' => array(
				'width'=> '15%'
			)
		),		
		array(
			'name' => 'phone',
			'value' => '$data->phone',
			'htmlOptions' => array(
				'width'=> '10%'
			)
		),
		array(
			'name' => 'amount',
			'value' => 'number_format($data->amount)',
			'htmlOptions' => array(
				'width'=> '10%'
			)
		),
		array(
			'name' => 'status',
			'value' => '$data->status',
			'htmlOptions' => array(
				'width'=> '7%'
			)
		),

		array(
			'header' => 'Manage Status',
			'class' => 'CButtonColumn',
			'template' => '{view}{pay}{delete}',
			'htmlOptions' => array(
				'width'=> '9%',
			),
			'buttons' => array(
				'view' => array(
						'label' => 'view',
						'url' => 'Yii::app()->createUrl("Transaction/view",array("code"=>$data->order_code))',
						'imageUrl' => 'css/images/24/Eye.png',
						'options' => array('id'=>'imgLink')
				),
				'pay' => array(
						'label' => 'ตรวจสอบแล้ว',
						'url' => 'Yii::app()->createUrl("Transaction/okPay",array("code"=>$data->order_code))',
						'imageUrl' => 'css/images/24/Check.png',					
						//'visible'=>'$data->status!="pay"?TRUE:FALSE',
						'options' => array('id'=>'imgLink')
				),
 				'delete' => array(
						'label' => 'delete',
						'url' => 'Yii::app()->createUrl("Transaction/delete",array("code"=>$data->order_code))',
						'imageUrl' => 'css/images/24/Trash.png',
						//'visible'=>'$data->status=="delete"?TRUE:FALSE',
						'options' => array('id'=>'imgLink')
				),
			)
		),
	)
)); ?>