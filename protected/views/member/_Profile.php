<div align="right"><a href="javascript: history.back()">Back/ย้อนกลับ</a></div> 
<center><h1>แก้ไขข้อมูลส่วนตัว</h1></center><br>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'Member',
    'enableAjaxValidation'=>false,
));?>
    <?php echo $form->errorSummary($model); ?><br>

<?php $this->endWidget(); ?>

<form class="pure-form pure-form-aligned" method="post" action="index.php?r=member/profile" id="editMember">
    <fieldset>
       <div class="pure-control-group">
            <label for="name">Name</label>
            <?php echo $form->textField($model, 'name',array('size'=>20,'maxlength'=>100)); ?>
        </div>

        <div class="pure-control-group">
            <label for="phone">Phone No.</label>
            <?php echo $form->textField($model, 'tel',array('size'=>10,'maxlength'=>10)); ?>
        </div>

        <div class="pure-control-group">
            <label for="add">Address</label>
            <?php echo $form->textArea($model, 'address', $htmlOptions = array('maxlength'=>255, 'cols' => 60, 'rows' => 5)); ?>
        </div>

        <div class="pure-control-group">
            <label for="answer">answer</label>
            <?php echo $form->textField($model, 'answer',array('size'=>20,'maxlength'=>100)); ?>
        </div>
        
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>

    </fieldset>
</form>


