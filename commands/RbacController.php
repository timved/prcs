<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 23.06.2018
 * Time: 16:19
 */

namespace app\commands;


use yii\console\Controller;
/**
 * Commands for working with Rbac.
 */
class RbacController extends Controller
{
    /**
     * This command will create roles.
     */
    public function actionRun(){

        $am = \Yii::$app->authManager;

        $admin = $am->createRole('admin');
        $redactor = $am->createRole('redactor');
        $admin->description = 'admin';
        $redactor->description = 'redactor';

        $am->add($admin);
        $am->add($redactor);

        $operationCreate = $am->createPermission('create');
        $operationUpdate = $am->createPermission('update');
        $operationDelete = $am->createPermission('delete');

        $am->add($operationCreate);
        $am->add($operationUpdate);
        $am->add($operationDelete);

        $am->addChild($admin, $operationCreate);
        $am->addChild($admin, $operationUpdate);
        $am->addChild($admin, $operationDelete);

        $am->addChild($redactor, $operationCreate);
        $am->addChild($redactor, $operationUpdate);
    }

}