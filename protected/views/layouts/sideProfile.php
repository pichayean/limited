<h2>ข้อมูลส่วนตัว</h2><br>
<img width="100" src="css/images/man.jpg" alt="img">
<br>
<p>Name : <?php echo Yii::app()->session["sportshop_name"]; ?></p>
<a href="<?php echo Yii::app()->createUrl('order/customerorder'); ?>">ประวัติการสั่งซื้อ</a>
<a href="<?php echo Yii::app()->createUrl('member/profile'); ?>">แก้ไข</a>
<br><br>
<a style="text-decoration:none" href="<?php echo Yii::app()->createUrl('member/logout'); ?>"><div class="btn">Logout</div></a>
