<?php 	
	$this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider' => $model,
	'columns' => array(
		array(
			'name'=> 'ProductName',
			'value'=> '$data->product->name'
		),
		array(
			'name'=> 'Qty',
			'value'=> '$data->amount',
			'htmlOptions' => array(
				'width'=> '30'
			)
		),
		array(
			'name'=> 'Price',
			'value'=> '$data->product->price',
			'htmlOptions' => array(
				'width'=> '50'
			)
		),
		array(
			'name'=> 'Total Price',
			'value'=> 'number_format($data->product->price * $data->amount)',
			'htmlOptions' => array(
				'width'=> '100'
			)
		),

		array(
			'class'=> 'CButtonColumn',
			'template'=> '{update} {delete}',
			'buttons' => array(
				'update' => array(
							'label' => 'แก้ไขจำนวนสินค้า',
							'url' => 'Yii::app()->createUrl("shop/update", array("id"=>$data->id))',
							'options' => array('id'=>'imgLink')
					),
			)
		)

	)
)) ?>

<hr>
<div>
<p align=right>	
	<div align="right"><h3>Total Price&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sumary; ?>&nbsp;&nbsp; ฿&nbsp;&nbsp;</h3></div> 
	<?php Yii::app()->session["sumary"] = $sumary; ?>

</p></div>
<hr>
<div style="margin:20px;">
	<?php $url = Yii::app()->createUrl('shop/confirmPage'); ?>
	<?php $urlcancel = Yii::app()->createUrl('shop/cancel'); ?>
	<center>			
	<a id= "submit" class="btn btn-primary btn-lg" href="<?php if($sumary==0){echo '#';}else{echo $url;}?>">
    <i class="icon-refresh icon-spin"></i>Comfirm Order</a>
	
	<a id= "submit" class="btn btn-default btn-lg" href="<?php echo $urlcancel;?>" onclick="return confirm('คุณต้องการยกเลิก การสั่งซื้อ?')">
    <i class="icon-refresh icon-spin"></i>Cancle Order</a>
	


	</center>
</div>