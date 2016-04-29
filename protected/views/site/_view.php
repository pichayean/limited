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


	  <div class="products">
      <div class="cl">&nbsp;</div>       
       	<ul>
          <li class="inline"> 
            <?php 
                if ($data->status == 'recommend') {
                  echo '<div class="ribbon"><span class="perpos">Recommend</span></div> ';
                }else if($data->status == 'sale') {
                  echo '<div class="ribbon"><span class="red">Sale</span></div> ';
                }else if($data->status == 'new') {
                  echo '<div class="ribbon"><span class="bule">new</span></div> ';
                } else {

                }
             ?>
             <?php 
                  $detail  = Yii::app()->createUrl("shop/productDetail", array("id"=>$data->productID));
            ?>

            <a href="images/<?php echo $data->img; ?>" rel="lightbox">
              <img src="images/<?php echo $data->img; ?>" alt="Beautiful Horses" class="bordered" >
            </a>
            <div class="product-info">
              <h3><?php echo $data->name;?></h3>
              <div class="product-desc">
                <h4><?php echo $data->category->name; ?></h4>
                <?php
                  $str = $data->detail;
                  $cutstr = substr($str,0,15);
                ?>
                <p><?php if (strlen($cutstr) == 15) {
                  echo $cutstr;
                }else{
                  echo 'Product is a good Price.';
                } ?><br />
                  ...</p>
                <strong class="price"><?php echo $data->price.' ฿.'; ?></strong> 
                <?php 
                  $inLogin = Yii::app()->createUrl("shop/addToCart", array("id"=>$data->productID));
                  $noLogin = Yii::app()->createUrl("member/loginShop");
                  $detail  = Yii::app()->createUrl("shop/productDetail", array("id"=>$data->productID));
                ?>
                <br><a class="pure-button button-success" href="<?php if (Yii::app()->session["sportshop_online"] == 1) {
                  echo $inLogin;
                }else{
                  echo $noLogin;
                } ?>">atToCart</a>
                <a class="pure-button button-warning" href="<?php echo $detail; ?>">Detail</a>
                </div>
            </div>
        </ul> 
      <div class="cl">&nbsp;</div>        
    </div>
	<br>

	<?php //print_r(Yii::app()->request->baseUrl); ?>
	
</body>
</html>