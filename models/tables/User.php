<?php

namespace app\models\tables;

use Yii;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $created_at
 * @property string $updated_at
 */
class User extends ActiveRecord
{
    public $repPassword;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role_id','repPassword'], 'required'],
            [['role_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'login',
            'password' => 'Password',
            'repPassword' => 'Repeat password',
            'role_id' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function setUserRole($userId, $roleId)
    {
        $am = Yii::$app->authManager;
        if ($roleId == 1){
            $admin = $am->getRole('admin');
            $am->assign($admin, $userId);
        } elseif ($roleId == 2){
            $redactor = $am->getRole('redactor');
            $am->assign($redactor, $userId);
        }
    }
    public function changeUserRole($userId, $oldRoleId, $roleId)
    {
        if ($oldRoleId !== $roleId){
            Yii::$app->authManager->revokeAll($userId);
            $this->setUserRole($userId,$roleId);
        }
    }
}
