<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = '//layouts/indexLayout';		
		//run script check transaction status
		function DateTimeDiff($strDateCreated,$strDateNow){	
			return (strtotime($strDateNow) - strtotime($strDateCreated))/  ( 60 * 60 ); // 1 Hour =  60*60
	 	}
	 	//ปรับ status เป็น delete ภายใน 72 ชั่วโมง(3วัน)
		$attributes = array();
        $attributes["status"] = 'notPay';
		$Transaction = Transaction::model()->findAllByAttributes($attributes);
		foreach($Transaction as $value){
            $date = DateTimeDiff($value->created, date("Y-m-d H:i:s"));
			if ($date > 72) {
				//update status Transaction = delete
			    $value->status = 'delete';
	            $value->save();
			} 
        }
        //ลบrecord ที่มี status เป็น delete ภายใน 168 ชั่วโมง(7วัน)
        $attributes = array();
        $attributes["status"] = 'delete';
		$Transaction = Transaction::model()->findAllByAttributes($attributes);
		foreach($Transaction as $value){
            $date = DateTimeDiff($value->created, date("Y-m-d H:i:s"));
			if ($date > 168) {
				//delete transaction record
			    $value->delete();
			    //deletoe order
			    $this->deleteOrder($value->order_code);
			} 
        }

        //+++++++++++++++++++++++++++++++++++
		$results=Product::model()->findAllBySql('SELECT * FROM product ORDER BY RAND() LIMIT 3;');
		
        $this->render('index',array('results'=>$results));
	}

	public function deleteOrder($code){//delete order when delete Transacrion 
		if(!empty($code)){
			echo" inFunction";
			$attributes = array();
	        $attributes["code"] = $code;
			$order = Orders::model()->findAllByAttributes($attributes);
			
			foreach($order as $value){
					//delete Order
				    $value->delete();
				    //delete SubOrder
				    $attributes = array();
			        $attributes["order_id"] = $value->id;
					
					SubOrder::model()->deleteAllByAttributes($attributes);					      
	        }  
		}	
	}

	public function actionAdmin()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('admin');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = '//layouts/shopLayout';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$this->layout = '//layouts/contactLayout';
		$this->render('contact');
	}

	/**
	 * Displays the login page
	 */
	
	public function actionLogin()
	{
		//$this->layout = '//layouts/indexLayout';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('site/admin'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('site/index'));
		//$this->redirect('admin');
	}


	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionSave()
	{
		$this->layout = '//layouts/paymentLayout';
		
		$this->render('save');
	}

	public function actionShop2($categoryId=null)
    {   
    	$this->layout = '//layouts/indexLayout';
        if ($categoryId == null) {
            $dataProvider=new CActiveDataProvider('Product');
        }else{
            $dataProvider=new CActiveDataProvider('Product',array(
            'criteria' => array(
                'condition'=>'category_id='.$categoryId,
                'offset'=>0,
                //'limit' => 5,
            ),
            'pagination'=>array(
                'pageSize'=>'6'
            )
        ));
        }
        
        $this->render('shop2', array(
        'dataProvider' => $dataProvider,
        ));
    }
}