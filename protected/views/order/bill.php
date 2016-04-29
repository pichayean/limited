<?php $data = $model->getData();?>

<?php 
      $attributes = array();
      $attributes["code"] =  $data[0]->orders->code;

      $var1 = Orders::model()->findByAttributes($attributes);
      
?>
<div align="right">
	<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('order/customerorder'); ?>">ประวัติการสั่งซื้อ</a>
    <a class="btn btn-primary" href="#" onclick="printDiv('divprint')">
    <i class="icon-refresh icon-spin"></i><span class="glyphicon glyphicon-print"></span>Print</a>
    
</div>	
<br>

<div  id="divprint">
<fieldset align="left">		

	<div style="border:1px solid;background:lightblue;padding:10px;">
		<table>
			<tr>
				<td width="78%"><h2>LIMITEDSPORTSHOP</h2></td>
				<td align="right">
					<?php $strNewDate = date ("d-m-Y", strtotime("+3 day", strtotime($var1->created)));?>
		      		<div align="left">** กรุณาขำระภายในวันที่ : <?php echo $strNewDate; ?>. <br>** กรุณาทำรายการที่เคาน์เตอร์ธนาคารเท่านั้น. <br>
					
					</div>
				</td>
			</tr>           
		</table>
	</div>
	<div class="bodybill">
		<div align="right" class="opacityText">**ส่วนที่ 1 :สำหรับลูกค้า**</div><br>
		<div align="right"><h2>ใบแจ้งค่าสินค้า บริษัท LIMITEDSPORTSHOP</h2></div>
		<div align="right"><h2>Created : <?php echo $var1->created; ?></h2></div>
		<div align="right"><h2>ชำระที่ Krungsri/SCB/KTB.</h2></div>
		<div align="right">เลขที่อ้างอิง : <?php echo $var1->code; ?></div>	
	<table>
		<tr>
			<td width="80"><h3>Name</h3></td>
			<td>คุณ <?php echo $var1->member->name; ?></td>
		</tr>
		<tr>
			<td width="80"><h3>email</h3></td>
			<td><?php echo $var1->member->email; ?></td>
		</tr>
		<tr>
			<td width="80"><h3>Phone No.</h3></td>
			<td><?php echo "0".$var1->member->tel; ?></td>
		</tr>
	</table>
	<?php $this->widget('zii.widgets.grid.CGridView',array(
						'dataProvider' => $model,	
					    'summaryText'=>'', 
						'columns' => array(
							array(
								'name' => 'Name',
								'value' => '$data->product->name',
								'htmlOptions' => array(
									'width'=> '350'			
								)
							),
							array(
								'name' => 'Quantity',
								'value' => '$data->amount',
								'htmlOptions' => array(
									'width'=> '20'			
								)
							),
							array(
								'name' => 'Price',
								'value' => 'number_format($data->product->price * $data->amount)',
								'htmlOptions' => array(
									'width'=> '50'			
								)
							),
						)
					)); ?>
					<div align="right">
						<div>
							<h3>จำนวนเงิน : <?php echo $sumary; ?>&nbsp;บาท</h3><br>
						</div>
					</div>
	</div>

	<div class="bodybill">	
		<div align="right"  class="opacityText">**ส่วนที่ 2 : สำหรับธนาคาร**</div>	
		<div>
			<div>
				เลขที่อ้างอิง : <?php echo $var1->code; ?><br>		
				<table>
					<tr>
						<td width="50">ชื่อ</td>
						<td>คุณ <?php echo $var1->member->name; ?></td>
					</tr>
					<tr>
						<td width="50">email</td>
						<td><?php echo $var1->member->email; ?></td>
					</tr>
					<tr>
						<td width="50">email</td>
						<td><?php echo "0".$var1->member->tel; ?></td>
					</tr>
				</table>		
			</div>
		</div>
		<div align="right">
			<div>
				<h2>**จำนวนเงิน : <?php echo $sumary; ?>&nbsp;บาท**</h2><br>
				<h2><?php echo ThaiBahtConversion($sumary); ?></h2>
			</div>
		</div>
		<div align="left">			
			<table>
				<tr>
					<td><img src="php-barcode-master/barcode.php?text=<?php echo $var1->code; ?>" />&nbsp;</td>
					<td><img src="php-barcode-master/barcode.php?text=<?php echo $sumary; ?>" />&nbsp;</td>
					<td>**สำหรับธนาคาร</td>
				</tr>
				<tr>
					<td align="center">**<?php echo $var1->code; ?>**</td>
					<td align="center">**<?php echo $sumary; ?>**</td>
				</tr>
			</table>
		</div>		
	</div>
</fieldset>

<center>
	<br>
	<div>*กรุณาพิมพ์ใบแจ้งหนี้ Bill นี้ เพื่อนำไปชำระเงินที่ธนาคาร.</div>
	<hr>
</center>




<style type="text/css">
html, body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%; 
}

.bodybill {
	border:1px solid;
	background:#eee;
	padding:10px;
}

.opacityText {
    opacity: 0.4;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}

</style>


<?php 
	/**
 * เวลาเรียกใช้ให้เรียก ThaiBahtConversion(1234020.25); ประมาณนี้
 * @param numberic $amount_number
 * @return string 
 */
function ThaiBahtConversion($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    //echo "<br/>amount = " . $amount_number . "<br/>";
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    //list($number, $fraction) = explode(".", $number);
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    //return iconv("UTF-8", "TIS-620", $ret);
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
 ?>
</div>

 <script type="text/javascript"> 
	function printDiv(divName) { 
		var printContents = document.getElementById(divName).innerHTML; 
		var originalContents = document.body.innerHTML; 

		document.body.innerHTML = printContents; 
		window.print(); 

		document.body.innerHTML = originalContents; 
	} 
</script> 


<?php 
	function DateTimeDiff($strDateCreated){	
			return (strtotime($strDateNow))/  ( 60 * 60 ); // 1 Hour =  60*60
	 	}
 ?>