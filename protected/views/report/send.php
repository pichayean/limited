<h1>
	<?php $data = $model->getData(); ?>
	รายงานจำนวนที่ส่งและยอดขาย ประจำเดือน <?php echo $data[0]['monthNow']; ?> ปี <?php echo $data[0]['yearNow']; ?>
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
			'name' => 'จำนวนที่ส่ง (ราย)',
			'value' => 'number_format($data["totalSend"])',
			'htmlOptions' => array(
				'style'=>'text-align: center')
		),
		array(
			'name' => 'จำนวนเงิน (บาท)',
			'value' => 'number_format($data["totalPrice"])',
			'htmlOptions' => array(
				'style'=>'text-align: center')
		)
	)
));?>