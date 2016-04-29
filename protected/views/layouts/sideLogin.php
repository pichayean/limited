<h2>Login</h2>
<form class="pure-form" method="post" action="index.php?r=member/login">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">E-mail</label>
            <input id="user" type="text" placeholder="E-mail" name="username">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" type="password" placeholder="Password" name="password">
        </div><br>

        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
            <a href="<?php echo Yii::app()->createUrl('member/formregister'); ?>">Register</a>
        </div>
    </fieldset>
</form>
<div>
    <p>**กรุณาลงชื่อเข้าใช้</p>
</div>