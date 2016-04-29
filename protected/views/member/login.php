    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
    
    <?php if($wc==="wronglog"){
          echo'<center><p><b>**Email หรือ Password ไม่ถูกต้องกรุณาทำรายการใหม่ภายหลัง.</b></p></center>';
    }else{
          echo'<center><p><b>**Please Login : กรุณา Login เข้าเพื่อเข้าใช้งานระบบ.</b></p></center>';
    } ?> 
    
    <div align="right">
      <a href="<?php echo Yii::app()->createUrl('member/forgotpassword'); ?>">ลืม Password</a>
    </div>  
    
      <form role="form" align="center" method="post" action="index.php?r=member/login">
        <div class="form-group">
          <label for="user">E - mail :</label>
          <input type="user" class="form-control" id="user" placeholder="E-mail" name="username">
        </div><br>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div><br>
        
        <div class="form-actions" align="center">
          <button type="submit" class="pure-button pure-button-primary">Sign in</button>
          <a href="<?php echo Yii::app()->createUrl('member/formregister'); ?>">Register</a>
        </div>
      </form>