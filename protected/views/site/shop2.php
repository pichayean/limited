<div id="content">	
	<?php $this->widget('EColumnListView', array(
	  'dataProvider'=>$dataProvider,
	  'columns' => 3,
	  'enableSorting'=>true,
      'template'=>"{items}\n{pager}", //this remove: Displaying #... of ... result
	  'itemView'=>'_view',
	  //'cssFile'=> Yii::app()->theme->baseUrl.'/style.css',
	)); ?>
</div>
