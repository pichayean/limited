<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $order_code
 * @property string $name
 * @property string $email
 * @property integer $amount
 * @property string $created
 * @property integer $phone
 * @property string $bankBranch
 * @property string $status
 */
class Transaction extends CActiveRecord
{

	public $csv_file;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_code, name, email, amount, created, phone, bankBranch, status', 'required'),
			array('order_code, amount, phone', 'numerical', 'integerOnly'=>true),
			array('name, email, bankBranch', 'length', 'max'=>255),
			array('status', 'length', 'max'=>6),

			array('csv_file',
               'file', 'types' => 'csv',
               'maxSize'=>5242880,
               'allowEmpty' => true,
               'wrongType'=>'Only csv allowed.',
               'tooLarge'=>'File too large! 5MB is the limit'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_code, name, email, amount, created, phone, bankBranch, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_code' => 'Order Code',
			'name' => 'Name',
			'email' => 'Email',
			'amount' => 'Amount',
			'created' => 'Created',
			'phone' => 'Phone',
			'bankBranch' => 'Bank Branch',
			'status' => 'Status',

			'id' => Yii::t('app','ID'),
            'title' => Yii::t('app','Title'),
            'description' => Yii::t('app','Description'),
            'csv_file'=>'Upload CSV File',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('order_code',$this->order_code);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('bankBranch',$this->bankBranch,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
