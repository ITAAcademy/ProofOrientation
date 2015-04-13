<?php

/**
 * This is the model class for table "userSession".
 *
 * The followings are the available columns in table 'userSession':
 * @property string $id
 * @property string $username
 * @property integer $sex
 * @property string $creation_date
 * @property string $secretkey
 * @property integer $finished
 */
class UserSession extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'userSession';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,sex, secretkey', 'required'),
			array('sex, finished', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>82),
			array('secretkey', 'length', 'max'=>42),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, sex, creation_date, secretkey, finished', 'safe', 'on'=>'search'),
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
        
        private function secretLine( $length = 18 ) 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }
        
        
        public function beforeValidate()
        {
            $this->secretkey = $this->secretLine(32);      
            return parent::beforeValidate();
        }
        
        public function beforeSave()
        {
            $this->secretkey = $this->secretLine(32);      
            return parent::beforeSave();
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'sex' => 'Sex',
			'creation_date' => 'Creation Date',
			'secretkey' => 'Secretkey',
			'finished' => 'Finished',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('secretkey',$this->secretkey,true);
		$criteria->compare('finished',$this->finished);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserSession the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function regenerateCode()
        {
            $this->secretkey = $this->secretLine(32); 
            $this->save();
        }
}
