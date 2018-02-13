<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "delete_admin".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int $created_at
 * @property int $updated_at
 * @property string $joined_on
 * @property string $designation
 * @property int $phone
 */
class DeleteAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delete_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'phone'], 'integer'],
            [['joined_on'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
            [['designation'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'joined_on' => 'Joined On',
            'designation' => 'Designation',
            'phone' => 'Phone',
        ];
    }
}
