<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "update_user_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $email_id
 * @property string $address
 * @property int $phone
 * @property string $password
 * @property string $company
 * @property string $updated_on
 */
class UpdateUserLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'update_user_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'phone'], 'integer'],
            [['updated_on'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['email_id', 'password', 'company'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'email_id' => 'Email ID',
            'address' => 'Address',
            'phone' => 'Phone',
            'password' => 'Password',
            'company' => 'Company',
            'updated_on' => 'Updated On',
        ];
    }
}
