<?php

class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, member_id, status, created, address', 'required'),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, email, address, status, created', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'bill' => array(self::BELONG_TO, 'Bill', 'bill_id'),
			'member'     => array(self::BELONGS_TO, 'Member', 'member_id'),
			'suborder'   => array(self::BELONGS_TO, 'SubOrder', 'bill_id'),		
			'product'    => array(self::BELONGS_TO, 'Product', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'name' => 'Name',
			'email' => 'Email',
			'address' => 'Address',			
			'pay_date' => 'CancelTime',
			//'status' => 'Status',
			//'created' => 'Created',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	function getStatus($data){
		if($data == 'wait'){
			return 'รอการดำเนินการ';
		}else if($data == 'cancel'){
			return 'ยกเลิก';
		}else if($data == 'waitpay'){
			return 'รอตรวจสอบการจ่ายเงิน';
		}else if($data == 'pay'){
			return 'จ่ายเงินถูกต้อง';
		}else{
			return 'ส่งสินค้าแล้ว';
		}
	}

	function getName($data){
		$attributes = array();
     	$attributes["id"] =  $data;
      	$var1 = Member::model()->findByAttributes($attributes);
			
			return $var1->name;
		
	}

	function getEmail($data){
		$attributes = array();
     	$attributes["id"] =  $data;
      	$var3 = Member::model()->findByAttributes($attributes);
			
			return $var3->email;
		
	}

}
