<!-- Products -->

<div id="header2">
<h1 id="logo2"><a href="#">Limited Sport</a></h1>
<div class="pure-menu pure-menu-horizontal"  align="right">
    <ul class="pure-menu-list">
    	<li class="pure-menu-item pure-menu-selected">
    		<form class="pure-form" method="post" action="index.php?r=shop/search">
                <input type="text" class="pure-input-rounded" placeholder="Search" id="search" name="search">
                <button type="submit" class="button-success pure-button"> <i class="fa fa-cog"></i> Search</button>
			</form>
    	</li>
       
        <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
            <a href="#" id="menuLink1" class="pure-menu-link"><i class="fa fa-cog"></i>&nbsp;Category</a>
            <ul class="pure-menu-children">
            	<?php 
	              $param = Category::model()->findAll();
	              foreach($param as $value){ ?>
	                    <li class="pure-menu-item">
	                    	<a href="<?php echo 'index.php?r=shop/shop&categoryId='.$value->id;?>" class="pure-menu-link">
	                    		<?php echo $value->name; ?>
	                    	</a>
	                    </li>	            
	            <?php } ?>
            </ul>
        </li>
    </ul>
</div>
</div>

<?php $this->widget('EColumnListView', array(
  'dataProvider'=>$dataProvider,
  'columns' => 4,
  'template'=>"{items}\n{pager}",
  'itemView'=>'_view',
)); 

?>



    <style scoped>

        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
        }

    </style>

    