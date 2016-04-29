<center><h1>ลืม Password.</h1></center>
<center><h2><?php echo $errword; ?></h2></center>
    <div align="center">
		<form class="pure-form" method="post" id="myForm" onSubmit="return checkForm()"  action="index.php?r=member/forgotpassword">
			<fieldset>
				<div class="pure-control-group">
				    <label for="email">Email   : </label>
				    <input type="text" id="email" placeholder="" name="email">
			  	</div><br>

				<div class="pure-control-group">
				    <label for="name">คุณเกิดที่ไหน : </label>
				    <input type="text" id="answer" placeholder="" name="answer">
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
		alert("กรุณากรอกข้อมูลให้ครบ"); 
		return false; 
	} 
} 
</script>