<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	
<link rel="icon" href="http://www.thairugbyshop.com/rugby.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://www.thairugbyshop.com/rugby.ico" type="image/x-icon">
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<!-- Bootstrap CSS framework -->
	<link rel="stylesheet" href="css/pure/pure-min.css" type="text/css" media="all" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">AdminPage (
		<?php 
			if(Yii::app()->session["sportshop_level"] == "admin"){
				echo "Admin.";
			}else if(Yii::app()->session["sportshop_level"] == "sale"){
				echo "Sale Officer.";
			}else if(Yii::app()->session["sportshop_level"] == "manager"){
				echo "Manager.";				
			}
		 ?> )</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
			$adminper = false;
			$saleper = false;
			$managerper = false;
			if(Yii::app()->session["sportshop_level"] == "admin"){
				$adminper = true;
			}else if(Yii::app()->session["sportshop_level"] == "sale"){
				$saleper = true;
			}else if(Yii::app()->session["sportshop_level"] == "manager"){
				$managerper = true;				
			}
		?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Admin', 'url'=>array('/site/admin')),
				array('label'=>'Report', 'url'=>array('/report/order'), 'visible'=>$managerper && !Yii::app()->user->isGuest),	
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Category', 'url'=>array('/category/index'), 'visible'=>$saleper && !Yii::app()->user->isGuest),
				array('label'=>'MemberManage', 'url'=>array('/memberforadmin/index'), 'visible'=>$adminper && !Yii::app()->user->isGuest),	
				array('label'=>'Product', 'url'=>array('/product/index'), 'visible'=>$saleper && !Yii::app()->user->isGuest),				
				array('label'=>'Order', 'url'=>array('/order/index'), 'visible'=>$saleper && !Yii::app()->user->isGuest),
				array('label'=>'Transaction', 'url'=>array('/transaction/index'), 'visible'=>$managerper && !Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)),

		)); ?>
	</div><!-- mainmenu -->
	<br>
	<div align="center">
	<div class="pure-menu pure-menu-horizontal">
    <ul class="pure-menu-list">
        <li class="pure-menu-item pure-menu-selected"><a href="<?php echo Yii::app()->createUrl('report/order'); ?>" class="pure-menu-link">สรุปจำนวน Order</a></li>
        
        <li class="pure-menu-item pure-menu-selected"><a href="<?php echo Yii::app()->createUrl('report/total'); ?>" class="pure-menu-link">สรุปจำนวน รายได้ประจำเดือน</a></li>
        <li class="pure-menu-item pure-menu-selected"><a href="<?php echo Yii::app()->createUrl('report/bestseller'); ?>" class="pure-menu-link">BestSeller</a></li>
        <!--
        <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
            <a href="#" id="menuLink1" class="pure-menu-link">Other</a>
            <ul class="pure-menu-children">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Email</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Twitter</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Tumblr Blog</a></li>
            </ul>
        </li>




        <li class="pure-menu-item pure-menu-selected"><a href="<?php// echo Yii::app()->createUrl('report/cancel'); ?>" class="pure-menu-link">สรุปจำนวน การยกเลิก Order</a></li>
        <li class="pure-menu-item pure-menu-selected"><a href="<?php// echo Yii::app()->createUrl('report/pay'); ?>" class="pure-menu-link">สรุปจำนวนที่มีการจ่ายเงิน</a></li>
        <li class="pure-menu-item pure-menu-selected"><a href="<?php// echo Yii::app()->createUrl('report/send'); ?>" class="pure-menu-link">สรุปจำนวน ที่มีการจัดส่ง</a></li>
    	-->
    </ul>
</div>
</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Pichayean Yensiri.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
