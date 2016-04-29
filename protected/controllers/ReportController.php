<?php

class ReportController extends Controller
{
	public $layout='//layouts/reportLayout';

	public function actionIndex()
	{
 		$this->render('index');     
	}

	public function actionPay()
	{
		$sql = "
 			SELECT 
 			*, 
 			DAY(orders.created) dayNow,
 			MONTH(NOW()) monthNow, 
 			YEAR(NOW()) yearNow, 
 			COUNT(*) totalWait 
 			FROM orders 
 			WHERE MONTH(orders.created) = MONTH(NOW()) 
 			AND YEAR(orders.created) = YEAR(NOW()) 
 			AND orders.status = 'pay'
 			GROUP BY DAY(orders.created)
 		";  

 		$model = new CSqlDataProvider($sql);

 		$this->render('pay',array('model'=>$model));     
	}

	public function actionOrder()
	{
		$sql = "
 			SELECT 
 			*, 
 			DAY(orders.created) dayNow,
 			MONTH(NOW()) monthNow, 
 			YEAR(NOW()) yearNow, 
 			COUNT(*) totalWait 
 			FROM orders 
 			WHERE MONTH(orders.created) = MONTH(NOW()) 
 			AND YEAR(orders.created) = YEAR(NOW()) 
 			GROUP BY DAY(orders.created)
 		";  

 		$model = new CSqlDataProvider($sql);

 		$this->render('order',array('model'=>$model));     
	}

    public function actionSend()
    {
    	$sql = "
 			SELECT 
 			*, 
 			DAY(orders.send_date) dayNow,
 			MONTH(NOW()) monthNow, 
 			YEAR(NOW()) yearNow, 
 			(
 				SELECT COUNT(*) FROM orders b 
 				WHERE MONTH(b.send_date) = MONTH(NOW()) 
 				AND YEAR(b.send_date) = YEAR(NOW())
 			) totalSend,
 			SUM(product.price) totalPrice 
 			FROM orders 
 			INNER JOIN suborder ON suborder.order_id = orders.id 
 			INNER JOIN product ON suborder.product_id = product.productID
 			WHERE orders.status = 'send' 
 			AND MONTH(orders.send_date) = MONTH(NOW()) 
 			AND YEAR(orders.send_date) = YEAR(NOW()) 
 			GROUP BY DAY(orders.send_date)
 		";  

 		$model = new CSqlDataProvider($sql);

 		$this->render('send',array('model'=>$model));
    }       

    public function actionCancel()
    {
    	$sql = "
 			SELECT 
 			*, 
 			DAY(orders.created) dayNow,
 			MONTH(NOW()) monthNow, 
 			YEAR(NOW()) yearNow, 
 			COUNT(*) totalPay 
 			FROM orders 
 			WHERE MONTH(orders.created) = MONTH(NOW()) 
 			AND YEAR(orders.created) = YEAR(NOW()) 
            AND status = 'cancel'
 			GROUP BY DAY(orders.created)
 		";  

 		$model = new CSqlDataProvider($sql);

 		$this->render('cancel',array('model'=>$model));
    }

    public function actionBestseller()
    {
    	$sql = " 			
			SELECT *,product.productID,product.name,SUM(suborder.price) AS sum_qty
			FROM suborder
			INNER JOIN product ON product.productID=suborder.product_id

			WHERE MONTH(suborder.created) = MONTH(NOW()) 
 			AND YEAR(suborder.created) = YEAR(NOW()) 
			GROUP BY product.productID
			ORDER BY sum_qty DESC
			LIMIT 5;
 		";  

 		
 		$model = new CSqlDataProvider($sql);

    	$this->render('bestseller',array('model'=>$model));
    }

    public function actionTotal()
    {
    	$sql = " 
 			SELECT 
 			*, 			
 			DAY(transaction.created) dayNow,
 			MONTH(NOW()) monthNow, 
 			YEAR(NOW()) yearNow, 
 			SUM(amount) AS totalPrice 
 			FROM transaction 
 			WHERE MONTH(transaction.created) = MONTH(NOW()) 
 			AND YEAR(transaction.created) = YEAR(NOW()) 
 			AND transaction.status = 'ck' 			
 			GROUP BY DAY(transaction.created)
 		";  

 		$model = new CSqlDataProvider($sql);

    	$this->render('total',array('model'=>$model));
    }
}