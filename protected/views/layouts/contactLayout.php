<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CT490 Soprt Shop</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<link rel="icon" href="http://www.thairugbyshop.com/rugby.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://www.thairugbyshop.com/rugby.ico" type="image/x-icon">
<link rel="stylesheet" href="css/pure/pure-min.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/awesome/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <h1 id="logo"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Limited Sport</a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="
        <?php if (Yii::app()->session["sportshop_online"] == 0) {
          echo '#';
        }else{
          echo Yii::app()->createUrl('shop/cartList');
        } ?>
      " 
      <?php $total = Cart::model()->countByAttributes(array('member_id'=>Yii::app()->session["sportshop_id"])); ?>      
      <?php $tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>      
      class="cart-link">Your Shopping Cart(<?php echo $total; ?>)</a>
      <div class="cl">&nbsp;</div>
      <span>
        <strong>
          <?php if (Yii::app()->session["sportshop_online"] == 0) {
            echo $tab.'<a style="color:#E8E8E8 " href="'.Yii::app()->createUrl('member/formregister').'"">Register</a>';
          }else{
            echo 'ยินดีต้อนรับ, '.Yii::app()->session["sportshop_name"]; 
          } ?>
        </strong>
      </span> 
    </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>" >Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('shop/shop'); ?>" >Shop</a></li>
        <?php /*
              if (Yii::app()->session["sportshop_online"]==1) {
                echo '<li><a href="index.php?r=payment/payment">Payment</a></li>';
        } */?>
        
        <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>"  class= "active">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <br>
  <?php echo $content; ?>
  <br>
  
  <!-- Side Full -->
  <div class="side-full">
    <!-- More Products -->
    <div class="more-products">
      <div class="more-products-holder">
        <ul>
          <li><a href="#"><img src="css/images/small1.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small2.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small3.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small4.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small5.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small6.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small7.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small1.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small2.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small3.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small4.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small5.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small6.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small7.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small1.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small2.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small3.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small4.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small5.jpg" alt="" /></a></li>
          <li><a href="#"><img src="css/images/small6.jpg" alt="" /></a></li>
          <li class="last"><a href="#"><img src="css/images/small7.jpg" alt="" /></a></li>
        </ul>
      </div>
      <div class="more-nav"> <a href="#" class="prev">previous</a> <a href="#" class="next">next</a> </div>
    </div>
    <!-- End More Products -->
    <!-- Text Cols -->
    <div class="cols">
      <div class="cl">&nbsp;</div>
      <div class="col">
        <h3 class="ico ico1">Business Hours</h3>
        <p>Monday through Friday 10:00AM-8:00PM</p>
          <p>Saturday 10:00 AM to 5:00 PM</p>
          <p>Sundays 10:00 AM to 2:00 PM.</p>
        <p class="more"><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="col">
        <h3 class="ico ico2">Limited SportShop</h3>
        <p>ramkhamhaeng university</p>
        <p>CT490 Special Project</p>        
        <p>tel. 0945502212.</p>
        <p class="more"><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="col">
        <h3 class="ico ico3">Donec imperdiet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
        <p class="more"><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="col col-last">
        <h3 class="ico ico4">Promotion New!!</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
        <p class="more"><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="cl">&nbsp;</div>
    </div>
    <!-- End Text Cols -->
  </div>
  <!-- End Side Full -->
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="index.php?r=site/index">Home</a> <span>|</span> <a href="https://www.facebook.com/pichayan.hihi">Support</a> <span>|</span> <a href="#">The Store</a> <span>|</span> 
    <?php if (Yii::app()->session["sportshop_online"] === 1 && Yii::app()->session["sportshop_level"] <> 'customer') {
      echo '<a href="index.php?r=site/admin">Admin</a>'; 
    } ?>
    </p>
    <p class="right"> &copy; CT490 Limited Sport Shop. Design by <a href="https://www.facebook.com/pichayan.hihi">PichayeanYensiri</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
