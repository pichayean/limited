<?php $data = $model->getData();?>

<?php 
      $attributes = array();
      $attributes["id"] =  $data[0]->orders->member_id;

      $var1 = Member::model()->findByAttributes($attributes);

?>


<div align="right">
	<!--
	<a class="btn btn-primary" href="javascript: history.back()">
    <i class="icon-refresh icon-spin"></i><span class="glyphicon glyphicon glyphicon-arrow-left"></span> Back </a>
    -->

	<a class="btn btn-primary" href="javascript: history.back()">ย้อนกลับ</a>
    <a class="btn btn-primary" href="#" onclick="window.print()">
    <i class="icon-refresh icon-spin"></i><span class="glyphicon glyphicon-print"></span>Print</a>
    
</div>	
<br>
<fieldset align="left">		

	<div style="border:1px solid;background:lightblue;padding:10px;">
		<table>
			<tr>
				<td width="90%"><h2>Invoice</h2></td>
				<td align="right"><div align="left">Limitedsportshop. <br></div></td>
			</tr>
		</table>
	</div>
	<div style="border:1px solid;background:#eee;padding:10px;">
	<table >
		<tr>
			<td width="100">ID</td>
			<td><?php echo $data[0]->orders->code; ?></td>
		</tr>
		<tr>
			<td width="100">Name</td>
			<td><?php echo $var1->name; ?></td>
		</tr>
		<tr>
			<td width="100">email</td>
			<td><?php echo $var1->email; ?></td>
		</tr>
		<tr>
			<td width="100">Address</td>
			<td><?php echo $data[0]->orders->address; ?></td>
		</tr>
	</table>
	</div>
</fieldset>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider' => $model,
	'columns' => array(
		'product.name',
		array(
			'name' => 'price.',
			'value' => '$data->amount',
			'htmlOptions' => array(
				'width'=> '100'			
				)
			),
		/*
		array(
			'name' => 'price',
			'value' => 'number_format($data->product->price)',
			'htmlOptions' => array(
				'width'=> '100'			
			)
		),*/
	)
)); ?>

<center>
	<br>
	<hr>
	<div align="right"><h3>TotalPrice &nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sumary; ?>&nbsp;&nbsp; บาท.&nbsp;&nbsp;</h3></div> 


