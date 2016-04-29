<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $model,
	'columns' => array(
			array(
				'name'=>'id',
				'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
				'header'=>'No.',
				'filter'=>false,
				'htmlOptions'=>array('style'=>'text-align: center'),
			),
			array(
					'name' => 'img',
					'type' => 'raw',
					'value'=>'CHtml::image("images/".$data["img"])',
		            'htmlOptions' => array(
						'width'=> '125'
					)
				),
			array(
					'name' => 'name',
		            'htmlOptions'=>array('style'=>'text-align: center'),
				),
			array(
					'name' => 'sum_qty',
					'header' => 'ยอดขายรวม (บาท)',
		            'htmlOptions'=>array('style'=>'text-align: center'),
				),          
      ),
));?>