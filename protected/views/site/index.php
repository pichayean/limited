<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Tyler Mulligan - www.detrition.net - tepics is coming" />
<title></title>
<link rel="stylesheet" href="css/litebox/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/litebox/style.css" type="text/css" media="screen" />
<!--
<script type="text/javascript" src="js/litebox/prototype.lite.js"></script>
<script type="text/javascript" src="js/litebox/moo.fx.js"></script>
<script type="text/javascript" src="js/litebox/litebox-1.0.js"></script>
-->
<script type="text/javascript" src="js/litebox/prototype.lite.js"></script>
<script type="text/javascript" src="js/litebox/moo.fx.js"></script>
<script type="text/javascript" src="js/litebox/litebox-1.0.js"></script>
</head>
<body onload="initLightbox()">

<?php
/* @var $this SiteController */
//
$this->pageTitle=Yii::app()->name;
?>
<div id="content">
      <!-- Content Slider -->
      <div id="slider" class="box">
        <div id="slider-holder">
          <ul>
            <li><img src="css/images/slide1.jpg" alt="" /></li>
            <li><img src="css/images/slide2.jpg" alt="" /></li>
            <li><img src="css/images/slide3.jpg" alt="" /></li>
            <li><img src="css/images/slide4.jpg" alt="" /></li>
          </ul>
        </div>
        <div id="slider-nav"> <a href="#" class="active">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> </div>
      </div>
      <!-- End Content Slider -->
      <!-- Products -->
      <div class="products">
        <div class="cl">&nbsp;</div>           
       	<ul>
        <?php $i = 0; ?>
        <?php foreach ($results as $value) { ?>
        	<li <?php if ($i==2) {?>
        		class="last"
        	<?php } ?>> 
                <?php 
                if ($value->status == 'recommend') {
                  echo '<div class="ribbon"><span class="perpos">Recommend</span></div> ';
                }else if($value->status == 'sale') {
                  echo '<div class="ribbon"><span class="red">Sale</span></div> ';
                }else if($value->status == 'new') {
                  echo '<div class="ribbon"><span class="bule">new</span></div> ';
                } else {

                }
             ?>  
                <a href="images/<?php echo $value->img; ?>" rel="lightbox">
                  <img src="images/<?php echo $value->img; ?>" alt="Beautiful Horses" class="bordered" />
                </a>           

            <div class="product-info">
              <h3><?php echo $value->name;?></h3>
              <div class="product-desc">
                <h4><?php echo $value->category->name; ?></h4>
                <?php
                  $str = $value->detail;
                  $cutstr = substr($str,0,20);
                ?>
                <p><?php echo $cutstr; ?><br />
                  ...</p>
                <strong class="price"><?php echo $value->price.' ฿.'; ?></strong> </div>
                <?php 
                  $inLogin = Yii::app()->createUrl("shop/addToCart", array("id"=>$value->productID));
                  $noLogin = Yii::app()->createUrl("member/loginShop");
                  $detail  = Yii::app()->createUrl("shop/productDetail", array("id"=>$value->productID));
                ?>
                <br><a href="<?php if (Yii::app()->session["sportshop_online"] == 1) {
                  echo $inLogin;
                }else{
                  echo $noLogin;
                } ?>">atToCart</a>
                <a href="<?php echo $detail; ?>">Detail</a>
            </div>
          </li>
        <?php $i = $i+1;} ?>
        </ul> 
        <div class="cl">&nbsp;</div>        
      </div>
      <!-- End Products -->
</div>

</body>
</html>