<!DOCTYPE HTML>
<html>
	<head>
		<title>Spike shoes Website Template | Details :: w3layouts</title>
		<link href="css/web/css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">		
	</head>
	<body>
		<div class="content details-page">
			<div class="product-details">
				<div class="wrap">
					<ul class="product-head">
						<li><a href="#">Shop</a> <span>::</span></li>
						<li class="active-page"><a href="#">Product Page</a></li>
						<div class="clear"> </div>
					</ul>
				<div class="details-left">
					<div class="details-left-slider">
						<ul>
							<li>
								<div style="width:80%">
									<img class="etalage_thumb_image" src="images/<?php echo $model->img; ?>" />		
								</div>
							</li>
							
						</ul>
					</div>
					<div class="details-left-info">
						<div class="details-right-head">
						<h1><?php echo $model->name; ?></h1>
						<ul class="pro-rate">
							<li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
							<li><a href="#">0 Review(s) Add Review</a></li>
						</ul>
						<p class="product-detail-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
						<a class="learn-more" href="#"><h3>MORE DETAILS</h3></a>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price"><span><?php //$price =  $model->price+( ($model->price*4)/100 ); echo $price.' Baht.'; ?></span><label><?php echo $model->price. ' Baht.'; ?></label></li>
								<li class="stock"><i>In stock</i></li>
								<div class="clear"> </div>
							</ul>
							<ul class="product-colors">
								<h3>available Colors ::</h3>
								<li><a class="color1" href="#"><span> </span></a></li>
								<li><a class="color2" href="#"><span> </span></a></li>
								<li><a class="color3" href="#"><span> </span></a></li>
								<li><a class="color4" href="#"><span> </span></a></li>
								<li><a class="color5" href="#"><span> </span></a></li>
								<li><a class="color6" href="#"><span> </span></a></li>
								<li><a class="color7" href="#"><span> </span></a></li>
								<li><a class="color8" href="#"><span> </span></a></li>
								<div class="clear"> </div>
							</ul>
							<!--
							<ul class="prosuct-qty">
								<span>Quantity:</span>
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</ul> -->
							<?php 
			                  $inLogin = Yii::app()->createUrl("shop/addToCart", array("id"=>$model->productID,"page"=>'detailPage'));
			                  $noLogin = Yii::app()->createUrl("member/loginShop");
			                ?>

							<form  role="form" method="post" action="<?php echo $inLogin; ?>">
	                        <label class="radio-inline">
	                        <div class="col-xs-16">	                          
	                        	<label>Qty : </label><input size="3" type="text" name="qty" id="qty" class="form-control input-sm" placeholder="1">
	                        </div>
	                        </label>
	                        <br>
							
							<?php if (Yii::app()->session["sportshop_online"] == 1) {
			                  echo '<button type="submit" class="pure-button button-success">ADD TO CART</button>';
			                }else{
			                  
			                } ?>

			                <a class="pure-button button-error" href="javascript:history.back()">Back</a>
							<ul class="product-share">
								<h3>All so Share On</h3>
								<ul>
									<li><a class="share-face" href="#"><span> </span> </a></li>
									<li><a class="share-twitter" href="#"><span> </span> </a></li>
									<li><a class="share-google" href="#"><span> </span> </a></li>
									<li><a class="share-rss" href="#"><span> </span> </a></li>
									<div class="clear"> </div>
								</ul>
							</ul>

                            </form>
						</div>
					</div>
					</div>
				</div>
				<div class="details-right">
					<a href="#">SEE MORE</a>
				</div>
				<div class="clear"> </div>
			</div>
	</body>
</html>

