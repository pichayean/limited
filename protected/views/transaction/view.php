<?php 

$data = $model->getData();

?>
<div align="right">
	<a class="btn btn-primary" href="javascript: history.back()">
    <i class="icon-refresh icon-spin"></i><span class="glyphicon glyphicon glyphicon-arrow-left"></span> ย้อนกลับ </a>
    <a class="btn btn-primary" href="#" onclick="window.print()">
    
</div>	
<br>
<fieldset align="left">		
	<div style="border:1px solid;background:lightblue;padding:10px;"><h4>การแจ้งโอน</h4></div>
	<div style="border:1px solid;background:#eee;padding:10px;">
	<table >
		<tr>
			<td width="100">ชื่อ</td>
			<td><?php echo $data[0]->name; ?></td>
		</tr>
		<tr>
			<td width="100">email</td>
			<td><?php echo $data[0]->email; ?></td>
		</tr>
		<tr>
			<td width="100">Phone No.</td>
			<td><?php echo $data[0]->phone; ?></td>
		</tr>
		<tr>
			<td width="100">created</td>
			<td><?php echo $data[0]->created; ?></td>
		</tr>
		<tr>
			<td width="100">amount</td>
			<td><?php echo $data[0]->amount; ?></td>
		</tr>

		
	</table>
</div>
</fieldset>
<hr>