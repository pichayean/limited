<?php

class TransactionController extends Controller
{
	
    public function actionIndex()
    {
        $criteria=new CDbCriteria;
        $criteria->addInCondition('status',array('pay'));
    	$model = new CActiveDataProvider('Transaction', array(
            'sort'=>array(
            'defaultOrder'=>'created DESC',
            ),
            'criteria'=>$criteria
        ));
        $this->render('index', array('model'=>$model));       
    }

     public function actionOkPay($code)
    {
    	$model = Transaction::model()->findByPk($code);
    	$model->status = 'ck';
        if ($model->save()) {

            $attributes = array();
            $attributes["code"] =  $model->order_code;
            $model1 = Orders::model()->findByAttributes($attributes);
    		$model1->status = 'pay';
            $model1->pay_date = date('Y-m-d H:i:s');
        

            $model1->save();
            }


            $this->redirect(array('Transaction/index'));
    		
    	
    }

    public function actionNoPay($code)
    {
    	$model = Transaction::model()->findByPk($code);
    	$model->status = 'notPay';
       	if($model->save()){

            $attributes = array();
            $attributes["code"] =  $model->order_code;
            $model1 = Orders::model()->findByAttributes($attributes);
            $model1->status = 'wait';
            $model1->pay_date = date('0-0-0 0:0:0');
        

            $model1->save();
            }

    		$this->redirect(array('Transaction/index'));
    	
    }

    public function actionView($code)
    {
    	$model = new CActiveDataProvider('Transaction',array(
    		'criteria' => array(
    			'condition' => "order_code = $code"
    		)
    	));
    	$this->render('view', array('model'=>$model));
    }

    	public function actionDelete($code)
	{
		$this->loadModel($code)->delete();
        //***delete suborder
        //$this->deleteOrder($value->$code);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
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

	public function loadModel($code)
	{
		$model=Transaction::model()->findByPk($code);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionInserttransaction()
    {
        $model=new Transaction;
            if(isset($_POST['Transaction']))
            {
                $model->attributes=$_POST['Transaction'];

                $file = CUploadedFile::getInstance($model,'csv_file');

                $fp = fopen($file->tempName, 'r');
                if($fp)
                {
                    while ( ($line = fgetcsv($fp, 1000, ",")) != FALSE) {

                        $model2 = new Transaction;
                        $model2->order_code = $line[0];
                        $model2->name  = $line[1];
                        $model2->email = $line[2];
                        $model2->amount  = $line[3];
                        $model2->created = $line[4];
                        $model2->phone  = $line[5];
                        $model2->bankBranch = $line[6];
                        $model2->status  = $line[7];

                        $model2->save();
                    }

                    $this->redirect(array('transaction/index'));
                }
            }

            $this->render('inserttransaction',array(
                'model'=>$model,
            ));
        }
    
}
