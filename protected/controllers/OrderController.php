<?php

/**
 * 
 */
class OrderController extends Controller
{
	public $layout='//layouts/shopLayout';
	
    public function actionIndex()
    {
        $this->layout = '//layouts/main';
        
        $model = new CActiveDataProvider('Orders', array(
            'sort'=>array(
            'defaultOrder'=>'created DESC',
            )
        ));
        $this->render('index', array('model'=>$model));
    }

    public function actionCancel($id)
    {
    	$model = Orders::model()->findByPk($id);
        //$model2 = Transaction::model()->findByPk($model->code);
        //$model2->status = 'delete';
    	$model->status = 'cancel';
        $model->pay_date = date('Y-m-d H:i:s');
    	//if ($model->save() && $model2->save()) {
        if ($model->save()) { //
    		$this->redirect(array('order/index'));
    		
    	}
    }

    public function actionCancelByCustomer($id)
    {
        $model = Orders::model()->findByPk($id);
        //$model2 = Transaction::model()->findByPk($model->code);
       // $model2->status = 'delete';        
        $model->status = 'cancel';
        $model->pay_date = date('Y-m-d H:i:s');
        //if ($model->save() && $model2->save()) {
        if ($model->save()) {
            $this->redirect(array('order/customerorder'));
            
        }
    }

     public function actionWaitpay($id)
    {
        $model = Orders::model()->findByPk($id);
        $model->status = 'waitpay';
        if ($model->save()) {
            $this->redirect(array('order/index'));
            
        }
    }

    public function actionPay($id)
    {
        $model = Orders::model()->findByPk($id);
        $model->status = 'pay';
        if ($model->save()) {
            $this->redirect(array('order/index'));
            
        }
    }

    public function actionDelete($id)
    {   
        $this->loadModel($id)->delete();
        //delete Suborder 
        $attributes = array();
        $attributes["order_id"] = $id;
                    
        SubOrder::model()->deleteAllByAttributes($attributes);

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function loadModel($id)
    {
        $model=Orders::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionSend($id)
    {
    	$model = Orders::model()->findByPk($id);
    	$model->status = 'send';
        $model->send_date = date('Y-m-d H:i:s');
    	if($model->save()){
    		$this->redirect(array('order/index'));
    	}
    }

    public function actionView($id)
    {
    	$model = new CActiveDataProvider('SubOrder',array(
    		'criteria' => array(
    			'condition' => "order_id = $id"
    		)
    	));

        $attributes = array();
        $attributes["order_id"] = $id;
        $sumary = 0;
        if($param = SubOrder::model()->findAllByAttributes($attributes)){
        foreach($param as $value){ 
            $sumary = $sumary+$value->price;
        }}

    	$this->render('view', array('model'=>$model, 'sumary'=>$sumary));
    }

    public function actionBill($id)
    {
        //$id = $id / 34567;
        $model = new CActiveDataProvider('SubOrder',array(
            'criteria' => array(
                'condition' => "order_id = $id"
            )
        ));

        $attributes = array();
        $attributes["order_id"] = $id;
        $sumary = 0;
        if($param = SubOrder::model()->findAllByAttributes($attributes)){
        foreach($param as $value){ 
            $sumary = $sumary+$value->price * $value->amount;
        }}

        $this->render('bill', array('model'=>$model, 'sumary'=>$sumary));
    }
    
    public function actionCustomerorder()
    {
        $member_id_order = Yii::app()->session["sportshop_id"];
        $model = new CActiveDataProvider('Orders',array(
            'criteria' => array(
                'condition' => "member_id = $member_id_order"
            )
        ));

        //$model = new CActiveDataProvider('Orders');
        $this->render('customerorder', array('model'=>$model));
    }


}