
<?php $data = $model->getData(); ?>
<center>
	<h1>
	รายงานยอดขาย ประจำเดือน <?php echo $data[0]['monthNow']; ?> ปี <?php echo $data[0]['yearNow']; ?>
	</h1>
			<div class="CSSTableGenerator">
                <table >
                    <tr>
                        <td>
                            วันที่
                        </td>
                        <td >
                            ยอดขาย
                        </td>
                    </tr>
                    <?php $total = 0; ?>
					<?php for ($i=0; $i < count($data); $i++) { 
					$total = $total + $data[$i]["totalPrice"]; ?>
                    <tr>
                        <td>
                        	<center>
                        		<?php echo $data[$i]['dayNow']; ?>
                        	</center>                            
                        </td>
                        <td width="25%">
                            <?php echo  $data[$i]["totalPrice"]." บาท "?>
                        </td>
                    </tr>
                	<?php } ?>
                 	<tr>
                        <td>
                            <h2>ยอดรวม ประจำเดือน </h2> 
                        </td>
                        <td >
                            <h2><?php echo $total; ?> บาท</h2>
                        </td>
                    </tr>
                </table>
            </div>
</center>

<style type="text/css">.CSSTableGenerator {
	margin:0px;padding:0px;
	width:60%;
	border:1px solid #ffffff;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#dbf9f9; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #ffffff;
	border-width:0px 1px 1px 0px;
	text-align:right;
	padding:4px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #73a4d6 5%, #5ba3ea 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #73a4d6), color-stop(1, #5ba3ea) );
	background:-moz-linear-gradient( center top, #73a4d6 5%, #5ba3ea 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#73a4d6", endColorstr="#5ba3ea");	background: -o-linear-gradient(top,#73a4d6,5ba3ea);

	background-color:#73a4d6;
	border:0px solid #ffffff;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #73a4d6 5%, #5ba3ea 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #73a4d6), color-stop(1, #5ba3ea) );
	background:-moz-linear-gradient( center top, #73a4d6 5%, #5ba3ea 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#73a4d6", endColorstr="#5ba3ea");	background: -o-linear-gradient(top,#73a4d6,5ba3ea);

	background-color:#73a4d6;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>