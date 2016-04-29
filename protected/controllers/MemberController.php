<?php
ob_start(); session_start();

/**
 * 
 */
class MemberController extends Controller
{
	public $layout='//layouts/shopLayout';

    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CaptchaExtendedAction',
                // if needed, modify settings
                'mode'=>CaptchaExtendedAction::MODE_MATH,
            ),
        );
    }

    public function actionFormregister()
     {
        $model = new Member();
      //  $captcha=Yii::app()->getController()->createAction("captcha");
       // $code = $captcha->verifyCode;
        //if($code === $_REQUEST['captcha']){
                if(!empty($_POST['Member'])){
                    $model->attributes = $_POST['Member'];
                    $model->level = 'customer';
                    if($model->save()){
                        $payStatus = member::model()->findAll();                 
                        $this->redirect(array('member/completeRegister'));

                    }
                }    
       // }    
        $this->render('formregister', array('model'=>$model));
    }

    public function actionLogin()
    {   
        $attributes = array();
        //$attributes["username"] = $_POST["username"];
        $attributes["email"] = $_POST["username"];
        $attributes["password"] = $_POST["password"];

        $model = Member::model()->findByAttributes($attributes);
       
        if(!empty($model)){
            Yii::app()->session["sportshop_id"] = $model->id;
            //Yii::app()->session["sportshop_username"] = $model->username;
            Yii::app()->session["sportshop_email"] = $model->email;
            Yii::app()->session["sportshop_phone"] = $model->tel;
            Yii::app()->session["sportshop_name"] = $model->name;
            Yii::app()->session["sportshop_level"] = $model->level;   
           
            Yii::app()->session["sportshop_online"] = 1;   
           
            if (Yii::app()->session["sportshop_level"] == 'admin') {
                 Yii::app()->session['sportshop_admin'] = 1;
            }elseif (Yii::app()->session["sportshop_level"] == 'customer') {
                Yii::app()->session['sportshop_customer'] = 1;
            }     
                
                if(Yii::app()->session["sportshop_level"] == 'customer'){                    
                    $this->redirect(array('site/index'));
                }else{
                    $this->redirect(array('site/login'));
                }
                 
          //  $this->redirect(array('view','$id'=>$model->id));     
        }else{
            //$this->redirect(array('member/formregister'));
        }

        $this->render('login', array('wc'=>"wronglog"));
    }

    public function actionLoginShop()
    {           
        $this->render('login', array('wc'=>"nolog"));
    }

    public function actionLogout()
    {
        Yii::app()->session['sportshop_admin'] = 0;
        Yii::app()->session['sportshop_gen'] = 0;
        Yii::app()->session["sportshop_online"] = 0; 
        unset(Yii::app()->session["sportshop_email"]);
        unset(Yii::app()->session["sportshop_name"]);
        unset(Yii::app()->session["sportshop_id"]);
        //unset(Yii::app()->session["sportshop_user"]);
        unset(Yii::app()->session["sportshop_level"]);


        $this->redirect(array('site/logout'));
    }

    public function actionCompleteRegister()
    {
        $this->render('completeRegister');
    }

    public function actionProfile()
    {
        $id = (Yii::app()->session["sportshop_id"]);

        $model=$this->loadModel($id);

        if(isset($_POST['Member']))
        {
            $model->attributes=$_POST['Member'];
            //$model->name = $_POST['name'];
            //$model->tel = $_POST['tel'];
            //$model->address = $_POST['address'];
            if($model->save()){
                $this->redirect(array('site/index'));                
            }
        }
        $this->render('profile', array('model'=>$model));
    }


    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('logout'));
        
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='member'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionResetpassword()
    {   
        $model=$this->loadModel($_GET["id"]);

        if(isset($_POST['password']))
        {
                $model->password=$_POST['password'];

                $model->save();                
                $this->redirect(array('newpass'));
        }


        $this->render('resetpassword', array('id'=>$_GET["id"]));
    }

    public function actionForgotpassword()
    {
        $errword = " ";
        
        if(!empty($_POST["email"])){
            $attributes = array();
            $attributes["email"] = $_POST["email"];
            $attributes["answer"] = $_POST["answer"];

            $model = Member::model()->findByAttributes($attributes);
           
            if(!empty($model)){
                $this->redirect(array('member/resetpassword', 'id'=>$model->id));   
            }else{
                $errword = "คำตอบไม่ถูกต้อง !!!";
                $this->render('forgotpassword', array('errword'=>$errword));
            }
        }
        $this->render('forgotpassword', array('errword'=>$errword));
    }

    public function actionNewpass()
    {
        $this->render('newpass');
    }

    public function loadModel($id)
    {
        $model=Member::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}

