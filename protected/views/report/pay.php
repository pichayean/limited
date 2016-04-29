<h1>
	<?php $data = $model->getData(); ?>
	รายงานจำนวนผู้ทำรายการโอนเงินเรียบร้อย ประจำเดือน <?php echo $data[0]['monthNow']; ?> ปี <?php echo $data[0]['yearNow']; ?>
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
			'name' => 'จำนวนผู้ทำรายการโอนเงินเรียบร้อย (ราย)',
			'value' => 'number_format($data["totalWait"])',
			'htmlOptions' => array(
				'style'=>'text-align: center')
			
		)
	)
));?>
