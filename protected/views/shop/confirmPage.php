<center><h1>ConfirmOrder.</h1></center>
  <?php 
      $attributes = array();
      $attributes["id"] =  Yii::app()->session["sportshop_id"];
      $model = Member::model()->findByAttributes($attributes);
   ?>
    <div align="left">
		<form class="pure-form" method="post" id="myForm" onSubmit="return checkForm()">
			<fieldset>
				<div class="pure-control-group">
				    <label for="name">Name &nbsp; &nbsp; :</label>
				    <input disabled type="text" id="name" placeholder="<?php echo $model->name; ?>" name="name">
			  	</div><br>

			    <div class="pure-control-group">
				    <label for="name">email &nbsp; &nbsp; :</label>
				    <input disabled type="text" id="name" placeholder="<?php echo $model->email;?>" name="name">
			    </div><br>

			    <div class="pure-control-group">
				    <label for="address">Address  :</label>    
				  	<textarea type="address" id="address" placeholder="กรอกที่อยู่เพื่อส่งสินค้า(ต้องกรอก)" name="address" rows="3"></textarea>
			  	</div><br>

			  	<div class="pure-control-group">
			  		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			  		<button type="submit" class="pure-button pure-button-primary">Submit</button>
			  	</div>
		  	</fieldset>
		</form>
	</div>


<script> 
function checkForm() { 
	if (myForm.address.value.length == 0) { 
		alert("กรุณากรอกที่อยู่สำหรับจัดส่งสินค้า"); 
		return false; 
	} 
} 
</script>