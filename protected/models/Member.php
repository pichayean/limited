<?php

class Member extends CActiveRecord
{
	public function tableName()
	{
		return 'member';
	}

	public $verifyCode;

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, level, email, password, answer, level, tel', 'required'),
			//array('password', 'MIN'=>8),
			array('email','unique'),
			//array('tel', 'length', 'min'=>10),
			//array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			
			//The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, code, name, email, phone, address, status, created', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'address' => 'address',
			'answer' => 'Answer',
			'level' => 'level',
			'status' => 'Status',
			'tel' => 'Phone No.'

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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bill the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
