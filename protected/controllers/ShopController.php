<?php

class ShopController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/shopLayout';

    public function actionShop($categoryId=null)
    {   
        if ($categoryId == null) {
            $dataProvider=new CActiveDataProvider('Product',array(
            'pagination'=>array(
                'pageSize'=>'12'
            )
        ));
        }else{
            $dataProvider=new CActiveDataProvider('Product',array(
            'criteria' => array(
                'condition'=>'category_id='.$categoryId,
                'offset'=>0,
                //'limit' => 5,
            ),
            'pagination'=>array(
                'pageSize'=>'8'
            )
        ));
        }
        
        $this->render('shop', array(
        'dataProvider' => $dataProvider,
        ));
    }

	public function actionCartList()
	{
		    $param_id = Yii::app()->session["sportshop_id"];
            $model = new CActiveDataProvider('Cart',array(
                'criteria' => array(
                    'condition' => "member_id = $param_id"
                )));

            $attributes = array();
            $attributes["member_id"] = Yii::app()->session["sportshop_id"];
            $sumary = 0;
            
            if($param = Cart::model()->findAllByAttributes($attributes)){
                foreach($param as $value){ 
                    $sumary = $sumary+($value->product->price * $value->amount);
                }
            }        
            $this->render('cartList', array('model'=>$model, 'sumary'=>$sumary)); 
	}

	public function actionAddToCart($id,$page=null)
	{
        echo $page;
        if($id == null){
            $this->redirect(array('member/login', array('wc'=>"nolog")));
        }else {   
            if($page== 'detailPage'){
                if($_POST['qty'] == 0){
                    $qty=1;
                }else{
                    $qty=$_POST['qty'];
                }
            }else{
                $qty=1;
            }

            $model = new Cart;

            $model->member_id = Yii::app()->session["sportshop_id"];
            $model->product_id = $id;

            

            $model->amount = $qty;
            $model->created = date('Y-m-d H:i:s');

            if($model->save()){
                if($page=='detailPage'){
                    $this->redirect(array('shop/productDetail&id='.$id));   
                }else{
                    $this->redirect(array('shop/shop'));                    
                }
            }
        }
	}

	public function actionDelete($id)
	{
		if(Cart::model()->deleteByPk($id)){
			$this->redirect(array('shop/cartList'));
		}
	}

	public function actionCancel()
    {          
                $attributes = array();
                $attributes["member_id"] = Yii::app()->session["sportshop_id"];

                if(Cart::model()->deleteAllByAttributes($attributes)){
                    $this->redirect(array('site/index'));
                }else{
                    $this->redirect(array('shop/cartList'));
                }            
    }

    public function actionConfirmPage()
    {  
        $model = new Orders();
        $cartMemberId = Yii::app()->session["sportshop_id"]; 

        if(!empty($_POST['address'])){
            $model->member_id = Yii::app()->session["sportshop_id"];
            $model->address = $_POST['address'];
            $model->status = 'wait';
            $dateTime = date('Y-m-d H:i:s');
            $model->created = $dateTime;
            $code = time();
            $model->code = $code;
        
            if($model->save()){
                $attributes = array();
                $attributes["member_id"] = Yii::app()->session["sportshop_id"];
                $cart = Cart::model()->findAllByAttributes($attributes);

                foreach($cart as $value){
                    $order = new SubOrder();
                    $order->order_id = $model->id;
                    Yii::app()->session["sportshop_order_id"] = $model->id;
                    $order->member_id = Yii::app()->session["sportshop_id"];
                    $order->product_id = $value->product_id;
                    $order->amount = $value->amount;
                    $order->price = $value->product->price;
                    $order->created = date('Y-m-d H:i:s');
                    $order->save();
                }
                //บันทึกข้อมูลในTransaction++++++++++++++++++++
                /*
                $attributes = array();
                $attributes["member_id"] = Yii::app()->session["sportshop_id"];
                $orders = Orders::model()->findAllByAttributes($attributes);

                $model2 = new Transaction();

                $model2->order_code = $code;
                $model2->name = Yii::app()->session["sportshop_name"];
                $model2->email = Yii::app()->session["sportshop_email"];
                $model2->amount = Yii::app()->session["sumary"];
                $model2->created = $dateTime;
                $model2->phone = Yii::app()->session["sportshop_phone"];
                $model2->bankBranch = '-';
                $model2->status = 'Pay';

                $model2->save();
                */
                //+++++++++++++++++++++++++++++++++++++++++++
                //=====ลบสินค้าในตะหร้าที่ถูกสั่งซื้อแล้ว
                if(Cart::model()->deleteAllByAttributes(array('member_id'=>Yii::app()->session["sportshop_id"]))){
                    $this->redirect(array('order/bill&id='.Yii::app()->session["sportshop_order_id"]));
                }
            }
        }else{            
            $this->render('confirmPage', array('model'=>$model));
        }
    }


    public function actionSearch()
    {   
        
        if (empty($_POST)) {
            $dataProvider=new CActiveDataProvider('Product');
        }else{
            $keyword = $_POST['search'];
            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('name', $keyword, true,'OR');
            $criteria->addSearchCondition('price', $keyword, true,'OR');
            $criteria->addSearchCondition('detail', $keyword, true,'OR');

            $dataProvider=new CActiveDataProvider('Product',array(
            'criteria' => $criteria,
            'pagination'=>array(
                'pageSize'=>'8'
            )
        ));
        }
        
        $this->render('shop', array(
        'dataProvider' => $dataProvider,
        ));

    }

    public function actionProductDetail($id)
    {
        $model=Product::model()->findByPk($id);
        $this->render('productDetail', array('model'=>$model)); 
    }

    public function actionUpdate($id)
    {        
            $model=$this->loadModel($id);
            if(!empty($_POST)){                
                    $model->attributes = $_POST['Cart'];
                    $model->save();

                    $this->redirect(array('cartList'));
            }

            $this->render('update',array('model'=>$model));
    }

    public function loadModel($id)
    {
        $model=Cart::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}
