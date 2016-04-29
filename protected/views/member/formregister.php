<div align="right"><a href="javascript: history.back()">Back/ย้อนกลับ</a></div>  
<div align="right"><p>**Password Max 8 Character</p></div>
<center><h1>Register</h1></center><br>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'Member',
    'enableAjaxValidation'=>false,
));?>
    <?php echo $form->errorSummary($model); ?><br>

<?php $this->endWidget(); ?>

<form class="pure-form pure-form-aligned" method="post" action="index.php?r=member/formregister" id="Member">
    <fieldset>
       <div class="pure-control-group">
            <label for="name">Name</label>
            <?php echo $form->textField($model, 'name',array('size'=>20,'maxlength'=>100)); ?>
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <td><?php echo $form->emailField($model, 'email'); ?></td>
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <?php echo $form->passwordField($model, 'password'); ?>
        </div>

        <div class="pure-control-group">
            <label for="name">Phone No.</label>
            <?php echo $form->textField($model, 'tel',array('size'=>10,'maxlength'=>10)); ?>
        </div>
        
        <div class="pure-control-group">
            <label for="answer">คุณเกิดที่ไหน</label>
            <td><?php echo $form->textField($model, 'answer'); ?></td>
        </div>

        <div class="pure-control-group">
            <label for="add">Address</label>
            <?php echo $form->textArea($model, 'address', $htmlOptions = array('maxlength'=>255, 'cols' => 60, 'rows' => 5)); ?>
        </div>
        <!--
        <div class="pure-control-group">
            <label for="ver">verifyCode</label>
            <?php// $this->widget('CCaptcha', array('clickableImage'=>false)); ?>
            <?php// echo $form->textField($model, 'username',array('size'=>20,'maxlength'=>11)); ?>           
            
        </div>
        -->
        
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>

         
    </fieldset>
</form>


