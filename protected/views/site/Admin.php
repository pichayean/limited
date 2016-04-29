<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo Yii::app()->session["sportshop_name"]; ?></i></h1>
<?php if (Yii::app()->session["sprotshop_online"] === 0) {
	echo '<p>กรุณา Login เพื่อเข้าสู่ระบบหลังร้าน เพื่อจัดการรายการตามสิทธิของคุณ</p>';
} ?>

<center><img src="images\temp\admin.png"></center>
