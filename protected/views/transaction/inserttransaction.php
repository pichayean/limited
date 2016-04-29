	<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('class'=>'form-horizontal',
                         'role'=>'form',
                         'enctype' => 'multipart/form-data'),
        ));?>

    <?php echo $form->errorSummary($model); ?>

    <div>
        	<?php echo $form->labelEx($model,'csv_file'); ?>
            <?php echo $form->fileField($model,'csv_file',
                                array( 'id'=>'csv_file',
                                       'class'=>'form-control',
                                       'placeholder'=>'Enter csv_file')); ?>
        	<?php echo $form->error($model,'csv_file',array('class'=>'text-danger')); ?>
    </div>

    <div>
        <?php echo CHtml::submitButton('Upload CSV'); ?>
    </div>

<?php $this->endWidget(); ?>