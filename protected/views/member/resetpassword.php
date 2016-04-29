<center><h1>Reset Password.</h1></center>
<center><h3>input New Password.</h3></center>
    <div align="center">
		<form class="pure-form" method="post" id="myForm" onSubmit="return checkForm()" action="index.php?r=member/resetpassword&id= <?php echo $id; ?>">
			<fieldset>
				<div class="pure-control-group">
				    <label for="password"></label>
				    <input type="text" id="password" placeholder="" name="password">
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