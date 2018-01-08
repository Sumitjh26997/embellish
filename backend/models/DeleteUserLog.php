<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "delete_user_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $email_id
 * @property string $address
 * @property int $phone
 * @property string $company
 * @property string $deleted_on
 * @property string $feedback
 */
class DeleteUserLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delete_user_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'phone'], 'integer'],
            [['deleted_on'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['email_id', 'company'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 80],
            [['feedback'], 'string', 'max' => 200],
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
            'company' => 'Company',
            'deleted_on' => 'Deleted On',
            'feedback' => 'Feedback',
        ];
    }
}
