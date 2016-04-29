<h1>
	<?php $data = $model->getData(); ?>
	รายงานจำนวนผู้Cancel ประจำเดือน <?php echo $data[0]['monthNow']; ?> ปี <?php echo $data[0]['yearNow']; ?>
</h1>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider' => $model,
	'columns' => array(
		array(
			'name' => 'วันที่',
			'value' => '$data["dayNow"]',
			'htmlOptions' => array(
				'width'=> '40',
				'style'=>'text-align: center')
		),
		array(
			'name' => 'จำนวนลูกค้าที่ Cancel (ราย)',
			'value' => 'number_format($data["totalPay"])',
			'htmlOptions' => array(
				'style'=>'text-align: center')
		)
	)
));?>