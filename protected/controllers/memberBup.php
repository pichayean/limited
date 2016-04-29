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
        $attributes["username"] = $_POST["username"];
        $attributes["password"] = $_POST["password"];

        $model = Member::model()->findByAttributes($attributes);
       
        if(!empty($model)){
            Yii::app()->session["sportshop_id"] = $model->id;
            Yii::app()->session["sportshop_username"] = $model->username;
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
        
        $this->render('login');
    }

    public function actionLoginShop()
    {           
        $this->render('login');
    }

    public function actionLogout()
    {
        Yii::app()->session['sportshop_admin'] = 0;
        Yii::app()->session['sportshop_gen'] = 0;
        Yii::app()->session["sportshop_online"] = 0; 
        unset(Yii::app()->session["sportshop_name"]);
        unset(Yii::app()->session["sportshop_id"]);
        unset(Yii::app()->session["sportshop_user"]);


        $this->redirect(array('site/logout'));
    }

    public function actionCompleteRegister()
    {
        $this->render('completeRegister');
    }



}

